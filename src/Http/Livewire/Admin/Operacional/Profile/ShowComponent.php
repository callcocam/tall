<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Admin\Operacional\Profile;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\FormComponent;
use App\Models\User;

class ShowComponent extends FormComponent
{
    use AuthorizesRequests;

    public $title = "Profile";

    public function mount()
    {
         $this->authorize(Route::currentRouteName());       
         $this->setFormProperties(auth()->user());
    }

    public function route(){
        Route::get('/operacional/minha-conta', static::class)->name('admin.profile.view');
    }

    public function getListProperty()
    {
        return 'dashboard';
    }
    public function view()
    {
        return 'admin.operacional.profile.show';
    }
}
