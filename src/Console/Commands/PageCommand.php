<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Console\Commands;


use Tall\Console\MakeCommand;

use Illuminate\Support\Facades\File;

class PageCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =  'make:page {name} {model?} {--force} {--inline} {--test} {--stub }';

     /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new page Livewire component';

    protected $stubComp ="page";

    protected $stubView ="page";
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        // $path=app_path('Http/Livewire/Site');
        // foreach ((new \Symfony\Component\Finder\Finder)->in($path)->files()->name('*.php') as $file) {
        //     File::delete($file->getRealPath());
        // }  
        $model = \Str::title($this->argument('name'));
        if ($this->confirm('Deseja gerar os components?', true)) {
          $this->gararComponent = true;
          $model = $this->getModel($this->argument('model'));
        }
       
        $this->parser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            sprintf("site.%s-component", $this->argument('name')),
            $model,
            $this->option('stub')
        );

        parent::handle();

        $data = $this->parser->getData();

        $name = \Str::replace('-',' ', $this->argument('name'));
        $data['name'] = \Str::title($name);

        $this->generateMenu($this->parser->getMenus(), $data);
    }

    protected function createClass($force = false, $inline = false)
    {
        $classPath = $this->parser->classPath();

        if (File::exists($classPath) && ! $force) {
            $this->line("<options=bold,reverse;fg=red> WHOOPS-IE-TOOTLES </> 😳 \n");
            $this->line("<fg=red;options=bold>Class already exists:</> {$this->parser->relativeClassPath()}");

            return false;
        }

        $this->ensureDirectoryExists($classPath);
        if($this->gararComponent){
            File::put($classPath, $this->parser->classContents($this->stubComp));
        }
        else{
            $this->parser->classContents($this->stubComp);
        }

        return $classPath;
    }

    protected function createView($force = false, $inline = false)
    {
        if ($inline) {
            return false;
        }
        $viewPath = $this->parser->viewPath();

        if (File::exists($viewPath) && ! $force) {
            $this->line("<fg=red;options=bold>View already exists:</> {$this->parser->relativeViewPath()}");

            return false;
        }

        $this->ensureDirectoryExists($viewPath);

        if($this->gararComponent){
            File::put($viewPath, $this->parser->viewContents($this->stubView));
        }

        return $viewPath;
    }

    public function getModel($model)
    {
        if(!$model){
            $model = $this->choice(
                'Adcionar um model para adicionar como dependencia?',
                ['User', 'Tenant','NO'],
                'NO'
            );
            $this->info('Você pode remover ou adicionar uma dependencia do model no componente se desejar!');
            if($model == 'NO'){
                $this->stubComp = "inline.page";
                $model = \Str::title($this->argument('name'));
            }
        }
        return $model;
    }
}
