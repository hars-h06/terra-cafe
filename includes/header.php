<?php
require_once __DIR__ . '/config.php';
$page      = $page      ?? 'index';
$pageTitle = $pageTitle ?? 'TERRA — café · roastery · kitchen';
$pageDesc  = $pageDesc  ?? 'A cozy stony café in Rajapark, Jaipur.';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,400&family=Karla:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
<title><?= e($pageTitle) ?></title>
<meta name="description" content="<?= e($pageDesc) ?>">
<meta property="og:title" content="<?= e($pageTitle) ?>">
<meta property="og:description" content="<?= e($pageDesc) ?>">
<meta property="og:image" content="assets/img/hero-arches.webp">
<meta name="theme-color" content="#17110D">
<link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
<link rel="stylesheet" href="assets/vendor/pannellum/pannellum.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="page-<?= e($page) ?>">

<div id="loader">
  <div>
    <div class="lmark"><span style="animation-delay:.04s">T</span><span style="animation-delay:.1s">E</span><span style="animation-delay:.16s">R</span><span style="animation-delay:.22s">R</span><span style="animation-delay:.28s">A</span></div>
    <div class="lbar"><i></i></div>
    <div class="lnum">000</div>
    <div class="lsub">Rajapark · Jaipur</div>
  </div>
</div>
<div class="curtain"><i></i><i></i><i></i><i></i><i></i></div>
<div class="grain" aria-hidden="true"></div>
<div class="scrollbar" aria-hidden="true"><i></i></div>

<header class="nav">
  <div class="wrap nav-in">
    <a class="brand" href="index.php" aria-label="TERRA, home">
      <span class="dot"></span><span><b>TERRA</b><small>café · roastery · kitchen</small></span>
    </a>
    <nav class="nav-links" aria-label="Main">
      <a href="index.php"<?= $page === 'index' ? ' class="active"' : '' ?>>Home</a>
        <a href="story.php"<?= $page === 'story' ? ' class="active"' : '' ?>>Story</a>
        <a href="menu.php"<?= $page === 'menu' ? ' class="active"' : '' ?>>Menu</a>
        <a href="roastery.php"<?= $page === 'roastery' ? ' class="active"' : '' ?>>Roastery</a>
        <a href="gallery.php"<?= $page === 'gallery' ? ' class="active"' : '' ?>>Gallery</a>
        <a href="visit.php"<?= $page === 'visit' ? ' class="active"' : '' ?>>Visit</a>
      <a class="btn btn-sm" href="visit.php">Reserve</a>
    </nav>
    <button class="nav-toggle" type="button" aria-label="Open menu" aria-expanded="false">
      <span></span><span></span><span></span></button>
  </div>
</header>

<nav class="drawer" aria-label="Mobile">
  <a href="index.php"<?= $page === 'index' ? ' class="active"' : '' ?>>Home<span>01</span></a>
    <a href="story.php"<?= $page === 'story' ? ' class="active"' : '' ?>>Story<span>02</span></a>
    <a href="menu.php"<?= $page === 'menu' ? ' class="active"' : '' ?>>Menu<span>03</span></a>
    <a href="roastery.php"<?= $page === 'roastery' ? ' class="active"' : '' ?>>Roastery<span>04</span></a>
    <a href="gallery.php"<?= $page === 'gallery' ? ' class="active"' : '' ?>>Gallery<span>05</span></a>
    <a href="visit.php"<?= $page === 'visit' ? ' class="active"' : '' ?>>Visit<span>06</span></a>
  <div class="d-foot">
    C-18, Rajapark Main Road, Adarsh Nagar, Jaipur 302004<br>
    <a href="tel:+919829044417">+91 98290 44417</a> · @terra.jaipur
  </div>
</nav>
