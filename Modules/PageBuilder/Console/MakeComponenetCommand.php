<?php

namespace Modules\PageBuilder\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MakeComponenetCommand extends Command
{
    /**
     * Custom variables
     */
    protected $componenetName;
    protected $themeName;


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'builder:make-component';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a PageBuilder component.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        // define('DEFAULT_THEME','DefaultTheme');
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->setVariables();
        $this->createComponent();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of component.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['theme', 't', InputOption::VALUE_OPTIONAL, 'Name of theme.','DefaultTheme'],
        ];
    }

    protected function setVariables(){
        $this->componenetName = $this->argument('name');
        $this->themeName = $this->option('theme')??'';
    }

    protected function createComponent(){
        $component = $this->themeName.'/'.$this->componenetName;
        Artisan::call("module:make-component $component PageBuilder");
        $this->info('Component Created:');
        $this->info('Theme: '.$this->themeName);
        $this->info('Component: '.$this->componenetName);
    }
}
