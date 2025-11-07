<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorResetForm extends Component
{
    public $email, $token, $new_password, $confirm_new_password;
    public function mount()
    {
        $this->email = request()->email;
        $this->token = request()->token;
    }
    public function ResetHandler()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|min:5',
            'confirm_new_password' => 'same:new_password',
        ], [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Endereço de e-mail inválido',
            'email.exists' => 'O email não foi encontrado',
            'new_password.required' => 'Insira a nova senha',
            'new_password.min' => 'O mínimo de caracteres deve ser 5',
            'confirm_new_password' => 'A nova senha e confirmação da nova senha devem corresponder'
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $this->email,
            'token' => $this->token,
        ])->first();
        if (!$check_token) {
            session()->flash('fail', 'Token inválido');
        } else {
            User::where('email', $this->email)->update([
                'password' => Hash::make($this->new_password),
            ]);

            DB::table('password_resets')->where([
                'email' => $this->email,
            ])->delete();

            $success_token = Str::random(64);
            session()->flash('success', 'Sua senha foi atualizada com sucesso. Faça login com seu e-mail (<span>' . $this->email . '</span>) e sua nova senha');

            $this->redirectRoute('author.login', ['tkn' => $success_token, 'uEmail' => $this->email]);
        }
    }
    public function render()
    {
        return view('livewire.author-reset-form');
    }
}
