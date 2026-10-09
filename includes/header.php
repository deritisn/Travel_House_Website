<?php
/** @var string $pageTitle */
/** @var string $pageDescription */
/** @var string $currentPage */
$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? 'Personal travel planning for unforgettable adventures.';
$currentPage = $currentPage ?? '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="theme-color" content="#173f3a">
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.travelhouse.com/assets/images/og-v3.png">
    <meta property="og:image:alt" content="Travel House — Make the world your story.">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle) ?>">
    <meta name="twitter:description" content="<?= e($pageDescription) ?>">
    <meta name="twitter:image" content="https://www.travelhouse.com/assets/images/og-v3.png">
    <title><?= e($pageTitle) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Source+Serif+4:opsz,wght@8..60,500;8..60,600;8..60,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/site.js" defer></script>
</head>
<body class="v2 v3 page-<?= e($currentPage) ?>">
<a class="skip-link" href="#main-content">Skip to content</a>
<header class="site-header" data-header>
    <a class="brand brand-v3" href="index.php" aria-label="Travel House, Inc. home">
        <img src="assets/images/Travel_House_Logo_Long_Final.png" alt="Travel House logo" class="brand-logo">
        <span class="brand-wordmark">
            <strong>Travel House</strong>
            <small>Bringing the world to your doorstep.</small>
        </span>
    </a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" data-menu-toggle>
        <span>Menu</span>
        <i aria-hidden="true"></i>
    </button>
    <nav class="primary-nav" id="primary-nav" aria-label="Primary navigation" data-nav>
        <a class="<?= e(is_active('home', $currentPage)) ?>" href="index.php">Home</a>
        <a href="index.php#adventures">Adventures</a>
        <a class="<?= e(is_active('about', $currentPage)) ?>" href="about.php">About</a>
        <a class="nav-cta<?= e(is_active('contact', $currentPage)) ?>" href="contact.php">Plan a trip <span aria-hidden="true">↗</span></a>
    </nav>
    <div class="journey-progress" aria-hidden="true"><span></span><i>✈</i></div>
</header>
