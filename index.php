<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

$pageTitle = 'Travel House, Inc. | Make the World Your Story';
$pageDescription = 'Go beyond the expected with personal, thoughtfully planned journeys from Travel House, Inc.';
$currentPage = 'home';
require __DIR__ . '/includes/header.php';
?>
<main id="main-content">
    <section class="v2-hero" data-motion-scene>
        <div class="route route-one" aria-hidden="true"><i>✦</i></div>
        <div class="route route-two" aria-hidden="true"><i>↗</i></div>
        <div class="v2-hero-copy reveal">
            <p class="v2-kicker"><span>Travel House, Inc.</span> Bringing the world to your doorstep.</p>
            <h1>Make the world<br><em>your story.</em></h1>
            <div class="v2-hero-bottom">
                <p>Thoughtfully curated journeys for curious travelers who want to go beyond the expected.</p>
                <a class="v2-pill" href="#adventures">Explore adventures <span>↓</span></a>
            </div>
        </div>
        <figure class="floating-card card-amalfi" data-parallax=".8">
            <img src="assets/images/amalfi-town.webp" alt="The colorful Amalfi Coast, Italy.">
            <figcaption><b>Amalfi Coast</b><span>40.6333° N</span></figcaption>
        </figure>
        <figure class="floating-card card-balos" data-parallax="1.3">
            <img src="assets/images/balos-beach.webp" alt="Turquoise water at Balos Beach.">
            <figcaption><b>Balos Beach</b><span>35.5844° N</span></figcaption>
        </figure>
        <div class="v2-stamp" data-parallax="1.7"><strong>23</strong><span>countries<br>explored</span></div>
        <div class="v2-marquee" aria-hidden="true"><div>RIVER CRUISES ✦ CUSTOM JOURNEYS ✦ OCEAN CRUISES ✦ EXPEDITIONS ✦ ADVENTURE TRAVEL ✦ BIKING TOURS ✦&nbsp; RIVER CRUISES ✦ CUSTOM JOURNEYS ✦ OCEAN CRUISES ✦ EXPEDITIONS ✦ ADVENTURE TRAVEL ✦ BIKING TOURS ✦&nbsp;</div></div>
    </section>

    <section class="v2-adventures" id="adventures" data-adventure-board>
        <header class="v2-section-head section-pad reveal">
            <div><p class="eyebrow">Now departing</p><h2>Choose your next<br><em>adventure.</em></h2></div>
            <p>From slow river mornings to far-flung expeditions, find the kind of journey that moves you.</p>
        </header>
        <div class="departure-board section-pad">
            <div class="departure-list" role="list">
                <div class="departure-labels"><span>No.</span><span>Journey</span><span>Mood</span><span>Status</span></div>
                <?php foreach ($adventures as $index => $adventure): ?>
                    <a class="departure-row reveal<?= $index === 0 ? ' is-active' : '' ?>" role="listitem" href="contact.php?interest=<?= urlencode($adventure['title']) ?>" data-adventure-image="assets/images/<?= e($adventure['image']) ?>" data-adventure-alt="<?= e($adventure['alt']) ?>">
                        <span><?= e($adventure['number']) ?></span>
                        <h3><?= e($adventure['title']) ?></h3>
                        <p><?= e($adventure['note']) ?></p>
                        <b>Boarding <i>↗</i></b>
                    </a>
                <?php endforeach; ?>
            </div>
            <figure class="departure-preview reveal">
                <img src="assets/images/<?= e($adventures[0]['image']) ?>" alt="<?= e($adventures[0]['alt']) ?>" data-adventure-preview>
                <figcaption><span>TH–001</span><b data-preview-title>River Cruises</b><i>PACK LIGHT · DREAM BIG</i></figcaption>
                <div class="preview-sticker">Your<br>route,<br>your rules</div>
            </figure>
        </div>
    </section>

    <section class="v2-manifesto section-pad">
        <div class="v2-ticket reveal" data-parallax=".35">
            <div class="ticket-top"><span>TH</span><b>ADMIT ONE CURIOUS TRAVELER</b><small>WORLD · 001</small></div>
            <div class="ticket-route"><i>ANYWHERE</i><span>········ ✦ ········</span><i>EVERYWHERE</i></div>
            <div class="ticket-bottom"><span>PERSONAL</span><span>TRANSFORMATIVE</span><span>UNFORGETTABLE</span></div>
        </div>
        <div class="manifesto-copy reveal">
            <p class="eyebrow">Not your average itinerary</p>
            <h2>The best journeys don’t come off a shelf. They begin with <em>your story.</em></h2>
            <div class="manifesto-detail">
                <p>I’m Nick DeRitis. I pair first-hand experience with attentive planning to create travel that feels easy, personal, and unforgettable.</p>
                <a class="v2-arrow-link" href="about.php">Meet your travel advisor <span>↗</span></a>
            </div>
        </div>
    </section>

    <section class="v2-why section-pad">
        <div class="v2-why-title reveal">
            <p class="eyebrow">Why Travel House</p>
            <h2>It’s not just where you go.<br>It’s <em>how it feels.</em></h2>
        </div>
        <div class="v2-principles">
            <article class="principle-card card-blue reveal"><span>01 / Personal</span><h3>Designed around you</h3><p>No templates. Every detail begins with how you want to travel.</p><i aria-hidden="true">✦</i></article>
            <article class="principle-card card-mint reveal"><span>02 / Experienced</span><h3>Guided by the real world</h3><p>Insight shaped by 23 countries, life abroad, and years in travel.</p><i aria-hidden="true">23</i></article>
            <article class="principle-card card-coral reveal"><span>03 / Effortless</span><h3>Easy from here</h3><p>Thoughtful guidance before, during, and after your journey.</p><i aria-hidden="true">↗</i></article>
        </div>
        <figure class="v2-group-photo reveal">
            <img src="assets/images/amalfi-group.webp" alt="A Travel House group overlooking the colorful Amalfi Coast." loading="lazy">
            <figcaption><b>Proof that the best souvenir is a story.</b><span>Amalfi Coast · 2024</span></figcaption>
        </figure>
    </section>

    <section class="postcard-section v2-postcards">
        <div class="postcard-heading reveal">
            <p class="eyebrow eyebrow-light">Follow Travel House, Inc. on social media</p>
            <h2>Postcards from<br><em>the journey.</em></h2>
            <a class="v2-pill v2-pill-light" href="https://www.instagram.com/travel_house_inc/" target="_blank" rel="noopener">Follow on Instagram <span>↗</span></a>
        </div>
        <div class="postcard-grid reveal">
            <figure class="postcard-card postcard-a"><img src="assets/images/balos-beach.webp" alt="Balos Beach and its turquoise lagoon." loading="lazy"><figcaption>Balos Beach</figcaption></figure>
            <figure class="postcard-card postcard-b"><img src="assets/images/copenhagen-harbor.webp" alt="A colorful European harbor in Copenhagen." loading="lazy"><figcaption>Copenhagen</figcaption></figure>
            <figure class="postcard-card postcard-c"><img src="assets/images/amalfi-group.webp" alt="A group of travelers overlooking the Amalfi Coast." loading="lazy"><figcaption>Amalfi Coast</figcaption></figure>
            <figure class="postcard-card postcard-d"><img src="assets/images/nusa-penida.webp" alt="Aerial view of a tropical beach at Nusa Penida." loading="lazy"><figcaption>Nusa Penida</figcaption></figure>
        </div>
    </section>

    <section class="v2-final-call section-pad reveal">
        <div class="final-call-badge" aria-hidden="true"><span>BOARDING PASS</span><strong>TH</strong><small>NEXT STOP / WONDER</small><i></i></div>
        <div class="final-call-copy">
            <p class="eyebrow">Let’s plan your next adventure together</p>
            <h2>Ready when<br><em>you are.</em></h2>
            <p>I’m here to make your travel dreams effortless and unforgettable. Whether you’re ready to book or just exploring options, I’d love to help.</p>
        </div>
        <a class="v2-orbit-link" href="contact.php"><span>Tell me what<br>you’re dreaming of</span><b>↗</b></a>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
