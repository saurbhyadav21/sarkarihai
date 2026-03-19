<?php

$apiKey = "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";

$data = [
    "model" => "deepseek/deepseek-chat", // ✅ updated model
    "temperature" => 0,
    "messages" => [
        [
            "role" => "user",
            "content" => "Convert this job title into JSON with fields title, start_date, last_date, salary_min, salary_max, age_min, age_max, qualification, total_vacancy, exam_date, official_website, sector, department. Job Title: UPPSC GIC Lecturer Recruitment 2025. Only return JSON."
        ]
    ]
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://openrouter.ai/api/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json",
    "HTTP-Referer: http://localhost",
    "X-Title: Job AI Tool"
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);