<?php

/**
 * Built by Bagas (Baprade)
 * Day 2: WhatsApp Dynamic URL Generator & Scraper Shield - 27 Jul 2026
 */

namespace App\Services;

class WhatsAppService
{
    /**
     * Get target WhatsApp number from config.
     */
    public function getWaNumber(): string
    {
        return preg_replace('/[^0-9]/', '', config('seo.whatsapp', '6281283141448'));
    }

    /**
     * Build WhatsApp redirect URL without exposing raw phone number in static HTML text.
     *
     * @param string $message
     * @return string
     */
    public function buildUrl(string $message = 'Halo Bagas, mau diskusi bikin website bro!'): string
    {
        $number = $this->getWaNumber();
        return 'https://wa.me/' . $number . '?text=' . urlencode($message);
    }

    /**
     * Mask phone number for privacy display (e.g. +62 812-****-1448 or hidden).
     */
    public function getMaskedDisplay(): string
    {
        return 'Direct WhatsApp';
    }
}
