#TALL STATUS


#EXEMPLOS

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