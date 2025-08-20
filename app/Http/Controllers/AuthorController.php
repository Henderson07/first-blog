<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.pages.home');
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }
    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTitle' => 'Redefinir senha'
        ];
        return view('backend.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }
    public function changeProfilePicture(Request $request)
    {
        $user = User::find(auth('web')->id());
        $path = '/backend/dist/img/authors';

        if ($request->hasFile('business_logo')) {
            $file = $request->file('business_logo');
            $old_picture = $user->picture;
            $file_path = public_path($path . '/' . $old_picture);
            $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

            if ($old_picture != null && File::exists($file_path)) {
                File::delete($file_path);
            }

            $upload = $file->move(public_path($path), $new_picture_name);

            if ($upload) {
                $user->update([
                    'picture' => $path . '/' . $new_picture_name
                ]);

                $output = [
                    'success' => 1,
                    'msg' => __('Foto atualizada com sucesso')
                ];

                return redirect()->route('author.profile')->with('status', $output);
            } else {
                $output = [
                    'success' => 0,
                    'msg' => 'Algo deu errado e a foto não foi atualizada.'
                ];

                return redirect()->route('author.profile')->with('status', $output);
            }
        }

        $output = [
            'success' => 0,
            'msg' => 'Algo deu errado e a foto não foi atualizada.'
        ];

        return redirect()->route('author.profile')->with('status', $output);
    }

    public function changeBlogLogo(Request $request)
    {
        $general_settings = GeneralSettings::find(1);
        $logo_path = 'backend/dist/img/logo-favicon';
        $old_logo = $general_settings->blog_logo;
        $file = $request->file('blog_logo');

        if ($request->hasFile('blog_logo')) {
            // Validação: Verifique se o arquivo é um SVG
            if ($file->getClientOriginalExtension() === 'svg') {
                // Gere um nome único para o arquivo
                $filename = time() . '_' . rand(1, 100000) . '_blog_logo.svg';
            } else {
                $filename = time() . '_' . rand(1, 100000) . 'blog_logo.png';
            }

            if ($old_logo != null && File::exists(public_path($logo_path . $old_logo))) {
                File::delete(public_path($logo_path . $old_logo));
            }

            $upload = $file->move(public_path($logo_path), $filename);

            if ($upload) {
                $general_settings->update([
                    'blog_logo' => $filename
                ]);

                $output = [
                    'success' => 1,
                    'msg' => __('Logo atualizada com sucesso')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            } else {
                $output = [
                    'success' => 0,
                    'msg' => __('Algo deu errado')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            }
        } else {
            $output = [
                'success' => 0,
                'msg' => 'O arquivo deve ser um SVG.'
            ];

            return redirect()->route('author.settings')->with('status', $output);
        }
    }

    public function changeBlogFavicon(Request $request)
    {
        $general_settings = GeneralSettings::find(1);
        $favicon_path = 'backend/dist/img/logo-favicon';
        $old_favicon = $general_settings->blog_favicon;
        $file = $request->blog_favicon;
        // dd($request, $general_settings, $favicon_path, $old_favicon, $file);
        if ($request->hasFile('blog_favicon')) {
            // Validação: Verifique se o arquivo é um SVG
            if ($file->getClientOriginalExtension() === 'svg') {
                // Gere um nome único para o arquivo
                $filename = time() . '_' . rand(1, 2000) . '_blog_favicon.ico';
            } else {
                $filename = time() . '_' . rand(1, 2000) . '_blog_favicon.ico';
            }

            if ($old_favicon != null && File::exists(public_path($favicon_path . $old_favicon))) {
                File::delete(public_path($favicon_path . $old_favicon));
            }

            $upload = $file->move(public_path($favicon_path), $filename);

            if ($upload) {
                $general_settings->update([
                    'blog_favicon' => $filename
                ]);

                $output = [
                    'success' => 1,
                    'msg' => __('Ícone atualizado com sucesso')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            } else {
                $output = [
                    'success' => 0,
                    'msg' => __('Algo deu errado')
                ];

                return redirect()->route('author.settings')->with('status', $output);
            }
        } else {
            $output = [
                'success' => 0,
                'msg' => 'O arquivo deve ser um SVG ou JPG.'
            ];

            return redirect()->route('author.settings')->with('status', $output);
        }
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts,post_title',
            'post_content' => 'required',
            'post_category' => 'required|exists:sub_categories,id',
            'featured_image' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);

        try {
            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $new_filename = time() . '_' . $file->getClientOriginalName();
                $path = 'images/post_images/';

                // Certifique-se que o diretório existe
                if (!Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->makeDirectory($path);
                }

                // Salva o arquivo
                $upload = Storage::disk('public')->put($path . $new_filename, file_get_contents($file));

                $post_thumbnails_path = $path . 'thumbnails';
                if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                    Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
                }

                // Caminho completo da imagem original
                $originalPath = storage_path('app/public/' . $path . $new_filename);

                //Create square thumbnail
                Image::make($originalPath)
                    ->fit(200, 200)
                    ->save(storage_path('app/public/' . $path . 'thumbnails/thumb_' . $new_filename));

                //Create resized image
                Image::make($originalPath)
                    ->fit(500, 350)
                    ->save(storage_path('app/public/' . $path . 'thumbnails/resized_' . $new_filename));


                if (!$upload) {
                    return response()->json(['code' => 0, 'msg' => 'Não foi possível salvar a imagem.']);
                }

                $post = new Post();
                $post->author_id = auth()->id();
                $post->category_id = $request->post_category;
                $post->post_title = $request->post_title;
                // $post->post_slug = Str::slug($request->post_title);
                $post->post_content = $request->post_content;
                $post->post_tags = $request->post_tags;
                $post->featured_image = $new_filename;

                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'Post criado com sucesso!']);
                    // session()->flash('success', 'Autor cadastrado e e-mail enviado com sucesso!');
                } else {
                    return response()->json(['code' => 0, 'msg' => 'Algo deu errado ao salvar o post']);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['code' => 0, 'msg' => 'Erro: ' . $e->getMessage()]);
        }
    }

    public function editPost(Request $request)
    {
        if (!request()->post_id) {
            return abort(404);
        } else {
            $post = Post::find(request()->post_id);
            $data = [
                'post' => $post,
                'pageTitle' => 'Edit Post',
            ];
            return view('backend.pages.edit_post', $data);
        }
    }

    public function updatePost(Request $request)
    {
        if ($request->hasFile('featured_image')) {
            $request->validate([
                'post_title' => 'required|unique:posts,post_title,' . $request->post_id,
                'post_content' => 'required',
                'post_category' => 'required|exists:sub_categories,id',
                'featured_image' => 'mimes:jpeg,jpg,png|max:1024',
            ]);

            $path = "images/post_images/";
            $file = $request->file('featured_image'); // Corrigido de $files para $file
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename; // Adicionado underscore para melhor legibilidade

            $upload = Storage::disk('public')->put($path . $new_filename, (string) file_get_contents($file));

            $post_thumbnails_path = $path . 'thumbnails';
            if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            }

            // Cria as versões redimensionadas
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $path . 'thumbnails/thumb_' . $new_filename));

            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $path . 'thumbnails/resized_' . $new_filename));

            if ($upload) {
                $post = Post::find($request->post_id);
                $old_post_image = $post->featured_image;

                // Remove as imagens antigas se existirem
                if ($old_post_image != null) {
                    if (Storage::disk('public')->exists($path . $old_post_image)) {
                        Storage::disk('public')->delete($path . $old_post_image);
                    }

                    if (Storage::disk('public')->exists($path . 'thumbnails/resized_' . $old_post_image)) {
                        Storage::disk('public')->delete($path . 'thumbnails/resized_' . $old_post_image); //
                    }

                    if (Storage::disk('public')->exists($path . 'thumbnails/thumb_' . $old_post_image)) {
                        Storage::disk('public')->delete($path . 'thumbnails/thumb_' . $old_post_image); //
                    }
                }

                // Atualiza o post com a nova imagem
                $post->category_id = $request->post_category;
                $post->post_slug = null;
                $post->post_content = $request->post_content;
                $post->post_tags = $request->post_tags;
                $post->post_title = $request->post_title;
                $post->featured_image = $new_filename;
                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'Post editado com sucesso.']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Erro ao editar o post.']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'Erro ao fazer upload da imagem.']);
            }
        } else {
            $request->validate([
                'post_title' => 'required|unique:posts,post_title,' . $request->post_id,
                'post_content' => 'required',
                'post_category' => 'required|exists:sub_categories,id',
            ]);

            $post = Post::find($request->post_id);
            $post->category_id = $request->post_category;
            $post->post_slug = null;
            $post->post_content = $request->post_content;
            $post->post_tags = $request->post_tags;
            $post->post_title = $request->post_title;
            $saved = $post->save();

            if ($saved) {
                return response()->json(['code' => 1, 'msg' => 'Post editado com sucesso.']);
            } else {
                return response()->json(['code' => 3, 'msg' => 'Erro ao editar o post.']);
            }
        }
    }
}
