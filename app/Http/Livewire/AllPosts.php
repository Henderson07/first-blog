<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AllPosts extends Component
{
    use WithPagination;
    public $perPage = 12;
    public $search = null;
    public $author = null;
    public $category = null;
    public $orderBy = 'desc';

    protected $listeners = [
        'deletePostAction'
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingAuthor()
    {
        $this->resetPage();
    }

    public function deletePost($id)
    {
        $this->dispatchBrowserEvent('deletePost', [
            'title' => 'Tem certeza?',
            'html' => 'Você deseja apagar esse post?',
            'id' => $id
        ]);
    }

    public function deletePostAction($id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return response()->json(['code' => 0, 'msg' => 'Post não encontrado.']);
            }

            $path = "images/post_images/";
            $featured_image = $post->featured_image;

            // Deletar imagens se existirem
            if ($featured_image != null) {
                // Imagem principal
                if (Storage::disk('public')->exists($path . $featured_image)) {
                    Storage::disk('public')->delete($path . $featured_image);
                }

                // Thumbnails
                $thumbnails = [
                    'thumbnails/thumb_' . $featured_image,
                    'thumbnails/resized_' . $featured_image
                ];

                foreach ($thumbnails as $thumbnail) {
                    if (Storage::disk('public')->exists($path . $thumbnail)) {
                        Storage::disk('public')->delete($path . $thumbnail);
                    }
                }
            }

            // Deletar o post
            $deleted = $post->delete();

            if ($deleted) {
                $this->showToastr('Post deletado com sucesso!', 'success');
            } else {
                $this->showToastr('Erro ao deletar post.', 'error');
            }
        } catch (\Exception $e) {
            $this->showToastr('Erro: ' . $e->getMessage(), 'error');
        }
    }

    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToast', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.all-posts', [
            'posts' => auth()->user()->type == 1 ?
                Post::search(trim($this->search))
                ->when($this->category, function ($query) {
                    $query->where('category_id', $this->category);
                })
                ->when($this->author, function ($query) {
                    $query->where('author_id', $this->author);
                })
                ->when($this->orderBy, function ($query) {
                    $query->orderBy('id', $this->orderBy);
                })
                ->paginate($this->perPage) :

                Post::search(trim($this->search))
                ->when($this->category, function ($query) {
                    $query->where('category_id', $this->category);
                })
                ->where('author_id', auth()->id())
                ->when($this->orderBy, function ($query) {
                    $query->orderBy('id', $this->orderBy);
                })
                ->where('author_id', auth()->id())
                ->paginate($this->perPage),
        ]);
    }
}
