<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use function Livewire\str;

class ComponentParser
{
    protected $model;
    protected $appPath;
    protected $viewPath;
    protected $component;
    protected $componentClass;
    protected $directories;

    public function __construct($classNamespace, $viewPath, $rawCommand,$model, $stubSubDirectory = '')
    {

        $this->baseClassNamespace = $classNamespace;
        $this->model = $model;

        $classPath = static::generatePathFromNamespace($classNamespace);

        $this->baseClassPath = rtrim($classPath, DIRECTORY_SEPARATOR).'/';
        $this->baseViewPath = rtrim($viewPath, DIRECTORY_SEPARATOR).'/';

        if(! empty($stubSubDirectory) && str($stubSubDirectory)->startsWith('..')) {
            $this->stubDirectory = rtrim(str($stubSubDirectory)->replaceFirst('..' . DIRECTORY_SEPARATOR, ''), DIRECTORY_SEPARATOR).'/';
        } else {
            $this->stubDirectory = rtrim('stubs'.DIRECTORY_SEPARATOR.$stubSubDirectory, DIRECTORY_SEPARATOR).'/';
        }

        $directories = preg_split('/[.\/(\\\\)]+/', $rawCommand);

        $camelCase = str(array_pop($directories))->camel();
        $kebabCase = str($camelCase)->kebab();

        $this->component = $kebabCase;
        $this->componentClass = str($this->component)->studly();

        $this->directories = array_map([Str::class, 'studly'], $directories);
    }

    public function component()
    {
        return $this->component;
    }

    public function classPath()
    {
        return $this->baseClassPath.collect()
            ->concat($this->directories)
            ->push($this->classFile())
            ->implode('/');
    }

    public function relativeClassPath() : string
    {
        return str($this->classPath())->replaceFirst(base_path().DIRECTORY_SEPARATOR, '');
    }

    public function classFile()
    {
        return $this->componentClass.'.php';
    }

    public function classNamespace()
    {
        return empty($this->directories)
            ? $this->baseClassNamespace
            : $this->baseClassNamespace.'\\'.collect()
                ->concat($this->directories)
                ->map([Str::class, 'studly'])
                ->implode('\\');
    }

    public function className()
    {
        return $this->componentClass;
    }

    public function classContents($inline)
    {
        $stubName = sprintf('livewire.%s.stub', $inline);

        if (File::exists($stubPath = base_path($this->stubDirectory.$stubName))) {
            $template = file_get_contents($stubPath);
        } else {
            $template = file_get_contents(__DIR__.DIRECTORY_SEPARATOR.$stubName);
        }

        if ($inline) {
            $template = preg_replace('/\[quote\]/', $this->wisdomOfTheTao(), $template);
        }
        $model = $this->model;
        if(!Str::contains($this->model, '\\')){
            $model = sprintf("App\\Models\\%s", $this->model);
        }
        $route = Str::afterLast($this->viewName(),"livewire.admin.");
        $route = Str::beforeLast( $route, "-component");
        $route = Str::beforeLast( $route, ".list");
        $route = Str::beforeLast( $route, ".create");
        $route = Str::beforeLast( $route, ".edit");
        $route = Str::beforeLast( $route, ".show");
        $route = Str::beforeLast( $route, ".delete");
        $path = Str::afterLast( $route, "admin.");
        $route = Str::afterLast( $route, ".");
        //$path = Str::beforeLast( $path, ".");
        $path = Str::replace(  ".", "/", $path);
        if(function_exists('renameroute')){
            $route =renameroute($this->model);
        }
        else{
            // $route = Str::replace( ".","-", $route);
            // $route = Str::replace( ".","-", $route);
            $routeModel = Str::slug($this->model);
            $routeModel = Str::of($routeModel)->plural();
            $route = Str::of($routeModel)->prepend('admin.')->value;
        }
        
        //  dd($route,$path);
       $view = $this->viewName();
       $view = Str::replace(  "livewire.", "", $view);
       $view = Str::replace(  "-component", "", $view);

        return preg_replace(
            ['/\[model\]/', '/\[modelnamespace\]/','/\[path\]/', '/\[route\]/', '/\[namespace\]/', '/\[class\]/', '/\[view\]/'],
            [$this->model, $model, $path, $route, $this->classNamespace(), $this->className(), $view],
            $template
        );
    }

    public function viewPath()
    {
        return $this->baseViewPath.collect()
            ->concat($this->directories)
            ->map([Str::class, 'kebab'])
            ->push($this->viewFile())
            ->implode(DIRECTORY_SEPARATOR);
    }

    public function relativeViewPath() : string
    {
        return str($this->viewPath())->replaceFirst(base_path().'/', '');
    }

    public function viewFile()
    {
        return $this->component.'.blade.php';
    }

    public function viewName()
    {
        return collect()
            ->when(config('livewire.view_path') != resource_path(), function ($collection) {
                return $collection->concat(explode('/',str($this->baseViewPath)->after(resource_path('views'))));
            })
            ->filter()
            ->concat($this->directories)
            ->map([Str::class, 'kebab'])
            ->push($this->component)
            ->implode('.');
    }

    public function viewContents($view)
    {
        if( ! File::exists($stubPath = base_path($this->stubDirectory."livewire.view.{$view}.stub"))) {
            $stubPath = __DIR__.DIRECTORY_SEPARATOR.'livewire.view.stub';
        }

        return preg_replace(
            ['/\[model\]/','/\[quote\]/'],
            [$this->model,$this->wisdomOfTheTao()],
            file_get_contents($stubPath)
        );
    }

    public function testNamespace()
    {
        return empty($this->directories)
            ? $this->baseTestNamespace
            : $this->baseTestNamespace.'\\'.collect()
                ->concat($this->directories)
                ->map([Str::class, 'studly'])
                ->implode('\\');
    }

    public function testClassName()
    {
        return $this->componentClass.'Test';
    }

    public function testFile()
    {
        return $this->componentClass.'Test.php';
    }

    public function testPath()
    {
        return $this->baseTestPath.collect()
        ->concat($this->directories)
        ->push($this->testFile())
        ->implode('/');
    }



    public function wisdomOfTheTao()
    {
        $wisdom = require __DIR__.DIRECTORY_SEPARATOR.'the-tao.php';

        return Arr::random($wisdom);
    }

    public static function generatePathFromNamespace($namespace)
    {
        $name = str($namespace)->finish('\\')->replaceFirst(app()->getNamespace(), '');
        return app('path').'/'.str_replace('\\', '/', $name);
    }


}
