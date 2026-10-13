# Travel House Website

## Contact email

Contact form inquiries are sent to `nick@travelhouse.com` through SMTP. Copy
`.env.example` to `.env` and set the SMTP host, port, encryption, username,
password, and provider-verified sender address. Do not commit `.env` or put SMTP
credentials in the Dockerfile.

Build and run the site with Docker:

```sh
docker build -t travel-house-website .
docker run --rm --env-file .env -p 8080:80 travel-house-website
```

Then open `http://localhost:8080/contact.php`. `SMTP_ENCRYPTION` supports
`tls` (STARTTLS), `ssl` (implicit TLS), or `none` when the SMTP relay explicitly
allows an unencrypted connection. `SMTP_FROM_EMAIL` must be accepted by your
SMTP provider.
