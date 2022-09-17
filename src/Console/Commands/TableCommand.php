<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Console\Commands;

use Tall\Console\MakeCommand;

use Illuminate\Support\Facades\File;

class TableCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:table {name} {model} {--force} {--inline} {--test}  {--stub= }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Table Livewire component';
    
    protected $gararComponent = true;

    public function handle()
    {
        $this->parser = new ComponentParser(
            config('livewire.class_namespace'),
            config('livewire.view_path'),
            sprintf("admin.%s.list-component", $this->argument('name')),
            $this->argument('model'),
            $this->option('stub')
        );

        parent::handle();
        
        $data = $this->parser->getData();

        $name = \Str::afterLast($this->argument('name'), '.');
        $name = \Str::replace('-',' ', $name);
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

        File::put($classPath, $this->parser->classContents("table"));

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

        File::put($viewPath, $this->parser->viewContents('table'));

        return $viewPath;
    }
}
