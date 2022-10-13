<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Http\Livewire\Admin;

use Tall\Http\Livewire\AbstractComponent;
use Illuminate\Support\Facades\Route;
use Tall\Models\Menu;
use Tall\Models\SubMenu;

class DashboardComponent extends AbstractComponent
{

    // public $search="";
    // public function mount()
    // {
    //    dd(auth()->user());
    // }

    public function route(){
        Route::get('', static::class)->name('dashboard');
    }

    protected function layout()
    {
        return "tall::layouts.admin";
    }

    public function view()
    {
        return 'tall::admin.dashboard';
    }
}
