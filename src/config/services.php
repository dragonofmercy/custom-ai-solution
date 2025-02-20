<?php
return [

    'es-custom-ai' => [

        /*
        |--------------------------------------------------------------------------
        | Ai service endpoint
        |--------------------------------------------------------------------------
        |
        | Use this option to set your custom endpoint url.
        |
        */

        'endpoint' => env('ES_CUSTOMAI_ENDPOINT', 'https://api.openai.com/v1'),

        /*
        |--------------------------------------------------------------------------
        | Api Key
        |--------------------------------------------------------------------------
        |
        | Use this option to set your custom ai provider api key.
        |
        */

        'api_key' => env('ES_CUSTOMAI_API_KEY'),

        /*
        |--------------------------------------------------------------------------
        | AI model
        |--------------------------------------------------------------------------
        |
        | Use this option to choose which model you want to use.
        | To be sure to use the correct model name, click on a model and then go to
        | the API tab, scroll down a little bit to see the samples. You will see
        | the model name just after the "model:" keyword.
        |
        */

        'model' => env('ES_CUSTOMAI_MODEL', 'gpt-3.5-turbo')

    ]

];