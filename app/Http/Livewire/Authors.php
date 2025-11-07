<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class Authors extends Component
{
    use WithPagination;
    public $name, $email, $username, $author_type, $direct_publisher;
    public $search;
    public $perPage = 12;
    public $selected_author_id;
    public $blocked = 0;
    protected $listeners = [
        'resetForms',
        'deleteAuthorAction'
    ];

    public function mount()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetForms()
    {
        $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
        $this->resetErrorBag();
    }

    public function addAuthor()
    {
        // Validação
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:6|max:20',
            'author_type' => 'required',
            'direct_publisher' => 'required',
        ], [
            'author_type.required' => 'Escolha o tipo de autor',
            'direct_publisher.required' => 'Especifique os acessos de publicação do autor',
        ]);

        try {
            // Gera senha padrão
            $default_password = \Nette\Utils\Random::generate(8);

            // Cria autor
            $author = new \App\Models\User();
            $author->name = $this->name;
            $author->email = $this->email;
            $author->username = $this->username;
            $author->password = \Illuminate\Support\Facades\Hash::make($default_password);
            $author->type = $this->author_type;
            $author->direct_publish = $this->direct_publisher;
            $author->picture = '/backend/dist/img/authors/default.jpg';

            $saved = $author->save();

            if (!$saved) {
                session()->flash('error', 'Algo deu errado ao salvar o autor.');
                return;
            }

            // Monta dados pro e-mail
            $data = (object)[
                'name' => $author->name,
                'username' => $author->username,
                'email' => $author->email,
                'password' => $default_password,
                'url' => route('author.profile'),
            ];

            // Renderiza template HTML bonitão
            $mail_body = view('emails.new-author-email-template', compact('data'))->render();

            // Config de envio
            $mailConfig = [
                'mail_from_email' => config('mail.from.address'),
                'mail_from_name' => config('mail.from.name'),
                'mail_recipient_email' => $author->email,
                'mail_recipient_name' => $author->name,
                'mail_subject' => 'Criação de conta',
                'mail_body' => $mail_body,
            ];

            // Envia e-mail
            sendMail($mailConfig);

            // Limpa formulário e fecha modal
            $this->reset([
                'name',
                'email',
                'username',
                'author_type',
                'direct_publisher',
            ]);

            $this->dispatchBrowserEvent('hide_add_author_modal');

            // Mensagem de sucesso
            session()->flash('success', 'Autor cadastrado e e-mail enviado com sucesso!');
        } catch (\Throwable $e) {
            \Log::error('Erro ao adicionar autor: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'author_email' => $this->email ?? null,
                'author_username' => $this->username ?? null,
            ]);

            session()->flash('error', 'Não foi possível cadastrar o autor. Verifique os dados e tente novamente.');
        }
    }

    public function editAuthor($author)
    {
        $this->selected_author_id = $author['id'];
        $this->name = $author['name'];
        $this->email = $author['email'];
        $this->username = $author['username'];
        $this->author_type = $author['type'];
        $this->direct_publisher = $author['direct_publish'];
        $this->blocked = $author['blocked'] === '1';
        $this->dispatchBrowserEvent('showEditAuthorModal');
    }

    public function updateAuthor()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->selected_author_id,
            'username' => 'required|min:6|max:20|unique:users,username,' . $this->selected_author_id,
        ]);

        if ($this->selected_author_id) {
            $query = User::find($this->selected_author_id);
            $query->update([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'type' => $this->author_type,
                'direct_publisher' => $this->direct_publisher,
                'blocked' => $this->blocked,
            ]);


            if ($query) {
                $this->dispatchBrowserEvent('closeUpdateAuthorModal');
                session()->flash('success', 'Autor atualizado com sucesso!');
            } else {
                session()->flash('error', 'Algo deu errado');
            }
        } else {
            session()->flash('error', 'Algo deu errado');
        }
    }

    public function deleteAuthor($author)
    {
        $this->dispatchBrowserEvent('deleteAuthor', [
            'title' => 'Você tem certeza?',
            'html' => 'Você deseja excluir este autor: <br><b>' . $author['name'] . '</b>',
            'id' => $author['id'],
        ]);
    }

    public function deleteAuthorAction($id)
    {
        $author = User::find($id);
        $author_picture = $author->picture;
        $default_picture = 'backend/dist/img/authors/default.jpg';

        $fullPath = public_path(ltrim($author_picture, '/'));
        if (
            $author_picture &&
            !Str::endsWith($author_picture, 'default.jpg') &&
            File::exists($fullPath)
        ) {
            File::delete($fullPath);
        }

        $author->delete();

        session()->flash('success', 'Autor excluído com sucesso!');
    }

    public function showToast($message, $type)
    {
        return $this->dispatchBrowserEvent('showToast', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.authors', [
            'authors' => User::search(trim($this->search))
                ->where('id', '!=', auth()->id())->paginate($this->perPage),
            // 'authors' => User::where('id', '!=', auth()->id())->paginate($this->perPage),
        ]);
    }
}
