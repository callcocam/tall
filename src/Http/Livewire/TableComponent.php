<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Http\Livewire;
use Tall\Http\Livewire\Traits\DateRange;
use Livewire\WithPagination;
use Carbon\Carbon;
use Tall\Http\Livewire\Traits\Relationship;
use Illuminate\Database\Eloquent\Builder;


abstract class TableComponent extends AbstractComponent
{
    use WithPagination;

    protected $paginationTheme = 'persom';

    public $filters = [];

    protected $builder;

    protected $queryString = [
        'filters' => ['except' => []],
        'page' => ['except' => 1],
    ];

    public function query()
    {
        return null;
    }

    public function layout()
    {
        return "tall::layouts.admin";
    }

    public function view()
    {
        return 'tall::table';
    }


    public function columns()
    {
        return ['name'];
    }

    protected function data(){
        return [
            'models'=>$this->models()
        ];
    }

    protected function models()
    {
        $this->builder = $this->query();
        if($this->builder){
            if(data_get($this->filters,'start') && data_get($this->filters,'end')){
                $this->builder->whereBetween('created_at', [
                    date_carbom_format(data_get($this->filters,'end'))->format('Y-m-d'),
                    date_carbom_format(data_get($this->filters,'start'))->format('Y-m-d')
                ]);
            }
            elseif(data_get($this->filters,'start')){
                $this->builder->whereBetween('created_at', [
                    date_carbom_format(data_get($this->filters,'start'))->format('Y-m-d'),
                    Carbon::now()->startOfMonth()
                ]);
            }
            elseif(data_get($this->filters,'end')){
                $this->builder->whereBetween('created_at', [
                   Carbon::now()->startOfMonth(),
                   date_carbom_format(data_get($this->filters,'end'))->format('Y-m-d')
                ]);
            }
            if($sort = data_get($this->filters,'sort')){
                if($dir = data_get($this->filters,'dir')){
                     $dir = strtolower($dir) == 'asc' ?'desc':'asc';     
                     data_set($this->filters,'dir',$dir);               
                }
                else{
                    $dir =  'asc';   
                    data_set($this->filters,'dir',$dir);
                }
                $this->builder->orderBy($sort,$dir);
            }
            if($status = data_get($this->filters,'status')){
                $this->builder->where('status',$status);
            }
            if($search =  data_get($this->filters,'search')){
                $this->builder->where(function (Builder $builder) use($search){
                    foreach ($this->columns() as $column) {
                        if (\Str::contains($column, '.')) {
                            $relationship = $this->relationship($column);

                            $builder->orWhereHas($relationship->name, function (Builder $query) use ($relationship, $search) {
                                $query->where($relationship, 'like', '%' . $search . '%');
                            });
                        } elseif (\Str::endsWith($column, '_count')) {
                            // No clean way of using having() with pagination aggregation, do not search counts for now.
                            // If you read this and have a good solution, feel free to submit a PR :P
                        } else {
                            $builder->orWhere($builder->getModel()->getTable() . '.' . $column, 'like', '%' . trim($search) . '%');
                        }
                    }
                });
            }
            return $this->builder->paginate();
        }
        return [];
    }

    public function updatedFilters($value)
    {
        $this->resetPage();

        if(!array_filter($this->filters)){
            $this->reset(['filters']);
        }
    }

    public function resetFilter($filter)
    {
        \Arr::forget($this->filters, $filter);
    }

    public function resetFilters()
    {
        $this->reset(['filters']);
    }
}
