<?php
/**
 * TERRA — site configuration.
 * Everything a new owner usually edits lives in this one file.
 */
$site = [
    'name'      => 'TERRA',
    'tagline'   => 'café · roastery · kitchen',
    'address_1' => 'C-18, Rajapark Main Road',
    'address_2' => 'Adarsh Nagar, Jaipur 302004',
    'phone'     => '+91 98290 44417',
    'phone_url' => '+919829044417',
    'email'     => 'hello@terrajaipur.co',
    'instagram' => '@terra.jaipur',
    'maps'      => 'https://www.google.com/maps/search/?api=1&query=Rajapark+Adarsh+Nagar+Jaipur',
];

$nav = [
    'index'    => 'Home',
    'story'    => 'Story',
    'menu'     => 'Menu',
    'roastery' => 'Roastery',
    'gallery'  => 'Gallery',
    'visit'    => 'Visit',
];

/** Opening hours, minutes from midnight, Sunday first — used by the "Open now" chip. */
$hours_js = '[[480,1380],[480,1380],[480,1380],[480,1380],[480,1440],[480,1440],[480,1440]]';

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
