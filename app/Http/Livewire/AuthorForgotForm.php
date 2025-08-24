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
        $body_message = "Recebemos uma solicitação para redefinir a senha da conta do <b>Blog</b> associada a " . $this->email . ". <br> Você pode redefinir sua senha clicando no botão abaixo.";
        $body_message .= '<br>';
        $body_message .= '<a href="' . $link . '" target="_blank" style="color:#FFF;border-color:#22bc66;border-style:solid;border-width:10px 180px; background-color:#22bc66;display:inline-block;text-decoration:none;border-radius:3px;
        box-shadow:0 2px 3px rgba(0,0,0,0.16);-webkit-text-size-adjust:none;box-sizing:border-box">Alterar senha</a>';
        $body_message .= '<br>';
        $body_message .= 'Se você não solicitou uma redefinição de senha, ignore este e-mail';

        $data = array(
            'name' => $user->name,
            'body_message' => $body_message,
        );

        // Mail::send('emails.forgot-email-template', $data, function ($message) use ($user) {
        //     $message->from('noreply@example.com', 'Blog');
        //     $message->to($user->email, $user->name)
        //         ->subject('Redefinir senha');
        // });
        $mail_body = view('emails.forgot-email-template', $data)->render();
        $mailConfig = [
            'mail_from_email' => config('mail.from.address'),
            'mail_from_name' => config('mail.from.name'),
            'mail_recipient_email' => $user->email,
            'mail_recipient_name' => $user->name,
            'mail_subject' => 'Redefinição de Senha',
            'mail_body' => $mail_body,
        ];

        // dd($mailConfig);
        sendMail($mailConfig);

        $this->email = null;
        session()->flash('success', 'Enviamos por e-mail seu link de redefinição de senha');
    }
    public function render()
    {
        return view('livewire.author-forgot-form');
    }
}
