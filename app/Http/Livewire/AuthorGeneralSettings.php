<?php

namespace App\Http\Livewire;

use App\Models\GeneralSettings;
use Livewire\Component;

class AuthorGeneralSettings extends Component
{
    public $general_settings;

    public $blog_name, $blog_email, $blog_description;

    public function mount()
    {
        $this->general_settings = GeneralSettings::find(1);
        $this->blog_name = $this->general_settings->blog_name;
        $this->blog_email = $this->general_settings->blog_email;
        $this->blog_description = $this->general_settings->blog_description;
    }
    public function updateGeneralSettings()
    {
        $this->validate([
            'blog_name' => 'required',
            'blog_email' => 'required|email',
        ]);

        $update = $this->general_settings->update([
            'blog_name' => $this->blog_name,
            'blog_email' => $this->blog_email,
            'blog_description' => $this->blog_description,
        ]);

        if($update){
            session()->flash('success', 'Configuração geral alterada com sucesso');
            $this->emit('updateAuthorFooter');
        }else{
            session()->flash('error', 'Algo deu errado.');
        }
    }

    public function showToastr($message, $type)
    {
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.author-general-settings');
    }
}
