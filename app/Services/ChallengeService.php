<?php

/**
 * Built by Bagas (Baprade)
 * Day 1: Challenge Repository & LeetCode-style Problem Sets - 26 Jul 2026
 */

namespace App\Services;

class ChallengeService
{
    /**
     * Retrieve all available PHP learning challenges.
     *
     * @return array
     */
    public function getAll(): array
    {
        return [
            [
                'id' => 1,
                'slug' => 'hello-world-string-concatenation',
                'title_id' => '01. Formatting Greeting & Concatenation',
                'title_en' => '01. Formatting Greeting & Concatenation',
                'category' => 'PHP Basics',
                'difficulty' => 'Easy',
                'points' => 10,
                'description_id' => 'Buat fungsi `formatGreeting($name)` yang menerima parameter string nama dan mengembalikan string ucapan `"Halo, {name}! Selamat belajar PHP."`.',
                'description_en' => 'Create a function `formatGreeting($name)` that takes a string name parameter and returns `"Halo, {name}! Selamat belajar PHP."`.',
                'starter_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
                'hints_id' => [
                    'Gunakan penggabungan string (concatenation `.`) atau string interpolation `"Halo, $name!"`.',
                    'Pastikan tanda baca & spasi sesuai persis dengan instruksi.'
                ],
                'hints_en' => [
                    'Use string concatenation `.` or interpolation `"Halo, $name!"`.',
                    'Ensure exact matching of punctuation and spacing.'
                ],
                'solution_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    return \"Halo, \" . \$name . \"! Selamat belajar PHP.\";\n}",
                'test_cases' => [
                    ['input' => ['Bagas'], 'expected' => 'Halo, Bagas! Selamat belajar PHP.'],
                    ['input' => ['Dev'], 'expected' => 'Halo, Dev! Selamat belajar PHP.'],
                    ['input' => ['APAC Learner'], 'expected' => 'Halo, APAC Learner! Selamat belajar PHP.'],
                ],
            ],
            [
                'id' => 2,
                'slug' => 'array-even-filter-sum',
                'title_id' => '02. Sum of Even Numbers in Array',
                'title_en' => '02. Sum of Even Numbers in Array',
                'category' => 'Arrays & Manipulation',
                'difficulty' => 'Easy',
                'points' => 15,
                'description_id' => 'Buat fungsi `sumEvenNumbers($numbers)` yang menerima array berisi angka integer dan mengembalikan jumlah (sum) dari seluruh angka genap dalam array tersebut.',
                'description_en' => 'Create a function `sumEvenNumbers($numbers)` that accepts an array of integers and returns the sum of all even numbers.',
                'starter_code' => "<?php\n\nfunction sumEvenNumbers(array \$numbers): int {\n    // Tulis kode kamu di sini\n    return 0;\n}",
                'hints_id' => [
                    'Gunakan modulo `% 2 === 0` untuk mengecek apakah angka genap.',
                    'Kamu bisa memakai loop `foreach` atau fungsi `array_filter()` & `array_sum()`.',
                ],
                'hints_en' => [
                    'Use modulo `% 2 === 0` to check if a number is even.',
                    'You can use a `foreach` loop or combining `array_filter()` & `array_sum()`.',
                ],
                'solution_code' => "<?php\n\nfunction sumEvenNumbers(array \$numbers): int {\n    \$evens = array_filter(\$numbers, fn(\$n) => \$n % 2 === 0);\n    return array_sum(\$evens);\n}",
                'test_cases' => [
                    ['input' => [[1, 2, 3, 4, 5, 6]], 'expected' => 12],
                    ['input' => [[10, 15, 20, 25]], 'expected' => 30],
                    ['input' => [[1, 3, 5]], 'expected' => 0],
                ],
            ],
            [
                'id' => 3,
                'slug' => 'clean-code-slug-generator',
                'title_id' => '03. Clean Code URL Slug Generator',
                'title_en' => '03. Clean Code URL Slug Generator',
                'category' => 'Strings & RegEx',
                'difficulty' => 'Medium',
                'points' => 20,
                'description_id' => 'Buat fungsi `generateSlug($title)` yang mengubah judul artikel menjadi format URL slug (lowercase, spasi diganti strip `-`, hapus karakter khusus selain huruf & angka).',
                'description_en' => 'Create a function `generateSlug($title)` that converts a title into a clean URL slug (lowercased, spaces replaced by `-`, non-alphanumeric characters stripped).',
                'starter_code' => "<?php\n\nfunction generateSlug(string \$title): string {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
                'hints_id' => [
                    'Gunakan strtolower() untuk lowercase.',
                    'Gunakan preg_replace() untuk menghapus karakter non-alphanumeric lalu ganti spasi dengan strip.',
                    'Bisa gunakan trim() untuk menghilangkan strip di ujung string.'
                ],
                'hints_en' => [
                    'Use strtolower() for lowercasing.',
                    'Use preg_replace() to sanitize non-alphanumeric chars and convert spaces to dashes.',
                    'Use trim() to remove trailing dashes.'
                ],
                'solution_code' => "<?php\n\nfunction generateSlug(string \$title): string {\n    \$slug = strtolower(\$title);\n    \$slug = preg_replace('/[^a-z0-9\s-]/', '', \$slug);\n    \$slug = preg_replace('/[\s-]+/', '-', \$slug);\n    return trim(\$slug, '-');\n}",
                'test_cases' => [
                    ['input' => ['Belajar PHP Modern 2026!'], 'expected' => 'belajar-php-modern-2026'],
                    ['input' => ['Laravel 13 & SOLID Principles'], 'expected' => 'laravel-13-solid-principles'],
                    ['input' => ['  Clean   URL  Generator  '], 'expected' => 'clean-url-generator'],
                ],
            ],
            [
                'id' => 4,
                'slug' => 'solid-single-responsibility-calculator',
                'title_id' => '04. SOLID Principles: Order Discount Calculator',
                'title_en' => '04. SOLID Principles: Order Discount Calculator',
                'category' => 'SOLID Architecture & OOP',
                'difficulty' => 'Medium',
                'points' => 25,
                'description_id' => 'Buat fungsi `calculateFinalPrice($subtotal, $membership)` dengan aturan: Jika membership `"PREMIUM"` berikan diskon 20%, jika `"MEMBER"` berikan diskon 10%, jika `"GUEST"` diskon 0%. Jika total setelah diskon >= 500000, berikan potongan tambahan flat Rp 25.000.',
                'description_en' => 'Create a function `calculateFinalPrice($subtotal, $membership)` with rules: PREMIUM gets 20% discount, MEMBER gets 10%, GUEST gets 0%. If total after percentage discount is >= 500,000, apply an extra flat 25,000 discount.',
                'starter_code' => "<?php\n\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    // Tulis kode kamu di sini\n    return 0.0;\n}",
                'hints_id' => [
                    'Hitung persentase diskon terlebih dahulu.',
                    'Cek apakah subtotal setelah persentase diskon >= 500000 untuk memberikan potongan ekstra 25000.'
                ],
                'hints_en' => [
                    'Calculate percentage discount first.',
                    'Check if subtotal after percentage discount is >= 500000 to apply extra 25000 deduction.'
                ],
                'solution_code' => "<?php\n\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    \$rate = match(strtoupper(\$membership)) {\n        'PREMIUM' => 0.20,\n        'MEMBER' => 0.10,\n        default => 0.0,\n    };\n    \$discounted = \$subtotal - (\$subtotal * \$rate);\n    if (\$discounted >= 500000) {\n        \$discounted -= 25000;\n    }\n    return \$discounted;\n}",
                'test_cases' => [
                    ['input' => [100000, 'PREMIUM'], 'expected' => 80000],
                    ['input' => [600000, 'MEMBER'], 'expected' => 515000],
                    ['input' => [200000, 'GUEST'], 'expected' => 200000],
                ],
            ],
            [
                'id' => 5,
                'slug' => 'palindrome-checker-utility',
                'title_id' => '05. Palindrome Phrase Inspector',
                'title_en' => '05. Palindrome Phrase Inspector',
                'category' => 'Strings & Algorithms',
                'difficulty' => 'Easy',
                'points' => 15,
                'description_id' => 'Buat fungsi `isPalindrome($text)` yang mengembalikan `true` jika kata/kalimat adalah palindrom (dibaca sama dari depan & belakang, abaikan spasi & kapitalisasi), dan `false` jika bukan.',
                'description_en' => 'Create a function `isPalindrome($text)` that returns `true` if a phrase is a palindrome (ignoring spaces, punctuation & case), and `false` otherwise.',
                'starter_code' => "<?php\n\nfunction isPalindrome(string \$text): bool {\n    // Tulis kode kamu di sini\n    return false;\n}",
                'hints_id' => [
                    'Bersihkan spasi dan tanda baca dengan preg_replace().',
                    'Ubah ke lowercase dengan strtolower().',
                    'Bandingkan string dengan pembalikannya strrev().'
                ],
                'hints_en' => [
                    'Clean punctuation & spaces with `preg_replace()`.',
                    'Lowercase the string.',
                    'Compare string with its reverse `strrev()`.'
                ],
                'solution_code' => "<?php\n\nfunction isPalindrome(string \$text): bool {\n    \$clean = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', \$text));\n    return \$clean === strrev(\$clean);\n}",
                'test_cases' => [
                    ['input' => ['Kasur ini rusak'], 'expected' => true],
                    ['input' => ['A man a plan a canal Panama'], 'expected' => true],
                    ['input' => ['Belajar PHP Baprade'], 'expected' => false],
                ],
            ],
        ];
    }

    /**
     * Find a challenge by slug.
     *
     * @param string $slug
     * @return array|null
     */
    public function findBySlug(string $slug): ?array
    {
        foreach ($this->getAll() as $challenge) {
            if ($challenge['slug'] === $slug) {
                return $challenge;
            }
        }
        return null;
    }
}
