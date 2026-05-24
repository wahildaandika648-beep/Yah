<?php
function captcha_generate(): array {
    $a = random_int(1,9); $b = random_int(1,9);
    $_SESSION['_captcha'] = $a + $b;
    return ['q' => "$a + $b = ?"];
}
function captcha_validate(string $answer): bool { return (int)$answer === (int)($_SESSION['_captcha'] ?? -1); }
