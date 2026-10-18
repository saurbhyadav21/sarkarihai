<?php

$url = 'https://nakshtratak.com/api/panchang?lang=hi';

// पोस्ट करने के लिए JSON डेटा
$postData = json_encode([
    "day" => 18,
    "month" => 10,
    "year" => 2026,
    "lat" => 28.6139,
    "lon" => 77.209,
    "tz" => 5.5,
    "tzname" => ""
]);

$ch = curl_init($url);

// cURL विकल्प (Options) सेट करें
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

// कुकीज़ (Cookies) सेट करें
$cookies = '_ga=GA1.1.547723380.1792339784; ' .
           '_gcl_au=1.1.132493895.1792339784; ' .
           '__gads=ID=5644513e69c7fcd1:T=1792339783:RT=1792339783:S=ALNI_MZT5gYbkkNEjUFJDoPtZxeVQf8CkA; ' .
           '__gpi=UID=000015b49a9eefeb:T=1792339783:RT=1792339783:S=ALNI_MbMKr9WXCkHRqU24j6V0m5TTemgxg; ' .
           '__eoi=ID=628d4158fe8d0dec:T=1792339783:RT=1792339783:S=AA-AfjaOh4mMyMd6kgkQF0Qalrqh; ' .
           'FCCDCF=%5Bnull%2Cnull%2Cnull%2Cnull%2Cnull%2Cnull%2C%5B%5B32%2C%22%5B%5C%22b7dfe92e-1f80-4a34-8f72-6fd7ad80851f%5C%22%2C%5B1792339785%2C538000000%5D%5D%22%5D%5D%5D; ' .
           'FCNEC=%5B%5B%22AKsRol9puuKZiMdrbNw84BZm2xV9g0p7e8Z7qIpIT18rGYju0MY09TLm18FzEQSsKuJxUZMc22gFjsa7ugm-8pvEP0CjJimMwXSp2NGoJ591nX6b5D6hkhL5bOXH9xTKXRmpnLtRRF8cci7Eb8QAoqXKvtHlzxtJOA%3D%3D%22%5D%5D; ' .
           '_ga_W03VQWRY8K=GS2.1.s1792339783$o1$g1$t1792339804$j39$l0$h0';

// हेडर (Headers) सेट करें
$headers = [
    "accept: */*",
    "accept-language: en-US,en;q=0.9,hi;q=0.8",
    "content-type: application/json",
    "cookie: " . $cookies,
    "origin: https://nakshtratak.com",
    "priority: u=1, i",
    "referer: https://nakshtratak.com/panchang",
    "sec-ch-ua: \"Google Chrome\";v=\"155\", \"Chromium\";v=\"155\", \"Not(A:Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36"
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// अनुरोध निष्पादित करें (Execute request)
$response = curl_exec($ch);

// एरर चेक करें
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    // रिस्पांस को डिकोड या प्रिंट करें
    print_r($response);
}

curl_close($ch);
?>