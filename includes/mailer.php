<?php
declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../vendor/autoload.php';

function load_env_file(): void
{
    $dotenvPath = __DIR__ . '/../.env';
    if (!is_readable($dotenvPath)) {
        return;
    }

    $lines = file($dotenvPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return;
    }

    foreach ($lines as $line) {
        $trimmed = trim($line);
        if ($trimmed === '' || str_starts_with($trimmed, '#')) {
            continue;
        }

        $parts = explode('=', $line, 2);
        if (count($parts) !== 2) {
            continue;
        }

        [$name, $value] = $parts;
        $name = trim($name);
        $value = trim($value);

        if ($name === '') {
            continue;
        }

        $value = preg_replace('/^"(.*)"$/', '$1', $value);
        $value = preg_replace('/^\'(.*)\'$/', '$1', $value);
        $value = is_string($value) ? $value : '';

        if (getenv($name) === false) {
            putenv($name . '=' . $value);
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}

load_env_file();

function send_contact_email(string $recipient, string $subject, string $body, string $replyTo): bool
{
    $host = trim((string)(getenv('SMTP_HOST') ?: ''));
    $username = (string)(getenv('SMTP_USERNAME') ?: '');
    $password = (string)(getenv('SMTP_PASSWORD') ?: '');
    $port = filter_var((string)(getenv('SMTP_PORT') ?: '587'), FILTER_VALIDATE_INT);
    $encryption = strtolower(trim((string)(getenv('SMTP_ENCRYPTION') ?: 'tls')));
    $fromEmail = trim((string)(getenv('SMTP_FROM_EMAIL') ?: 'no-reply@travelhouse.com'));
    $fromName = trim((string)(getenv('SMTP_FROM_NAME') ?: 'Travel House Website'));

    if ($host === '' || $username === '' || $password === '' || $port === false || $port < 1 || $port > 65535) {
        if (function_exists('mail')) {
            $headers = [
                'From: ' . $fromEmail,
                'Reply-To: ' . $replyTo,
                'Content-Type: text/plain; charset=UTF-8',
            ];

            if (mail($recipient, $subject, $body, implode("\r\n", $headers))) {
                return true;
            }
        }

        error_log('Contact email delivery is unavailable: SMTP settings are missing or invalid and PHP mail() fallback failed.');
        return false;
    }

    if (!in_array($encryption, ['tls', 'ssl', 'none'], true) || !filter_var($fromEmail, FILTER_VALIDATE_EMAIL)) {
        error_log('Contact email delivery is unavailable: SMTP encryption or sender settings are invalid.');
        return false;
    }

    try {
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = $host;
        $mailer->SMTPAuth = true;
        $mailer->Username = $username;
        $mailer->Password = $password;
        $mailer->Port = $port;
        $mailer->CharSet = PHPMailer::CHARSET_UTF8;
        $mailer->SMTPDebug = SMTP::DEBUG_OFF;

        if ($encryption === 'tls') {
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        } elseif ($encryption === 'ssl') {
            $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mailer->SMTPSecure = '';
            $mailer->SMTPAutoTLS = false;
        }

        $mailer->setFrom($fromEmail, $fromName);
        $mailer->addAddress($recipient);
        $mailer->addReplyTo($replyTo);
        $mailer->Subject = $subject;
        $mailer->Body = $body;
        $mailer->isHTML(false);
        $mailer->send();

        return true;
    } catch (Throwable $exception) {
        error_log('Contact email delivery failed: ' . $exception->getMessage());
        return false;
    }
}