<?php

namespace Core\Http;

class SecurityHeadersMiddleware extends Middleware
{
    public function execute()
    {
        // Prevent Clickjacking
        header('X-Frame-Options: SAMEORIGIN');
        // Prevent MIME type sniffing
        header('X-Content-Type-Options: nosniff');
        // XSS Protection (Legacy but good)
        header('X-XSS-Protection: 1; mode=block');
        // Referrer Policy
        header('Referrer-Policy: no-referrer-when-downgrade');
        // HSTS (Force HTTPS) - Enable if using HTTPS
        // header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
    }
}
