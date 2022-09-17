#TALL STATUS


#EXEMPLOS

#COMMANDS

```
... artisan make:crud path-do-component Model 

Exemplo artisan make:crud posts Post

vai gerar 4 components
/Http/Livewire/Admin/Pots/ListComponent.php
/Http/Livewire/Admin/Pots/CreateComponent.php
/Http/Livewire/Admin/Pots/EditComponent.php
/Http/Livewire/Admin/Pots/ShowComponent.php
/Http/Livewire/Admin/Pots/DeleteComponent.php
ou
... artisan make:crud posts.categorias Post
/Http/Livewire/Admin/Pots/Categorias/ListComponent.php
....

#CRIAR PAGINAS E MAIS COMPLEXO



```
#FILTROS API CONTROLLER

```
<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace App\Http\Controllers\Api\Categories\Filters;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function __invoke(Request $request): Collection
    {
        return Category::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->when($request->search,fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%")
            )
            ->when($request->exists('selected'),fn (Builder $query) => $query->orWhereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }
}

```