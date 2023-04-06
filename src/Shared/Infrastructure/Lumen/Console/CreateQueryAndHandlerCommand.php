<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;
use GS\Shared\Domain\Console\ConsoleCommand;

final class CreateQueryAndHandlerCommand extends Command implements ConsoleCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GS:make:query {name} {--folder=} {--action=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Query and QueryHandler Class';


    public function handle(): void
    {
        $paths = ['query' => $this->getSourceFilePath(), 'handler' => $this->getSourceFilePath('Handler')];

        File::makeDirectory(dirname($paths['query']), 0755, true, true);
        foreach ($paths as $key => $path) {
            $stub = $this->getStubPath($key);
            $contents = $this->getSourceFile($stub);
            if (!File::exists($path)) {
                File::put($path, $contents);
                $this->info("File : {$path} created");
            } else {
                $this->info("File : {$path} already exits");
            }
        }
    }

    protected function getSingularClassName(string $name) : string
    {
        return ucwords(Pluralizer::singular($name));
    }

    protected function getStubPath(string $key) : string
    {
        $stub_paths = [
            'query' => __DIR__ . '/../../../Domain/Stub/Query/Query.stub',
            'handler' =>__DIR__ . '/../../../Domain/Stub/Query/QueryHandler.stub'
        ];

        return $stub_paths[$key];
    }

    protected function getStubVariables(): array
    {
        $namespace = 'GS';
        foreach(explode('/', $this->option('folder')) as $dir) {
            if ($dir === 'src') {
                continue;
            }
            $namespace .= '\\'.Str::ucfirst($dir);
        }

        return [
            'NAMESPACE' => $namespace.'\\Application\\'.$this->option('action'),
            'CLASS_NAME' => $this->getSingularClassName($this->argument('name'))
        ];
    }

    protected function getSourceFile($stub)
    {
        return $this->getStubContents($stub, $this->getStubVariables());
    }

    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;
    }

    public function getSourceFilePath($handler = '')
    {
        return base_path($this->option('folder').'/Application/'.$this->option('action').'/').$this->getSingularClassName($this->argument('name')) . $handler .'.php';
    }

}
