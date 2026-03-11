<?php
require_once 'includes/db.php';
$res = $mysqli->query("DESCRIBE hero_slides");
echo "COLUMNS:\n";
while ($row = $res->fetch_assoc())
    echo $row['Field'] . "\n";
echo "\nDATA:\n";
$res2 = $mysqli->query("SELECT id, title_en, title_so, subtitle_en, subtitle_so, cta_text_en, cta_text_so FROM hero_slides WHERE is_active = 1 LIMIT 2");
while ($row = $res2->fetch_assoc()) {
    echo "ID=" . $row['id'] . "\n";
    echo " title_en=" . $row['title_en'] . "\n";
    echo " title_so=" . $row['title_so'] . "\n";
    echo " subtitle_en=" . $row['subtitle_en'] . "\n";
    echo " subtitle_so=" . $row['subtitle_so'] . "\n";
    echo " cta_en=" . $row['cta_text_en'] . "\n";
    echo " cta_so=" . $row['cta_text_so'] . "\n";
}
echo "\nLANG=" . $lang . "\n";