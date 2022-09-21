<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Landlord;

use Tall\Http\Livewire\AbstractComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;

class DashboardComponent extends AbstractComponent
{
    use AuthorizesRequests;

    // public $search="";
    public function mount()
    {
        $this->authorize(Route::currentRouteName());
    }

    public function route(){
        Route::get('', static::class)->name('dashboard');
    }

    protected function layout()
    {
        return "tall::layouts.admin";
    }

    public function view()
    {
        return 'tall::landlord.dashboard';
    }
}
