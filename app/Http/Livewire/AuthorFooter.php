<?php

namespace App\Http\Livewire;

use App\Models\GeneralSettings;
use Livewire\Component;

class AuthorFooter extends Component
{
    public $general_settings;
    protected $listeners = [
        'updateAuthorFooter' => '$refresh'
    ];
    public function mount()
    {
        $this->general_settings = GeneralSettings::find(1);
    }
    public function render()
    {
        return view('livewire.author-footer');
    }
}
