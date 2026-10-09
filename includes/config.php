<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    $systemTemp = sys_get_temp_dir();
    if (is_dir($systemTemp) && is_writable($systemTemp)) {
        ini_set('session.save_path', $systemTemp);
    }
    session_start();
}

const SITE_NAME = 'Travel House, Inc.';
const CONTACT_EMAIL = 'nick@travelhouse.com';
const CONTACT_PHONE = '(206) 248-0900';
const CONTACT_PHONE_LINK = '+12062480900';

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function is_active(string $page, string $currentPage): string
{
    return $page === $currentPage ? ' is-active' : '';
}

$adventures = [
    [
        'number' => '01',
        'title' => 'River Cruises',
        'image' => 'river-cruise-passau.webp',
        'alt' => 'Scenic view of a European city skyline along a river, with colorful buildings and church towers.',
        'note' => 'Unpack once. See the world unfold.',
    ],
    [
        'number' => '02',
        'title' => 'Custom Land Itineraries',
        'image' => 'land-neuschwanstein.webp',
        'alt' => 'Neuschwanstein Castle surrounded by green trees and rolling hills.',
        'note' => 'A journey shaped entirely around you.',
    ],
    [
        'number' => '03',
        'title' => 'Ocean Cruises',
        'image' => 'ocean-cruise.webp',
        'alt' => 'Majestic Princess sailing near San Francisco at sunset.',
        'note' => 'Big horizons, beautifully effortless.',
    ],
    [
        'number' => '04',
        'title' => 'Expedition Cruises',
        'image' => 'expedition-cruise.webp',
        'alt' => 'A cruise ship sailing through a narrow fjord surrounded by green mountains.',
        'note' => 'Go farther than the familiar.',
    ],
    [
        'number' => '05',
        'title' => 'Adventure Travel',
        'image' => 'adventure-travel.webp',
        'alt' => 'A hiker overlooking a winding river valley surrounded by mountains.',
        'note' => 'Wild places. Real connection.',
    ],
    [
        'number' => '06',
        'title' => 'Biking Tours',
        'image' => 'biking-tours.webp',
        'alt' => 'Two bicycles beside road signs pointing to Pernand and Vergelesses in France.',
        'note' => 'Take the scenic route, every time.',
    ],
];
