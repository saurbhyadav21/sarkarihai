<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function getOrganization($organization)
    {
        $prompt = <<<PROMPT
You are an expert in Indian government organizations.

Return ONLY valid JSON.

{
  "full_name":"",
  "short_name":"",
  "aliases":[]
}

Organization:
{$organization}
PROMPT;

        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->timeout(60)
            ->post('https://api.openai.com/v1/responses', [
                'model' => 'gpt-5.5-mini',
                'input' => $prompt,
            ]);

        if (!$response->successful()) {
            throw new \Exception($response->body());
        }

        $text = $response->json('output.0.content.0.text');

        return json_decode($text, true);
    }
}