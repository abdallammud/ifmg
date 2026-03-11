<?php
require_once 'includes/db.php';

$test_cases = [
    'hero/image.png' => 'ifmg_admin/assets/uploads/hero/image.png',
    'partners/logo.png' => 'ifmg_admin/assets/uploads/partners/logo.png',
    'uploads/file.pdf' => 'ifmg_admin/assets/uploads/uploads/file.pdf',
    'images/logo.png' => 'assets/images/logo.png',
    'css/style.css' => 'assets/css/style.css'
];

$all_passed = true;
foreach ($test_cases as $input => $expected) {
    $result = fe_asset($input);
    if ($result === $expected) {
        echo "[PASS] Input: $input -> Result: $result\n";
    } else {
        echo "[FAIL] Input: $input -> Expected: $expected, got: $result\n";
        $all_passed = false;
    }
}

if ($all_passed) {
    echo "\nAll fe_asset tests passed!\n";
} else {
    echo "\nSome fe_asset tests failed.\n";
}
?>