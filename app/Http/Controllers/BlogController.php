<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function categoryPosts(Request $request, $slug)
    {
        if (!$slug) {
            return abort(404);
        } else {
            $subcategory = SubCategory::where('slug', $slug)->first();
            if (!$subcategory) {
                return abort(404);
            } else {
                $posts = Post::where('category_id', $subcategory->id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(6);
                $data = [
                    'pageTitle' => 'Category - ' . $subcategory->subcategory_name,
                    'category' => $subcategory,
                    'posts' => $posts
                ];

                return view('frontend.pages.category_posts', $data);
            }
        }
    }

    public function searchBlog(Request $request)
    {
        $query = request()->query('query');
        if ($query && strlen($query) >= 2) {
            $searchValues = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);
            $posts = Post::query();

            $posts->where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('post_title', 'LIKE', "%{$value}%");
                    $q->orWhere('post_tags', 'LIKE', "%{$value}%");
                }
            });

            $posts = $posts->with('subcategory')
                ->with('author')
                ->orderBy('created_at', 'desc')
                ->paginate(6);

            $data = [
                'pageTitle' => 'Search : ' . $query,
                'posts' => $posts,
            ];

            return view('frontend.pages.search_posts', $data);
        } else {
            return abort(404);
        }
    }

    public function readPosts($slug)
    {
        if (!$slug) {
            return abort(404);
        } else {

            $post = Post::where('post_slug', $slug)->with('subcategory')->with('author')->first();


            $post_tags = explode(',', $post->post_tags);
            $related_posts = Post::where('id', '!=', $post->id)
                ->where(function ($query) use ($post_tags, $post) {
                    foreach ($post_tags as $item) {
                        $query->orWhere('post_tags', 'like', "%$item%")->orWhere('post_title', 'like', $post->post_title);
                    }
                })
                ->inRandomOrder()
                ->take(3)
                ->get();
            $data = [
                'pageTitle' => Str::ucfirst($post->post_title),
                'post' => $post,
                'related_posts' => $related_posts
            ];

            return view('frontend.pages.single_post', $data);
        }
    }

    public function tagPosts(Request $request, $tag)
    {
        $posts = Post::where('post_tags', 'like', '%' . $tag . '%')
            ->with('subcategory')
            ->with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        if (!$posts) {
            return abort(404);
        }

        $data = [
            'pageTitle' => '#' . $tag,
            'posts' => $posts
        ];

        return view('frontend.pages.tag_posts', $data);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:1000',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            // Renderiza o e-mail com o layout padronizado
            $mail_body = view('emails.contact-email-template', compact('data'))->render();

            $mailConfig = [
                'mail_from_email'      => config('mail.from.address'),
                'mail_from_name'       => config('mail.from.name'),
                'mail_recipient_email' => 'henderson.larablog@gmail.com',
                'mail_recipient_name'  => 'Henderson Camilo',
                'mail_subject'         => "Novo contato: {$request->subject}",
                'mail_body'            => $mail_body,
            ];

            sendMail($mailConfig);

            return response()->json([
                'success' => true,
                'message' => 'Mensagem enviada com sucesso! Entrarei em contato em breve.'
            ]);
        } catch (\Throwable $e) {
            \Log::error('Erro ao enviar contato: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erro ao enviar mensagem. Tente novamente mais tarde.'
            ], 500);
        }
    }
}
