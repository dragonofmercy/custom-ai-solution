<?php

namespace Dragon\CustomAi;

use OpenAI\Factory;
use Spatie\ErrorSolutions\Solutions\OpenAi\OpenAiSolution;
use Spatie\ErrorSolutions\Solutions\OpenAi\OpenAiSolutionResponse;

class CustomAiSolution extends OpenAiSolution
{
    public function getAiSolution(): ?OpenAiSolutionResponse
    {
        $solution = $this->cache->get($this->getCacheKey());

        if($solution){
            return new OpenAiSolutionResponse($solution);
        }

        $solutionText = $this->getClient($this->openAiKey)
            ->chat()
            ->create([
                'model' => $this->getModel(),
                'messages' => [['role' => 'user', 'content' => $this->prompt]],
                'max_tokens' => 1000,
                'temperature' => 0,
            ])->choices[0]->message->content;


        $this->cache->set($this->getCacheKey(), $solutionText, $this->cacheTtlInSeconds);

        return new OpenAiSolutionResponse($solutionText);
    }

    protected function getClient(string $apiKey)
    {
        return (new Factory())
            ->withBaseUri(config('services.es-custom-ai.endpoint', 'https://api.openai.com/v1'))
            ->withApiKey($apiKey)
            ->withHttpHeader('HTTP-Referer', config('app.url'))
            ->withHttpHeader('X-Title', 'Spatie Ignition AI Solution')
            ->make();
    }
}