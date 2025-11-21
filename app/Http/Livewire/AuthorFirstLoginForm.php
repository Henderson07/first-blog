<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorFirstLoginForm extends Component
{
    public $name;
    public $email;
    public $password;
    public $agree = false;

    public function firstLoginHandler()
    {
        $this->validate([
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'agree'    => 'accepted',
        ], [
            'agree.accepted' => 'Você deve aceitar os termos.'
        ]);

        try {

            $user = User::create([
                'name'           => $this->name,
                'email'          => $this->email,
                'username'       => explode('@', $this->email)[0],
                'password'       => Hash::make($this->password),
                'type'           => 2,
                'direct_publish' => 1,
                'picture'        => '/backend/dist/img/authors/default.jpg'
            ]);

            $data = (object)[
                'name'     => $user->name,
                'username' => $user->username,
                'email'    => $user->email,
                'password' => $this->password,
                'url'      => route('author.login')
            ];

            $mail_body = view('emails.new-author-email-template', compact('data'))->render();

            $mailConfig = [
                'mail_from_email'      => config('mail.from.address'),
                'mail_from_name'       => config('mail.from.name'),
                'mail_recipient_email' => $user->email,
                'mail_recipient_name'  => $user->name,
                'mail_subject'         => 'Bem-vindo ao painel de autores',
                'mail_body'            => $mail_body,
            ];

            // sendMail($mailConfig);

            session()->flash('success', 'Conta criada com sucesso! Faça login.');

            return redirect()->route('author.login', [
                'email' => $user->email
            ]);
        } catch (\Throwable $e) {

            \Log::error('Erro ao criar conta no first login', [
                'msg'  => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            session()->flash('error', 'Não foi possível criar sua conta.');
        }
    }


    public function render()
    {
        return view('livewire.author-first-login-form');
    }
}
