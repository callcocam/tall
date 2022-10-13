<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/

namespace Tall\Http\Livewire\Site;


//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Tall\Http\Livewire\AbstractComponent;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class DashBoardComponent extends AbstractComponent
{
   // use AuthorizesRequests;

    public $title = "User";

    
    public function route(){
        Route::get('/app', static::class)->name('app');
    }

    public function view()
    {
        return 'tall::site.dash-board';
    }
}
