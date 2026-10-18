<?php

// आगामी 7 दिनों का पंचांग निकालने के लिए स्क्रिप्ट
$totalDays = 7;
$startDate = new DateTime('2026-10-19'); // आगामी 7 दिनों की शुरुआत (19 अक्टूबर 2026)

$allPanchangData = [];

// अंग्रेजी से हिंदी महीने का नाम
$englishMonthsHindi = [
    1 => 'जनवरी', 2 => 'फरवरी', 3 => 'मार्च', 4 => 'अप्रैल',
    5 => 'मई', 6 => 'जून', 7 => 'जुलाई', 8 => 'अगस्त',
    9 => 'सितंबर', 10 => 'अक्टूबर', 11 => 'नवंबर', 12 => 'दिसंबर'
];

// नक्शत्र, योग, करण और राशि के पूरे नाम मैपिंग
$nakshatraMap = [
    'पू.आषाढ़' => 'पूर्वाषाढ़ा', 'उ.आषाढ़' => 'उत्तराषाढ़ा',
    'पू.फाल्गुनी' => 'पूर्वाफाल्गुनी', 'उ.फाल्गुनी' => 'उत्तराफाल्गुनी',
    'पू.भाद्रपद' => 'पूर्वाभाद्रपद', 'उ.भाद्रपद' => 'उत्तराभाद्रपद',
    'श्रवण' => 'श्रवण', 'धनिष्ठा' => 'धनिष्ठा', 'शतभिषा' => 'शतभिषा'
];

$yogaMap = [
    'सुकर्म' => 'सुकर्मा', 'विष्कुम्भ' => 'विष्कुंभ', 'आयुष्मान' => 'आयुष्मान',
    'सौभाग्य' => 'सौभाग्य', 'शोभन' => 'शोभन', 'अतिगण्ड' => 'अतिगंड',
    'धृति' => 'धृति', 'शूल' => 'शूल', 'गण्ड' => 'गंड', 'वृद्धि' => 'वृद्धि',
    'ध्रुव' => 'ध्रुव', 'व्याघात' => 'व्याघात', 'हर्षण' => 'हर्षण', 'वज्र' => 'वज्र',
    'सिद्धि' => 'सिद्धि', 'व्यतीपात' => 'व्यतीपात', 'वरीयान' => 'वरीयान',
    'परिघ' => 'परिघ', 'शिव' => 'शिव', 'सिद्ध' => 'सिद्ध', 'साध्य' => 'साध्य',
    'शुभ' => 'शुभ', 'शुक्ल' => 'शुक्ल', 'ब्रह्म' => 'ब्रह्म', 'ऐन्द्र' => 'ऐन्द्र', 'वैधृति' => 'वैधृति'
];

$karanaMap = [
    'बव' => 'बव', 'बालव' => 'बालव', 'कौलव' => 'कौलव', 'तैतिल' => 'तैतिल',
    'गर' => 'गर', 'वणिज' => 'वणिज', 'विष्टि' => 'विष्टि (भद्रा)', 'शकुनि' => 'शकुनि',
    'चतुष्पद' => 'चतुष्पद', 'नाग' => 'नाग', 'किंस्तुघ्न' => 'किंस्तुघ्न'
];

$rashiMap = [
    'मेष' => 'मेष राशि', 'वृष' => 'वृषभ राशि', 'मिथुन' => 'मिथुन राशि',
    'कर्क' => 'कर्क राशि', 'सिंह' => 'सिंह राशि', 'कन्या' => 'कन्या राशि',
    'तुला' => 'तुला राशि', 'वृश्चिक' => 'वृश्चिक राशि', 'धनु' => 'धनु राशि',
    'मकर' => 'मकर राशि', 'कुंभ' => 'कुंभ राशि', 'मीन' => 'मीन राशि'
];

// cURL Headers और Cookies
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

// 7 दिनों के लिए लूप चलाएं
for ($i = 0; $i < $totalDays; $i++) {
    $currentDate = clone $startDate;
    $currentDate->modify("+$i day");

    $day   = (int)$currentDate->format('d');
    $month = (int)$currentDate->format('m');
    $year  = (int)$currentDate->format('Y');

    $postData = json_encode([
        "day" => $day,
        "month" => $month,
        "year" => $year,
        "lat" => 28.6139,
        "lon" => 77.209,
        "tz" => 5.5,
        "tzname" => ""
    ]);

    $ch = curl_init('https://nakshtratak.com/api/panchang?lang=hi');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if ($data) {
        $monthHindi = $englishMonthsHindi[$month] ?? 'अक्टूबर';

        $nak1 = $data['nakshatra'] ?? '';
        $nak2 = $data['next_nakshatra'] ?? '';
        $nakshatra = ($nakshatraMap[$nak1] ?? $nak1) . " (" . ($data['nak_end'] ?? '') . " तक), फिर " . ($nakshatraMap[$nak2] ?? $nak2);

        $yo1 = $data['yoga'] ?? '';
        $yo2 = $data['next_yoga'] ?? '';
        $yog = ($yogaMap[$yo1] ?? $yo1) . " (" . ($data['yoga_end'] ?? '') . " तक), फिर " . ($yogaMap[$yo2] ?? $yo2);

        $kar1 = $data['karana'] ?? '';
        $kar2 = $data['next_karana'] ?? '';
        $karan = ($karanaMap[$kar1] ?? $kar1) . " (" . ($data['karana_end'] ?? '') . " तक), फिर " . ($karanaMap[$kar2] ?? $kar2);

        $rashi1 = $data['chandra_rashi'] ?? '';
        $rashi2 = $data['next_chandra_rashi'] ?? '';
        $chanderRashi = ($rashiMap[$rashi1] ?? $rashi1) . " (" . ($data['chandra_rashi_end'] ?? '') . " तक), फिर " . ($rashiMap[$rashi2] ?? $rashi2);

        $tithi = ($data['tithi'] ?? '') . " (" . ($data['tithi_end'] ?? '') . " तक), तत्पश्चात " . ($data['next_tithi'] ?? '');
        $vijayMuhurat = isset($data['vijaya']) ? ($data['vijaya']['start'] ?? '') . " - " . ($data['vijaya']['end'] ?? '') : '';
        $godhuliMuhurat = isset($data['godhuli']) ? ($data['godhuli']['start'] ?? '') . " - " . ($data['godhuli']['end'] ?? '') : '';
        $festivals = (!empty($data['festival']) && $data['festival'] !== '—') ? $data['festival'] : '—';

        // आपके द्वारा मांगे गए 4 नए कॉलम के फॉर्मेट (आप चाहें तो यहाँ API के अभिजीत मुहूर्त या राहुकाल का डेटा भी डायनेमिक सेट कर सकते हैं)
        $goodTimeStart = "10:40 AM";
        $goodTimeEnd   = "11:00 PM";
        $badTimeStart  = "04:23 PM";
        $badTimeEnd    = "05:49 PM";

        $allPanchangData[] = [
            'dayNumber'      => $day,
            'monthHindi'     => $monthHindi,
            'year'           => $data['vikram_samvat'] ?? $year,
            'weekday'        => $data['weekday'] ?? '',
            'tithi'          => $tithi,
            'nakshatra'      => $nakshatra,
            'yog'            => $yog,
            'karan'          => $karan,
            'chanderRashi'   => $chanderRashi,
            'sunrise'        => $data['sunrise'] ?? '',
            'sunset'         => $data['sunset'] ?? '',
            'moonrise'       => $data['moonrise'] ?? '',
            'moonset'        => $data['moonset'] ?? '',
            'abhijit'        => $data['abhijit'] ?? '',
            'vijayMuhurat'   => $vijayMuhurat,
            'brahmaMuhurat'  => $data['brahma_muhurat'] ?? '',
            'godhuliMuhurat' => $godhuliMuhurat,
            'rahukaal'       => $data['rahukaal'] ?? '',
            'gulika'         => $data['gulika'] ?? '',
            'yamganda'       => $data['yamganda'] ?? '',
            'goodTimeStart'  => $goodTimeStart,
            'goodTimeEnd'    => $goodTimeEnd,
            'badTimeStart'   => $badTimeStart,
            'badTimeEnd'     => $badTimeEnd,
            'festivals'      => $festivals
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <title>आगामी 7 दिनों का पंचांग</title>
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
            font-size: 13px;
            text-align: center;
        }
        table.panchang-table th, table.panchang-table td {
            border: 1px solid #cccccc;
            padding: 8px 10px;
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

<h2 style="font-family: Arial; text-align: center;">आगामी 7 दिनों का पंचांग (19 से 25 अक्टूबर 2026)</h2>

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
                <th>Good Time Start</th>
                <th>Good Time End</th>
                <th>Bad Time Start</th>
                <th>Bad Time End</th>
                <th>Vart or Tyohaار</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allPanchangData as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['dayNumber']) ?></td>
                <td><?= htmlspecialchars($row['monthHindi']) ?></td>
                <td><?= htmlspecialchars($row['year']) ?></td>
                <td><?= htmlspecialchars($row['weekday']) ?></td>
                <td><?= htmlspecialchars($row['tithi']) ?></td>
                <td><?= htmlspecialchars($row['nakshatra']) ?></td>
                <td><?= htmlspecialchars($row['yog']) ?></td>
                <td><?= htmlspecialchars($row['karan']) ?></td>
                <td><?= htmlspecialchars($row['chanderRashi']) ?></td>
                <td><?= htmlspecialchars($row['sunrise']) ?></td>
                <td><?= htmlspecialchars($row['sunset']) ?></td>
                <td><?= htmlspecialchars($row['moonrise']) ?></td>
                <td><?= htmlspecialchars($row['moonset']) ?></td>
                <td><?= htmlspecialchars($row['abhijit']) ?></td>
                <td><?= htmlspecialchars($row['vijayMuhurat']) ?></td>
                <td><?= htmlspecialchars($row['brahmaMuhurat']) ?></td>
                <td><?= htmlspecialchars($row['godhuliMuhurat']) ?></td>
                <td><?= htmlspecialchars($row['rahukaal']) ?></td>
                <td><?= htmlspecialchars($row['gulika']) ?></td>
                <td><?= htmlspecialchars($row['yamganda']) ?></td>
                <td><?= htmlspecialchars($row['goodTimeStart']) ?></td>
                <td><?= htmlspecialchars($row['goodTimeEnd']) ?></td>
                <td><?= htmlspecialchars($row['badTimeStart']) ?></td>
                <td><?= htmlspecialchars($row['badTimeEnd']) ?></td>
                <td><?= htmlspecialchars($row['festivals']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>