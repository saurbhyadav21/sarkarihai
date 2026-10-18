<?php

$url = 'https://nakshtratak.com/api/panchang?lang=hi';

// Payload Data
$postData = json_encode([
    "day" => 19,
    "month" => 10,
    "year" => 2026,
    "lat" => 28.6139,
    "lon" => 77.209,
    "tz" => 5.5,
    "tzname" => ""
]);

$ch = curl_init($url);

$cookies = '_ga=GA1.1.547723380.1792339784; ' .
           '_gcl_au=1.1.132493895.1792339784; ' .
           '__gads=ID=5644513e69c7fcd1:T=1792339783:RT=1792339783:S=ALNI_MZT5gYbkkNEjUFJDoPtZxeVQf8CkA; ' .
           '__gpi=UID=000015b49a9eefeb:T=1792339783:RT=1792339783:S=ALNI_MbMKr9WXCkHRqU24j6V0m5TTemgxg; ' .
           '__eoi=ID=628d4158fe8d0dec:T=1792339783:RT=1792339783:S=AA-AfjaOh4mMyMd6kgkQF0Qalrqh; ' .
           'FCCDCF=%5Bnull%2Cnull%2Cnull%2Cnull%2Cnull%2Cnull%2C%5B%5B32%2C%22%5B%5C%22b7dfe92e-1f80-4a34-8f72-6fd7ad80851f%5C%22%2C%5B1792339785%2C538000000%5D%5D%22%5D%5D%5D; ' .
           'FCNEC=%5B%5B%22AKsRol9puuKZiMdrbNw84BZm2xV9g0p7e8Z7qIpIT18rGYju0MY09TLm18FzEQSsKuJxUZMc22gFjsa7ugm-8pvEP0CjJimMwXSp2NGoJ591nX6b5D6hkhL5bOXH9xTKXRmpnLtRRF8cci7Eb8QAoqXKvtHlzxtJOA%3D%3D%22%5D%5D; ' .
           '_ga_W03VQWRY8K=GS2.1.s1792339783$o1$g1$t1792339804$j39$l0$h0';

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

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

curl_close($ch);

// JSON डेटा को एरे में डिकोड करें
$data = json_decode($response, true);

if (!$data) {
    echo "अमान्य रिस्पॉन्स डेटा प्राप्त हुआ।";
    exit;
}

// डेट से केवल तारीख (Day) निकालने के लिए
$dateParts = explode('-', $data['date'] ?? '');
$dayNumber = isset($dateParts[0]) ? (int)$dateParts[0] : '18';

// डेटा फ़ील्ड्स सेट करें
$tithi = ($data['tithi'] ?? '') . " (" . ($data['tithi_end'] ?? '') . " तक), तत्पश्चात " . ($data['next_tithi'] ?? '');
$nakshatra = ($data['nakshatra'] ?? '') . " (" . ($data['nak_end'] ?? '') . " तक), फिर " . ($data['next_nakshatra'] ?? '');
$yog = ($data['yoga'] ?? '') . " (" . ($data['yoga_end'] ?? '') . " तक), फिर " . ($data['next_yoga'] ?? '');
$karan = ($data['karana'] ?? '') . " (" . ($data['karana_end'] ?? '') . " तक), फिर " . ($data['next_karana'] ?? '');
$chanderRashi = ($data['chandra_rashi'] ?? '') . " (" . ($data['chandra_rashi_end'] ?? '') . " तक), फिर " . ($data['next_chandra_rashi'] ?? '');
$vijayMuhurat = isset($data['vijaya']) ? ($data['vijaya']['start'] ?? '') . " - " . ($data['vijaya']['end'] ?? '') : '';
$godhuliMuhurat = isset($data['godhuli']) ? ($data['godhuli']['start'] ?? '') . " - " . ($data['godhuli']['end'] ?? '') : '';
$festivals = (!empty($data['festival']) && $data['festival'] !== '—') ? $data['festival'] : '—';

?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <title>आज का पंचांग</title>
    <style>
        .panchang-table-container {
            width: 100%;
            overflow-x: auto;
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }
        table.panchang-table {
            border-collapse: collapse;
            width: 100%;
            white-space: nowrap;
            font-size: 14px;
            text-align: center;
        }
        table.panchang-table th, table.panchang-table td {
            border: 1px solid #cccccc;
            padding: 10px 12px;
        }
        table.panchang-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333333;
        }
        table.panchang-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="panchang-table-container">
    <table class="panchang-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Month</th>
                <th>Year</th>
                <th>Day</th>
                <th>Tithi</th>
                <th>Nakshatra</th>
                <th>Yog</th>
                <th>Karan</th>
                <th>Chander Rashi</th>
                <th>Sunrise</th>
                <th>Sun Set</th>
                <th>Moon Rise</th>
                <th>Moon Set</th>
                <th>Abhi Jeet Muhrat</th>
                <th>Vijay Murhat</th>
                <th>Barma Muhrt</th>
                <th>Godhul Muhrat</th>
                <th>Rahu Kall</th>
                <th>Gulaka Kaal</th>
                <th>Yumgand</th>
                <th>Vijary Kaal</th>
                <th>Vart or Tyohaar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= htmlspecialchars($dayNumber) ?></td>
                <td><?= htmlspecialchars($data['masa'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['vikram_samvat'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['weekday'] ?? '') ?></td>
                <td><?= htmlspecialchars($tithi) ?></td>
                <td><?= htmlspecialchars($nakshatra) ?></td>
                <td><?= htmlspecialchars($yog) ?></td>
                <td><?= htmlspecialchars($karan) ?></td>
                <td><?= htmlspecialchars($chanderRashi) ?></td>
                <td><?= htmlspecialchars($data['sunrise'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['sunset'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['moonrise'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['moonset'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['abhijit'] ?? '') ?></td>
                <td><?= htmlspecialchars($vijayMuhurat) ?></td>
                <td><?= htmlspecialchars($data['brahma_muhurat'] ?? '') ?></td>
                <td><?= htmlspecialchars($godhuliMuhurat) ?></td>
                <td><?= htmlspecialchars($data['rahukaal'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['gulika'] ?? '') ?></td>
                <td><?= htmlspecialchars($data['yamganda'] ?? '') ?></td>
                <td><?= htmlspecialchars($vijayMuhurat) ?></td>
                <td><?= htmlspecialchars($festivals) ?></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>