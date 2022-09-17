<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace Tall\Console;

use Illuminate\Support\Facades\File;
use Livewire\Commands\FileManipulationCommand;

class MakeCommand extends FileManipulationCommand
{

    protected $gararComponent = false;

    public function generateMenu($menus=[], $data=[])
    {
        $menu = null;
        if ($this->confirm('Deseja gerar o menu?', true)) {
            $menu = $this->choice(
                'Selecione um menu?',
                $menus
            );
        }
        if($menu){
            if($menu = \App\Models\Menu::find($menu)){
                $this->generateSubMenu($menu, $data);
            }
            else
            {
                $name = data_get($menus, $menu);
                $this->line("<fg=red;options=bold>Não foi possivel recupear os sub menus do menu selecionado:</> {$name}");
            }
        }
    }

    public function generateSubItem($submenus,$menu, $data){
            $submenu  = null;
            $name = data_get($menu, 'name');            
            $submenu = $this->choice(
                sprintf('Ja Selecione um menu para realacionar o novo sub menu :)',$menu->name),
                 $submenus
            );
            if ($submenu= \App\models\SubMenu::find($submenu)) {
                 //Verificar se ja tem sub menus
                $submenuitems = $submenu->sub_menus()->pluck('name','id');
                if($submenuitems->count()){
                    if ($this->confirm(sprintf('Ja existe sub menus para [ %s ] deseja criar um sub item?',$submenu->name), true)) {
                        $this->generateSubItem($submenuitems->toArray(), $menu, $data);
                        return;
                    }
                }
            }
            $data['sub_menu_id '] = $submenu->id;
            $this->createMenu($submenu, $data, $name);
            return;
    }

    public function generateSubMenu($menu, $data)
    {
        //Verificar se ja tem sub menus
        $submenus = $menu->sub_menus()->pluck('name','id');
        if($submenus->count()){
            if ($this->confirm('Ja existe sub menus deseja criar um sub item?', true)) {
                $this->generateSubItem($submenus->toArray(), $menu, $data);
                return;
            }
        }
         //Se não tiver sub menus so pode criar menus
         $name = data_get($menu, 'name');
         $this->createMenu($menu, $data, $name);
    }

    public function createMenu($menu, $data, $name)
    {
   
        if($submenu =  $menu->sub_menus()->create([
            config('tall.current_tenant_key','tenant_id')=>data_get($menu, config('tall.current_tenant_key','tenant_id')),
            'name'=>data_get($data,'name'),
            'sub_menu_id'=>data_get($data,'sub_menu_id', null),
            'slug'=>$this->gararComponent ? data_get($data,3) : null,
            'link'=>$this->gararComponent ? data_get($data,2) : null,
            'icone'=>'arrow-left',
            'description'=>data_get($data,'name'),
            'ordering'=>1,
        ])){
            $this->line("<fg=green;options=bold>Menu criado com sucesso:</> {$submenu->name}");
        }else{
            $this->line("<fg=red;options=bold>Não foi possivel recupear os sub menus do menu selecionado:</> {$name}");
        }
    }
    public function handle()
    {
       
    
        if($this->gararComponent){
            if (!$this->isClassNameValid($name = $this->parser->className())) {
                $this->line("<options=bold,reverse;fg=red> WHOOPS! </> 😳 \n");
                $this->line("<fg=red;options=bold>Class is invalid:</> {$name}");

                return;
            }

            if ($this->isReservedClassName($name)) {
                $this->line("<options=bold,reverse;fg=red> WHOOPS! </> 😳 \n");
                $this->line("<fg=red;options=bold>Class is reserved:</> {$name}");

                return;
            }
        }

        $force = $this->option('force');
        $inline = $this->option('inline');

        $showWelcomeMessage = $this->isFirstTimeMakingAComponent();

        $class = $this->createClass($force, $inline);
        $view = $this->createView($force, $inline);

        $this->refreshComponentAutodiscovery();
        if(!$this->gararComponent){
            $this->parser->relativeClassPath();
            $this->parser->relativeViewPath();
            return;
        }
        if($class || $view) {
            $this->line("<options=bold,reverse;fg=green> COMPONENT CREATED </> 🤙\n");
            $class && $this->line("<options=bold;fg=green>CLASS:</> {$this->parser->relativeClassPath()}");

            if (! $inline) {
                $view && $this->line("<options=bold;fg=green>VIEW:</>  {$this->parser->relativeViewPath()}");
            }
            
            if ($showWelcomeMessage && ! app()->runningUnitTests()) {
                $this->writeWelcomeMessage();
            }
        }
    }

   
    public function isClassNameValid($name)
    {
        return preg_match("/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/", $name);
    }
    
    public function isReservedClassName($name)
    {
        return array_search(strtolower($name), $this->getReservedName()) !== false;
    }

    private function getReservedName()
    {
        return [
            'parent',
            'component',
            'interface',
            '__halt_compiler',
            'abstract',
            'and',
            'array',
            'as',
            'break',
            'callable',
            'case',
            'catch',
            'class',
            'clone',
            'const',
            'continue',
            'declare',
            'default',
            'die',
            'do',
            'echo',
            'else',
            'elseif',
            'empty',
            'enddeclare',
            'endfor',
            'endforeach',
            'endif',
            'endswitch',
            'endwhile',
            'eval',
            'exit',
            'extends',
            'final',
            'finally',
            'fn',
            'for',
            'foreach',
            'function',
            'global',
            'goto',
            'if',
            'implements',
            'include',
            'include_once',
            'instanceof',
            'insteadof',
            'interface',
            'isset',
            'list',
            'namespace',
            'new',
            'or',
            'print',
            'private',
            'protected',
            'public',
            'require',
            'require_once',
            'return',
            'static',
            'switch',
            'throw',
            'trait',
            'try',
            'unset',
            'use',
            'var',
            'while',
            'xor',
            'yield',
        ];
    }

}
