<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

$pageTitle = 'About Nick | Travel House, Inc.';
$pageDescription = 'Meet Nick DeRitis, a passionate travel advisor with experience across 23 countries, Italy, expedition travel, and immersive group tours.';
$currentPage = 'about';
require __DIR__ . '/includes/header.php';
?>
<main id="main-content">
    <section class="v2-about-hero" data-motion-scene>
        <div class="about-sun" aria-hidden="true"></div>
        <div class="v2-about-copy reveal">
            <p class="v2-kicker"><span>Meet your travel advisor</span> Story collector · Fluent in Italian · Curious by nature</p>
            <h1>Ciao, I’m<br><em>Nick.</em></h1>
            <p class="about-deck">A little about my love of travel—and why I believe the best journeys feel deeply personal.</p>
        </div>
        <figure class="about-main-card reveal" data-parallax=".8">
            <img src="assets/images/nick-caitlin-taormina.webp" alt="Nick and Caitlin sharing a fun moment in Taormina.">
            <figcaption><b>Nick + Caitlin</b><span>Taormina, Sicily</span></figcaption>
        </figure>
        <figure class="about-mini-card reveal" data-parallax="1.25">
            <img src="assets/images/nick-caitlin-costa-rica.webp" alt="Nick and Caitlin hiking in Costa Rica.">
            <figcaption>Costa Rica · Go curious</figcaption>
        </figure>
        <div class="about-passport-stamp" aria-hidden="true">TRAVEL<br>HOUSE<br><span>EST. SEA</span></div>
        <div class="v2-marquee about-marquee" aria-hidden="true"><div>ITALY ✦ COSTA RICA ✦ CRETE ✦ PARIS ✦ SEATTLE ✦ THE FAR CORNERS OF THE GLOBE ✦&nbsp; ITALY ✦ COSTA RICA ✦ CRETE ✦ PARIS ✦ SEATTLE ✦ THE FAR CORNERS OF THE GLOBE ✦&nbsp;</div></div>
    </section>

    <section class="v2-story section-pad">
        <header class="v2-story-intro reveal">
            <p class="eyebrow">A life shaped by going</p>
            <p class="lead">Travel has always been one of my greatest passions and my wife Caitlin and I are avid adventurers.</p>
        </header>
        <div class="story-route" aria-hidden="true"><span></span><span></span><span></span></div>
        <article class="story-stop stop-one reveal">
            <div class="story-year">23<small>countries</small></div>
            <div><h2>First-hand wonder</h2><p>I’ve explored 23 countries and lived abroad in Italy where I completed an internship that deepened my connection to the culture, language, and people. Speaking Italian opened the doors to experiences most travelers only dream of, and it continues to shape the way I guide and design adventures today.</p></div>
        </article>
        <article class="story-stop stop-two reveal">
            <div class="story-year">SEA<small>home base</small></div>
            <div><h2>Where travel became a calling</h2><p>My journey in the travel industry began with Zegrahm Expeditions, a renowned expedition travel company in Seattle, where I helped connect curious travelers to some of the world’s most remote and unforgettable destinations.</p></div>
        </article>
        <article class="story-stop stop-three reveal">
            <div class="story-year">03<small>Italy tours</small></div>
            <div><h2>Sharing the hidden gems</h2><p>I have also co-led three immersive tours through Italy with Poggi Bonsi Tours where I shared my love of Italian food, culture, history, and hidden gems with fellow explorers.</p></div>
        </article>
    </section>

    <section class="photo-ribbon" aria-label="Travel memories">
        <figure class="reveal"><img src="assets/images/nick-caitlin-paris.webp" alt="Nick and Caitlin in front of the Eiffel Tower at sunset." loading="lazy"><figcaption>Paris</figcaption></figure>
        <figure class="reveal"><img src="assets/images/nick-caitlin-costa-rica.webp" alt="Nick and Caitlin hiking in Costa Rica." loading="lazy"><figcaption>Costa Rica</figcaption></figure>
        <figure class="reveal"><img src="assets/images/nick-crete.webp" alt="Nick with a small donkey in Crete." loading="lazy"><figcaption>Crete</figcaption></figure>
    </section>

    <section class="belief-section v2-belief section-pad">
        <p class="eyebrow reveal">What I believe</p>
        <div class="belief-grid">
            <h2 class="reveal">Travel should be personal, transformative, and <em>unforgettable.</em></h2>
            <div class="belief-copy reveal">
                <p>What I love most is curating experiences that go beyond the typical itinerary, creating moments that inspire, surprise, and leave travelers feeling more connected to the world.</p>
                <p>Whether it’s sipping wine in a Tuscan vineyard, walking cobblestone streets rich with history, or embarking on an expedition to the far corners of the globe, I believe travel should be personal, transformative, and unforgettable.</p>
                <p class="sign-off">I can’t wait to help you discover your next adventure.<br><em>— Nick DeRitis</em></p>
                <a class="v2-pill v2-pill-light" href="contact.php">Start a conversation <span>↗</span></a>
            </div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
