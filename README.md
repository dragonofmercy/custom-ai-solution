# Custom AI Solution for Spatie Ignition

With this package you can use your custom AI service for Spatie Ignition Error Solution

### Installation

```bash
composer require dragonofmercy/custom-ai-solution --dev
```

### Register solution provider in Ignition

Open `ignition.php` in your `Config` directory.   
Just add `\Dragon\CustomAi\CustomAiSolutionProvider::class` in the `solution_providers` array.

```php
'solution_providers' => [
    ...
    UnknownMysql8CollationSolutionProvider::class,
    UnknownMariadbCollationSolutionProvider::class,
    \Dragon\CustomAi\CustomAiSolutionProvider::class
],
```

### Configure your service

Just update your `.env`

```dotenv
ES_CUSTOMAI_ENDPOINT=https://api.groq.com/openai/v1
ES_CUSTOMAI_API_KEY={your-api-key}
ES_CUSTOMAI_MODEL=deepseek-r1-distill-qwen-32b
```

---

My personal recommandation:  
Use https://groq.com/ service, you will have a lot of free tokens by daily and a lot of available models.

---

If this project help to increase your productivity, you can give me a cup of coffee :)

<a href="https://ko-fi.com/dragonofmercy" target="_blank"><img src="https://cdn.ko-fi.com/cdn/kofi2.png?v=3" alt="Donate" width="160px" /></a>