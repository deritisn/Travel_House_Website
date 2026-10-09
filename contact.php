<?php
declare(strict_types=1);
require __DIR__ . '/includes/config.php';

$pageTitle = 'Contact | Plan Your Next Trip with Travel House';
$pageDescription = 'Tell Travel House what kind of journey you are dreaming about and start planning an effortless, unforgettable adventure.';
$currentPage = 'contact';
$errors = [];
$success = false;

$form = [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'interest' => trim((string)($_GET['interest'] ?? '')),
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach (array_keys($form) as $field) {
        $form[$field] = trim((string)($_POST[$field] ?? ''));
    }

    $token = (string)($_POST['csrf_token'] ?? '');
    $honeypot = trim((string)($_POST['company_website'] ?? ''));

    if (!hash_equals(csrf_token(), $token)) {
        $errors[] = 'Your session expired. Please refresh the page and try again.';
    }
    if ($honeypot !== '') {
        $errors[] = 'Unable to send this request.';
    }
    if ($form['first_name'] === '' || $form['last_name'] === '') {
        $errors[] = 'Please share your first and last name.';
    }
    if (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (mb_strlen($form['message']) < 10) {
        $errors[] = 'Please tell me a little more about the trip you have in mind.';
    }

    $lastSent = (int)($_SESSION['last_inquiry_at'] ?? 0);
    if (time() - $lastSent < 30) {
        $errors[] = 'Please wait a moment before sending another inquiry.';
    }

    if ($errors === []) {
        $subject = 'New Travel House inquiry from ' . $form['first_name'] . ' ' . $form['last_name'];
        $body = "Name: {$form['first_name']} {$form['last_name']}\n"
            . "Email: {$form['email']}\n"
            . "Interested in: " . ($form['interest'] ?: 'Not specified') . "\n\n"
            . "Message:\n{$form['message']}";
        $headers = [
            'From: Travel House Website <no-reply@travelhouse.com>',
            'Reply-To: ' . $form['email'],
            'Content-Type: text/plain; charset=UTF-8',
        ];

        $success = @mail(CONTACT_EMAIL, $subject, $body, implode("\r\n", $headers));
        if ($success) {
            $_SESSION['last_inquiry_at'] = time();
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            $form = array_fill_keys(array_keys($form), '');
        } else {
            $errors[] = 'The message service is not configured yet. Please email nick@travelhouse.com or call (206) 248-0900.';
        }
    }
}

require __DIR__ . '/includes/header.php';
?>
<main id="main-content">
    <section class="v2-contact-hero" data-motion-scene>
        <div class="contact-map-grid" aria-hidden="true"></div>
        <div class="v2-contact-copy reveal">
            <p class="v2-kicker"><span>Your next chapter starts here</span> No commitment · Just possibilities</p>
            <h1>Let’s go<br><em>somewhere.</em></h1>
            <p>I’m here to make your travel dreams effortless and unforgettable. Whether you’re ready to book or just exploring options, I’d love to help.</p>
            <div class="direct-contact">
                <a href="mailto:<?= e(CONTACT_EMAIL) ?>"><span>Email</span><?= e(CONTACT_EMAIL) ?></a>
                <a href="tel:<?= e(CONTACT_PHONE_LINK) ?>"><span>Call</span><?= e(CONTACT_PHONE) ?></a>
            </div>
        </div>
        <figure class="contact-postcard reveal" data-parallax=".9">
            <img src="assets/images/venice-canal.webp" alt="Gondolas on the Grand Canal near the Rialto Bridge in Venice, Italy.">
            <figcaption><b>Wish you were here?</b><span>Venice, Italy · 45.4408° N</span></figcaption>
        </figure>
        <div class="contact-route route" aria-hidden="true"><i>↗</i></div>
        <div class="contact-sticker" aria-hidden="true">Let’s<br>go!</div>
    </section>

    <section class="inquiry-section v2-inquiry section-pad">
        <div class="form-intro reveal">
            <p class="eyebrow">Travel request · TH 001</p>
            <h2>What are you<br><em>dreaming of?</em></h2>
            <p>No polished itinerary needed. A place, a feeling, or a rough date is plenty to begin.</p>
        </div>
        <div class="form-wrap v2-form-card reveal">
            <div class="form-card-head"><span>TRAVEL HOUSE / INQUIRY</span><b>BOARDING GROUP: CURIOUS</b></div>
            <?php if ($success): ?>
                <div class="form-message success" role="status">
                    <strong>Message sent.</strong>
                    <p>Thank you for reaching out. Nick will get back to you soon.</p>
                </div>
            <?php endif; ?>
            <?php if ($errors !== []): ?>
                <div class="form-message error" role="alert">
                    <strong>Let’s fix a couple of things.</strong>
                    <ul><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul>
                </div>
            <?php endif; ?>
            <form class="inquiry-form" method="post" action="contact.php" novalidate>
                <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                <div class="honeypot" aria-hidden="true">
                    <label for="company_website">Company website</label>
                    <input id="company_website" name="company_website" type="text" tabindex="-1" autocomplete="off">
                </div>
                <div class="form-row">
                    <label>First name <span>*</span><input type="text" name="first_name" value="<?= e($form['first_name']) ?>" autocomplete="given-name" required></label>
                    <label>Last name <span>*</span><input type="text" name="last_name" value="<?= e($form['last_name']) ?>" autocomplete="family-name" required></label>
                </div>
                <label>Email <span>*</span><input type="email" name="email" value="<?= e($form['email']) ?>" autocomplete="email" required></label>
                <label>What kind of adventure?
                    <select name="interest">
                        <option value="">I’m open to ideas</option>
                        <?php foreach ($adventures as $adventure): ?>
                            <option value="<?= e($adventure['title']) ?>" <?= $form['interest'] === $adventure['title'] ? 'selected' : '' ?>><?= e($adventure['title']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label>Tell me about the journey you have in mind <span>*</span><textarea name="message" rows="5" required><?= e($form['message']) ?></textarea></label>
                <button class="v2-pill" type="submit">Send inquiry <span>↗</span></button>
                <p class="form-note">Your details are used only to respond to your travel inquiry.</p>
            </form>
            <div class="form-card-barcode" aria-hidden="true"></div>
        </div>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
