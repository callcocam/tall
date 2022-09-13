<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Console\Commands;

use Illuminate\Console\Command;

class CrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name} {model} {--force} {--inline} {--test} {--stub }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new  crud Livewire component';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $this->call('make:table',[
            'name'=>$this->argument('name'),
            'model' => $this->argument('model')
        ]);
        $this->call('make:create',[
            'name'=>$this->argument('name'),
            'model' => $this->argument('model')
        ]);
        $this->call('make:edit',[
            'name'=>$this->argument('name'),
            'model' => $this->argument('model')
        ]);
        $this->call('make:show',[
            'name'=>$this->argument('name'),
            'model' => $this->argument('model')
        ]);
        $this->call('make:delete',[
            'name'=>$this->argument('name'),
            'model' => $this->argument('model')
        ]);

        $this->call('make:model',[
            'name'=>$this->argument('model'),
            '-m' => true,
            '-f' => true,
            '-s' => true,
        ]);

    }
}
