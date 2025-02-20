<?php

namespace Dragon\CustomAi;

use Illuminate\Support\Str;
use OpenAI\Client;
use Spatie\Ignition\Contracts\HasSolutionsForThrowable;
use Throwable;

class CustomAiSolutionProvider implements HasSolutionsForThrowable
{
    public function canSolve(Throwable $throwable): bool
    {
        if(!class_exists(Client::class)){
            return false;
        }

        if(config('services.es-custom-ai.api_key') === null){
            return false;
        }

        return true;
    }

    public function getSolutions(Throwable $throwable): array
    {
        return [
            new CustomAiSolution(
                throwable: $throwable,
                openAiKey: config('services.es-custom-ai.api_key'),
                cache: cache()->store(config('cache.default')),
                cacheTtlInSeconds: 60,
                applicationType: 'Laravel ' . Str::before(app()->version(), '.'),
                applicationPath: base_path(),
                openAiModel: config('services.es-custom-ai.model', 'gpt-3.5-turbo'),
            ),
        ];
    }
}