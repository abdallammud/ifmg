<?php
// Standalone Seed Script for IFMG
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ifmg_cms';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "Seeding translations...\n";
$trans_seeds = [
    ['nav_home', 'Home', 'Hoyga'],
    ['nav_about', 'About Us', 'Nagu saabsan'],
    ['nav_programs', 'Programs', 'Barnaamijyada'],
    ['nav_publications', 'Publications', 'Daabacaadaha'],
    ['nav_events', 'Events', 'Dhacdooyinka'],
    ['nav_contact', 'Contact', 'Nala soo xiriir'],
    ['hero_cta', 'Explore Our Work', 'Sahami Shaqadeenna'],
    ['announcements_title', 'Latest Announcements', 'Ogeysiisyadii ugu dambeeyay'],
    ['footer_desc', 'Institute of Financial Management and Good Governance', 'Machadka Maamulka Maaliyadda iyo Maamul Wanaagga'],
    ['about_mission_title', 'Our Mission', 'Hadafkayaga'],
    ['about_vision_title', 'Our Vision', 'Hiigsigayaga'],
    ['values_title', 'Our Core Values', 'Qiimaha Asaasiyadda'],
    ['director_title', 'Director\'s Message', 'Farriinta Agaasimaha'],
    ['media_title', 'Latest News', 'Wararkii ugu dambeeyay']
];

foreach ($trans_seeds as $s) {
    $mysqli->query("INSERT IGNORE INTO translations (trans_key, lang, trans_value) VALUES ('$s[0]', 'en', '$s[1]'), ('$s[0]', 'so', '$s[2]')");
}

echo "Exporting translations to JSON...\n";
$res = $mysqli->query("SELECT trans_key, lang, trans_value FROM translations");
$data = [];
while ($row = $res->fetch_assoc()) {
    $data[$row['lang']][$row['trans_key']] = $row['trans_value'];
}
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
$asset_dir = __DIR__ . '/ifmg_admin/assets';
if (!is_dir($asset_dir))
    mkdir($asset_dir, 0777, true);
file_put_contents($asset_dir . '/translations.json', $json);

echo "Seeding records for modules...\n";
$mysqli->query("INSERT IGNORE INTO director_message (id, name_en, title_en, quote_en, message_en, is_active) 
VALUES (1, 'Abdirahman Mohamed', 'Executive Director', 'Leading with integrity for a better future.', 'Welcome to IFMG...', 1)");

$mysqli->query("INSERT IGNORE INTO vision_mission (id, mission_en, vision_en) 
VALUES (1, 'To advance financial integrity...', 'A transparent public sector...')");

$mysqli->query("INSERT IGNORE INTO pages (slug, title_en, page_group, is_active) VALUES ('about-ifmg', 'About IFMG', 'about', 1)");
$mysqli->query("INSERT IGNORE INTO pages (slug, title_en, page_group, is_active) VALUES ('vision-mission', 'Vision & Mission', 'about', 1)");

echo "Done.\n";
?>