<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use GS\Shared\Domain\Console\ConsoleCommand;

final class CreateModuleCommand extends Command implements ConsoleCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GS:make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the folder structure of a module';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() : void
    {
        $path = base_path($this->argument('name'));
        if (File::isDirectory($path)) {
            $this->error(sprintf('The %s directory already exists.', $this->argument('name')));
        }

        if (! File::makeDirectory($path)) {
            $this->error(sprintf('Could not create directory %s.', $this->argument('name')));
        }
        $this->info('Directory created successfully');

        if (! File::makeDirectory($path.'/Application')) {
            $this->error(sprintf('Could not create directory %s.', $this->argument('name').'/Application'));
        }

        if (! File::makeDirectory($path.'/Domain')) {
            $this->error(sprintf('Could not create directory %s.', $this->argument('name').'/Domain'));
        }

        if (! File::makeDirectory($path.'/Infrastructure')) {
            $this->error(sprintf('Could not create directory %s.', $this->argument('name').'/Infrastructure'));
        }
        $pathArray = explode('/', $this->argument('name'));
        $name = end($pathArray);
        $this->info(sprintf('Module %s directory system created successfully', $name));
    }
}
