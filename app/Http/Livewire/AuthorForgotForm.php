<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthorForgotForm extends Component
{
    public $email;

    public function ForgotHandler()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Insira um e-mail',
            'email.email' => 'Endereço de e-mail inválido',
            'email.exists' => 'E-mail não encontrado',
        ]);

        $token = base64_encode(Str::random(64));
        DB::table('password_resets')->insert([
            'email' => $this->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $user  = User::where('email', $this->email)->first();
        $link  = route('author.reset-form', ['token' => $token, 'email' => $this->email]);
        $body_message  = "Recebemos uma solicitação para redefinir a senha da conta do <b>Blog Hensso</b> associada a " . $this->email . ".<br><br>";
        $body_message .= "Você pode redefinir sua senha clicando no botão abaixo:<br><br>";
        $body_message .= '<div style="text-align:center;">
            <a href="' . $link . '" class="btn">Redefinir senha</a>
            </div>';

        $data = array(
            'name' => $user->name,
            'body_message' => $body_message,
        );

        $mail_body = view('emails.forgot-email-template', $data)->render();
        $mailConfig = [
            'mail_from_email' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
            'mail_recipient_email' => $user->email,
            'mail_recipient_name' => $user->name,
            'mail_subject' => 'Redefinição de Senha',
            'mail_body' => $mail_body,
        ];

        sendMail($mailConfig);

        $this->email = null;
        session()->flash('success', 'Enviamos por e-mail seu link de redefinição de senha');
    }
    public function render()
    {
        return view('livewire.author-forgot-form');
    }
}
