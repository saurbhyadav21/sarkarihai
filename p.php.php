<?php
// Default Input Values
$date_str          = $_POST['date_str'] ?? "20-10-2026";
$day_hindi         = $_POST['day_hindi'] ?? "मंगलवार";
$day_english       = $_POST['day_english'] ?? "Tuesday";
$month_name_hindi  = $_POST['month_name_hindi'] ?? "अक्टूबर";
$month_name_eng    = $_POST['month_name_eng'] ?? "October";
$channel_handle    = $_POST['channel_handle'] ?? "@kathaaartisangrah";

// Date Automatic Parsing
$date_parts = explode("-", $date_str);
$day_num    = $date_parts[0] ?? "20";
$month_num  = $date_parts[1] ?? "10";
$year_num   = $date_parts[2] ?? "2026";

// English Case Handling for Dynamic Hashtags
$day_eng_lower   = strtolower($day_english);
$month_eng_lower = strtolower($month_name_eng);

// ---------------------------------------------------------
// 1. DYNAMIC TITLE
// ---------------------------------------------------------
$title = "{$date_str} Panchang | भूलकर भी इस समय न करें काम! ⚠️ आज का पंचांग #aajkapanchang #shorts #rahukaal";

// ---------------------------------------------------------
// 2. DYNAMIC TAGS (Comma Separated for YouTube Tags Field)
// ---------------------------------------------------------
$tags = "aaj ka panchang, panchang, today panchang, panchangam, aaj ka panchang {$date_str}, {$day_num} {$month_name_hindi} panchang, {$day_hindi} panchang, aaj ka panchang {$year_num}, aaj ka shubh muhurat, rahukaal timing, abhijeet muhurt, dainik panchang, {$day_english} panchang, {$day_num} {$month_name_eng} {$year_num} panchang, kathaaartisangrah, daily panchang hindi, aaj ki tithi, aaj ka choghdiya";

// ---------------------------------------------------------
// 3. FULL DYNAMIC UNCUT DESCRIPTION (WITH DYNAMIC HASHTAGS)
// ---------------------------------------------------------
$description = "{$date_str} Panchang | भूलकर भी इस समय न करें काम! ⚠️ आज का पंचांग #aajkapanchang #shorts #rahukaal

{$channel_handle} 

AajKaPanchang #Panchang #TodayPanchang #panchang #आजकापंचांग #DailyPanchang #DainikPanchang

aaj ka panchang पंचांग,आज का पंचांग, aaj ka panchang, daily panchang on online,panchangam on online,panchang in hindi text,shubh panchang in hindi,आज का शुभ मुहर्त,aaj ka shubh muhurat, {$year_num} का पंचांग,aaj ka anchang {$year_num},aaj ka choghdiya, shubh din, Panchangam,Aaj Ka Panchang Shubh Din, Indian calendar,today’s panchang,

Panchangam,Aaj Ka Panchang Shubh Choghadiya, indian calendar panchang, Panchang hindi ,aaj ka panchang, aaj ka muhurat, online panchangam,panchang in hindi, shubh panchang, daily panchang on online,Panchangam on online,  Panchang in Hindi, aaj ka panchang hindi, aaj ka panchang {$year_num}, aaj ka panchang, panchang today, Today Panchang, today panchang in hindi, panchang today in hindi, today hindi panchang  {$year_num} Panchang, today choghadiya , kal ka shubh muhurt, {$day_num} {$month_name_hindi} {$day_hindi}


Your Queries-
Panchang
panchangam today
panchangam
Aaj Ka Panchang
Aaj Ka Panchang {$day_num} {$month_name_hindi} {$day_hindi} ({$day_english})
aaj ka panchang in hindi
panchang in hindi
{$day_num} {$month_name_hindi} {$day_hindi}, {$day_english} पंचांग
aaj ka panchang {$year_num}
Sunday Panchang
aaj ki tithi kya hai
aaj kya tithi hai
aaj kaun si tithi hai
aaj ki tithi
aaj ki tithi kya hai
आज क्या तिथि है
Shubh Muhurat April
daily panchang on online 
aaj ka panchang hindi 
aaj ka muhurat 
{$day_num} {$month_name_hindi} {$year_num}, {$day_hindi} Panchang hindi 
indian calendar panchang 
aaj kya tithi hai 
shubh muhurat today 
abhijeet muhurat today 
rahukaal today {$day_num} {$month_name_eng}, {$year_num}, {$day_english}
आज का शुभ मुहूर्त 
आज का पंचांग हिन्दी में आज का पंचांग क्या है
शुभ मुहूर्त राहुकाल 
दिशाशूल पंचांग 
अभिजीत मुहूर्त तिथि 
आज क्या तिथि है
नवरात्रि 
आज क्या तिथि है 
आज की तिथि
पंचांग कैलेंडर
पंचांग {$year_num}
पंचांग कैलेंडर {$year_num}
{$day_num} {$month_name_hindi} {$year_num}, {$day_hindi}
पंचांग आज का हिन्दू कैलेंडर आज का पंचांग
{$day_num} {$month_name_hindi} {$year_num}, {$day_hindi}  हिंदी में तिथि कैलेंडर आज का पंचांग हिंदी में
आज का पंचांग तिथि पंचांग पंचांग 
हिंदी में आज का कैलेंडर 
आज का कालचक्र 
आज का पंचांग हिंदी में हिंदू कैलेंडर
Aaj ka panchang {$day_num} {$month_name_hindi} {$year_num}, {$day_hindi} {$day_english}
Panchang today 
Panchang today Rahu kaal timing 
Abhijeet muhurt timing 
Today panchangam Tomorrow panchangam 
Aaj ka choghadiya muhurat 
Aaj ka Shubh muhurt kya hai 
Aaj ka muhurat kitne baje ka hai 
Today nakshatra panchangam aaj 
Aaj Shubh muhurt Kalchakara today 
Rahu kalam timings 
{$day_num} {$month_name_eng}, {$year_num}, {$day_hindi} Today subha muhurtham 
Aaj shubh muhurt Panchang today 
Today's panchangam 
Today tithi nakshatra 
Panchangam
Vrat tyohar
Shubh muhurt today 
Rahu kaal Rahu kaal timing Abhijeet muhurt 
Aaj kab hai Hindu festival calendar {$year_num}
{$day_num} {$month_name_eng} {$year_num}, {$day_hindi}

#{$year_num}
#panchang
#today
#{$day_eng_lower}
#sunday
#wednesday
#yt
#thursday
#friday
#pradoshkaaltime
#abhijeetmuhurt
#{$month_eng_lower}
#{$month_eng_lower}{$year_num}
#youtubeshorts
#panchang
#viralshort
#festival{$year_num}
#muhurat
#ytshorts
#shorts
#dainikpanchang
#trendingshorts
#dailypanchang
#panchangam
#astrology
#aajkapanchang
#vedicastrology
#tithi
#kalkapanchang
#day
#rahukaal
#rahukal
#{$day_num}{$month_name_eng}{$year_num}
#rashifal #astro #राशिफल
#horoscope #dailyhoroscope #dailyrashifal #entertainment #hindi #aajkarashifal #aajkapanchang #jyotish #astrology #aajkarashifal #shortsfeed #viral #todayshorts #kathaaartisangrah

यहां दी गई जानकारी सामान्य मान्यताओं, विभिन्न श्रोतों, ज्योतिष, पंचांग, धार्मिक ग्रंथों आदि पर आधारित है। यहां दी गई सूचना और तथ्यों की सटीकता, संपूर्णता के लिए kathaaartisangrah उत्तरदायी नहीं है।";
?>

<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panchang Shorts Content & Tags Generator</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; }
        .box { max-width: 900px; margin: auto; background: #ffffff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #d32f2f; text-align: center; margin-bottom: 20px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; background: #fff8e1; padding: 15px; border-radius: 8px; border: 1px solid #ffe082; }
        .form-group { display: flex; flex-direction: column; }
        label { font-weight: bold; margin-bottom: 5px; color: #333; }
        input[type="text"] { padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; }
        .btn-submit { grid-column: span 2; padding: 12px; background: #d32f2f; color: #fff; border: none; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; transition: 0.3s; }
        .btn-submit:hover { background: #b71c1c; }
        .output-group { margin-top: 25px; }
        textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-family: inherit; font-size: 14px; box-sizing: border-box; }
        .copy-hint { color: #666; font-size: 12px; margin-top: 4px; }
    </style>
</head>
<body>

<div class="box">
    <h2>🚩 Dynamic Panchang Generator (With Tags & Hashtags)</h2>

    <!-- INPUT FORM -->
    <form method="POST" action="">
        <div class="form-grid">
            <div class="form-group">
                <label>Date (DD-MM-YYYY):</label>
                <input type="text" name="date_str" value="<?php echo htmlspecialchars($date_str); ?>" required>
            </div>
            <div class="form-group">
                <label>Channel Handle:</label>
                <input type="text" name="channel_handle" value="<?php echo htmlspecialchars($channel_handle); ?>" required>
            </div>
            <div class="form-group">
                <label>Day (Hindi):</label>
                <input type="text" name="day_hindi" value="<?php echo htmlspecialchars($day_hindi); ?>" required>
            </div>
            <div class="form-group">
                <label>Day (English):</label>
                <input type="text" name="day_english" value="<?php echo htmlspecialchars($day_english); ?>" required>
            </div>
            <div class="form-group">
                <label>Month (Hindi):</label>
                <input type="text" name="month_name_hindi" value="<?php echo htmlspecialchars($month_name_hindi); ?>" required>
            </div>
            <div class="form-group">
                <label>Month (English):</label>
                <input type="text" name="month_name_eng" value="<?php echo htmlspecialchars($month_name_eng); ?>" required>
            </div>
            <button type="submit" class="btn-submit">🚀 Generate Dynamic Content, Tags & Hashtags</button>
        </div>
    </form>

    <!-- OUTPUT 1: TITLE -->
    <div class="output-group">
        <label>1. Dynamic Title:</label>
        <input type="text" value="<?php echo htmlspecialchars($title); ?>" readonly onclick="this.select();">
        <div class="copy-hint">💡 Click to Copy Title</div>
    </div>

    <!-- OUTPUT 2: TAGS FIELD -->
    <div class="output-group">
        <label>2. YouTube Video Tags (Tags Box Mein Paste Karein):</label>
        <textarea style="height: 90px;" readonly onclick="this.select();"><?php echo htmlspecialchars($tags); ?></textarea>
        <div class="copy-hint">💡 Direct Copy and Paste inside YouTube Studio Tags section</div>
    </div>

    <!-- OUTPUT 3: FULL DESCRIPTION -->
    <div class="output-group">
        <label>3. Full Description (With Dynamic Hashtags & Queries):</label>
        <textarea style="height: 380px;" readonly onclick="this.select();"><?php echo htmlspecialchars($description); ?></textarea>
        <div class="copy-hint">💡 Click to Copy Full Description</div>
    </div>
</div>

</body>
</html>