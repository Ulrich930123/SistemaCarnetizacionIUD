<?php

declare(strict_types=1);

namespace GS\Shared\Infrastructure\Lumen\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Pluralizer;
use GS\Shared\Domain\Console\ConsoleCommand;

final class CreateProviderCommand extends Command implements ConsoleCommand
{
    protected $signature = 'GS:make:provider {name}';

    public function handle(): void
    {
        $path = $this->getSourceFilePath();
        $contents = $this->getSourceFile();

        if (!File::exists($path)) {
            File::put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    protected function getSingularClassName(string $name) : string
    {
        return ucwords(Pluralizer::singular($name));
    }

    protected function getStubPath() : string
    {
        return __DIR__ . '/../../../Domain/Stub/Provider/Provider.stub';
    }

    protected function getStubVariables(): array
    {

        return [
            'CLASS_NAME' => $this->getSingularClassName($this->argument('name'))
        ];
    }

    protected function getSourceFile(): bool|array|string
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }

    public function getStubContents($stub , $stubVariables = []): array|bool|string
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;
    }

    public function getSourceFilePath(): string
    {
        return base_path('src/Shared/Infrastructure/Lumen/Provider/') . $this->getSingularClassName($this->argument('name')) .'.php';
    }
}
