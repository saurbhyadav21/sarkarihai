<?php

use Illuminate\Support\Facades\Http;

$response = Http::withToken(env('OPENAI_API_KEY'))
    ->post('https://api.openai.com/v1/responses', [
        'model' => env('OPENAI_MODEL'),
        'input' => 'You are an expert in Indian Government Organizations.

Return ONLY valid JSON.

Input:

Organization:
ICAR Central Rice Research Institute

Output Format

{
 "full_name":"ICAR – Central Rice Research Institute",
 "short_name":"ICAR-CRRI"
}'
    ]);

dd($response->json());