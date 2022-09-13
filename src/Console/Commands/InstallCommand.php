<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\File;
use Tall\Console\MakeCommand;


class InstallCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tall:install  {--force}  {--m}  {--j}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Intalação do pacote';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        if ($this->option('force')) {

            if ($this->option('j')) {               
                $this->call('jetstream:install',[
                    'livewire' => true
                ]);
            }
            
            $path=database_path('migrations');
            foreach ((new \Symfony\Component\Finder\Finder)->in($path)->files()->name('*.php') as $file) {
                File::delete($file->getRealPath());
            }  
            $path=database_path('factories');
            foreach ((new \Symfony\Component\Finder\Finder)->in($path)->files()->name('*.php') as $file) {
                File::delete($file->getRealPath());
            }
            
            $path=database_path('seeders');
            foreach ((new \Symfony\Component\Finder\Finder)->in($path)->files()->name('*.php') as $file) {
                File::delete($file->getRealPath());
            }

            $this->call('vendor:publish',[
                '--tag' => 'tall',
                '--force' => true
            ]);
            File::put(app_path('Models/User.php'), file_get_contents(base_path('stubs/user-model.stub')));
            File::put(app_path('Models/Role.php'), file_get_contents(base_path('stubs/role-model.stub')));
            File::put(app_path('Models/Permission.php'), file_get_contents(base_path('stubs/permission-model.stub')));
            File::put(app_path('Models/Menu.php'), file_get_contents(base_path('stubs/menu-model.stub')));
            File::put(app_path('Models/SubMenu.php'), file_get_contents(base_path('stubs/sub-menu-model.stub')));
            if ($this->option('m')) {
                $this->call('migrate:fresh',[
                    '--seed' => true
                ]);
            }
        }
        else{
            $this->call('vendor:publish',[
                '--tag' => 'tall'
            ]);
        }
      

        $this->line("<options=bold,reverse;fg=green> WHOOPS-IE-TOOTLES </> 😳 \n");
    }
}

