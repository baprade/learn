<?php

/**
 * Built by Bagas (Baprade)
 * Day 1: Challenge Repository & LeetCode-style Problem Sets (PHP & SQL) - 2026
 */

namespace App\Services;

class ChallengeService
{
    /**
     * Retrieve all available PHP & SQL learning challenges.
     *
     * @return array
     */
    public function getAll(): array
    {
        return [
            // ==========================================
            // SQL TRACK MODULES
            // ==========================================
            [
                'id' => 101,
                'slug' => 'sql-select-active-users',
                'language' => 'sql',
                'title_id' => 'SQL 01. Query Data Pengguna Aktif (SELECT & WHERE)',
                'title_en' => 'SQL 01. Query Active Users (SELECT & WHERE)',
                'category' => 'SQL Basics & Querying',
                'difficulty' => 'Easy',
                'points' => 15,
                'description_id' => 'Tulis query SQL untuk mengambil kolom `id`, `name`, `email`, dan `city` dari tabel `users` yang memiliki status `status = "active"` dan diurutkan berdasarkan `name` secara ascending (A-Z).',
                'description_en' => 'Write a SQL query to select `id`, `name`, `email`, and `city` from table `users` where `status = "active"`, ordered by `name` ascending (A-Z).',
                'schema_setup' => "CREATE TABLE users (id INT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100), status VARCHAR(20), city VARCHAR(50));\nINSERT INTO users VALUES (1, 'Bagas', 'bagas@example.com', 'active', 'Jakarta'), (2, 'Andi', 'andi@example.com', 'inactive', 'Bandung'), (3, 'Citra', 'citra@example.com', 'active', 'Surabaya'), (4, 'Budi', 'budi@example.com', 'active', 'Jakarta');",
                'starter_code' => "-- Tulis query SQL kamu di sini\nSELECT id, name, email, city \nFROM users \nWHERE ...",
                'hints_id' => [
                    'Gunakan klausa `WHERE status = \'active\'`.',
                    'Tambahkan `ORDER BY name ASC` di akhir query.',
                ],
                'hints_en' => [
                    'Use `WHERE status = \'active\'`.',
                    'Append `ORDER BY name ASC` at the end of query.',
                ],
                'solution_code' => "SELECT id, name, email, city FROM users WHERE status = 'active' ORDER BY name ASC;",
                'test_cases' => [
                    [
                        'input' => ['SELECT * FROM users'],
                        'expected' => [
                            ['id' => 1, 'name' => 'Bagas', 'email' => 'bagas@example.com', 'city' => 'Jakarta'],
                            ['id' => 4, 'name' => 'Budi', 'email' => 'budi@example.com', 'city' => 'Jakarta'],
                            ['id' => 3, 'name' => 'Citra', 'email' => 'citra@example.com', 'city' => 'Surabaya'],
                        ]
                    ]
                ],
            ],
            [
                'id' => 102,
                'slug' => 'sql-aggregate-revenue-by-category',
                'language' => 'sql',
                'title_id' => 'SQL 02. Total Pendapatan per Kategori (GROUP BY & SUM)',
                'title_en' => 'SQL 02. Total Revenue by Category (GROUP BY & SUM)',
                'category' => 'SQL Aggregation & Grouping',
                'difficulty' => 'Medium',
                'points' => 20,
                'description_id' => 'Tulis query SQL untuk menghitung total pendapatan (`total_revenue`) dan jumlah produk (`total_products`) per kategori produk dari tabel `products`. Hanya tampilkan kategori yang memiliki total pendapatan lebih dari 500,000, diurutkan dari pendapatan terbesar ke terkecil.',
                'description_en' => 'Write a SQL query to calculate total revenue (`total_revenue` = SUM(price * stock)) and total item count (`total_products` = COUNT(*)) per `category` from table `products`. Filter only categories with `total_revenue > 500000` (using HAVING), ordered by `total_revenue` descending.',
                'schema_setup' => "CREATE TABLE products (id INT PRIMARY KEY, name VARCHAR(100), category VARCHAR(50), price INT, stock INT);\nINSERT INTO products VALUES (1, 'Laptop Pro', 'Electronics', 1500000, 2), (2, 'Mouse Wireless', 'Electronics', 150000, 5), (3, 'Kaos Polos', 'Apparel', 75000, 4), (4, 'Jaket Hoodie', 'Apparel', 250000, 3), (5, 'Stiker Dev', 'Merchandise', 15000, 10);",
                'starter_code' => "-- Tulis query SQL agregasi kamu di sini\nSELECT category, \n       SUM(price * stock) AS total_revenue,\n       COUNT(*) AS total_products\nFROM products\nGROUP BY ...",
                'hints_id' => [
                    'Gunakan `GROUP BY category`.',
                    'Untuk memfilter hasil agregasi, gunakan `HAVING total_revenue > 500000` atau `HAVING SUM(price * stock) > 500000`.',
                    'Urutkan dengan `ORDER BY total_revenue DESC`.'
                ],
                'hints_en' => [
                    'Use `GROUP BY category`.',
                    'Filter aggregated result using `HAVING SUM(price * stock) > 500000`.',
                    'Order with `ORDER BY total_revenue DESC`.'
                ],
                'solution_code' => "SELECT category, SUM(price * stock) AS total_revenue, COUNT(*) AS total_products FROM products GROUP BY category HAVING SUM(price * stock) > 500000 ORDER BY total_revenue DESC;",
                'test_cases' => [
                    [
                        'input' => ['GROUP BY summary'],
                        'expected' => [
                            ['category' => 'Electronics', 'total_revenue' => 3750000, 'total_products' => 2],
                            ['category' => 'Apparel', 'total_revenue' => 1050000, 'total_products' => 2],
                        ]
                    ]
                ],
            ],
            [
                'id' => 103,
                'slug' => 'sql-inner-join-orders-customers',
                'language' => 'sql',
                'title_id' => 'SQL 03. Relasi Data Pesanan & Pelanggan (INNER JOIN)',
                'title_en' => 'SQL 03. Orders & Customers Relation (INNER JOIN)',
                'category' => 'SQL Joins & Relational',
                'difficulty' => 'Medium',
                'points' => 25,
                'description_id' => 'Gabungkan tabel `orders` dan `customers` menggunakan `INNER JOIN`. Tampilkan kolom `orders.order_number`, `customers.customer_name`, `orders.amount`, dan `orders.status`. Filter hanya pesanan yang berstatus `PAID`, diurutkan berdasarkan `orders.amount` secara descending.',
                'description_en' => 'Join `orders` and `customers` using `INNER JOIN`. Select `order_number`, `customer_name`, `amount`, and `status`. Filter only records where `orders.status = \'PAID\'`, ordered by `orders.amount` descending.',
                'schema_setup' => "CREATE TABLE customers (id INT PRIMARY KEY, customer_name VARCHAR(100), city VARCHAR(50));\nCREATE TABLE orders (id INT PRIMARY KEY, customer_id INT, order_number VARCHAR(50), amount INT, status VARCHAR(20));\nINSERT INTO customers VALUES (1, 'Bagas Praditya', 'Jakarta'), (2, 'Dewi Sartika', 'Bandung'), (3, 'Rian Hidayat', 'Surabaya');\nINSERT INTO orders VALUES (101, 1, 'ORD-2026-001', 750000, 'PAID'), (102, 2, 'ORD-2026-002', 300000, 'PENDING'), (103, 1, 'ORD-2026-003', 1200000, 'PAID'), (104, 3, 'ORD-2026-004', 450000, 'PAID');",
                'starter_code' => "-- Tulis query INNER JOIN kamu di sini\nSELECT o.order_number, c.customer_name, o.amount, o.status\nFROM orders o\nINNER JOIN customers c ON ...",
                'hints_id' => [
                    'Gunakan `ON o.customer_id = c.id`.',
                    'Tambahkan `WHERE o.status = \'PAID\'`.',
                    'Urutkan dengan `ORDER BY o.amount DESC`.'
                ],
                'hints_en' => [
                    'Join condition: `ON o.customer_id = c.id`.',
                    'Add filter `WHERE o.status = \'PAID\'`.',
                    'Sort with `ORDER BY o.amount DESC`.'
                ],
                'solution_code' => "SELECT o.order_number, c.customer_name, o.amount, o.status FROM orders o INNER JOIN customers c ON o.customer_id = c.id WHERE o.status = 'PAID' ORDER BY o.amount DESC;",
                'test_cases' => [
                    [
                        'input' => ['JOIN orders & customers'],
                        'expected' => [
                            ['order_number' => 'ORD-2026-003', 'customer_name' => 'Bagas Praditya', 'amount' => 1200000, 'status' => 'PAID'],
                            ['order_number' => 'ORD-2026-001', 'customer_name' => 'Bagas Praditya', 'amount' => 750000, 'status' => 'PAID'],
                            ['order_number' => 'ORD-2026-004', 'customer_name' => 'Rian Hidayat', 'amount' => 450000, 'status' => 'PAID'],
                        ]
                    ]
                ],
            ],

            // ==========================================
            // PHP TRACK MODULES
            // ==========================================
            [
                'id' => 1,
                'slug' => 'hello-world-string-concatenation',
                'language' => 'php',
                'title_id' => 'PHP 01. Formatting Greeting & Concatenation',
                'title_en' => 'PHP 01. Formatting Greeting & Concatenation',
                'category' => 'PHP Basics',
                'difficulty' => 'Easy',
                'points' => 10,
                'description_id' => 'Buat fungsi `formatGreeting($name)` yang menerima parameter string nama dan mengembalikan string ucapan `"Halo, {name}! Selamat belajar coding."`.',
                'description_en' => 'Create a function `formatGreeting($name)` that takes a string name parameter and returns `"Halo, {name}! Selamat belajar coding."`.',
                'starter_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
                'hints_id' => [
                    'Gunakan penggabungan string (concatenation `.`) atau string interpolation `"Halo, $name!"`.',
                    'Pastikan tanda baca & spasi sesuai persis dengan instruksi.'
                ],
                'hints_en' => [
                    'Use string concatenation `.` or interpolation `"Halo, $name!"`.',
                    'Ensure exact matching of punctuation and spacing.'
                ],
                'solution_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    return \"Halo, \" . \$name . \"! Selamat belajar coding.\";\n}",
                'test_cases' => [
                    ['input' => ['Bagas'], 'expected' => 'Halo, Bagas! Selamat belajar coding.'],
                    ['input' => ['Developer'], 'expected' => 'Halo, Developer! Selamat belajar coding.'],
                    ['input' => ['Learner'], 'expected' => 'Halo, Learner! Selamat belajar coding.'],
                ],
            ],
            [
                'id' => 2,
                'slug' => 'array-even-filter-sum',
                'language' => 'php',
                'title_id' => 'PHP 02. Sum of Even Numbers in Array',
                'title_en' => 'PHP 02. Sum of Even Numbers in Array',
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
                'language' => 'php',
                'title_id' => 'PHP 03. Clean Code URL Slug Generator',
                'title_en' => 'PHP 03. Clean Code URL Slug Generator',
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
                    ['input' => ['Belajar PHP & SQL Modern 2026!'], 'expected' => 'belajar-php-sql-modern-2026'],
                    ['input' => ['Laravel 13 & SOLID Principles'], 'expected' => 'laravel-13-solid-principles'],
                    ['input' => ['  Clean   URL  Generator  '], 'expected' => 'clean-url-generator'],
                ],
            ],
            [
                'id' => 4,
                'slug' => 'solid-single-responsibility-calculator',
                'language' => 'php',
                'title_id' => 'PHP 04. SOLID Principles: Discount Calculator',
                'title_en' => 'PHP 04. SOLID Principles: Discount Calculator',
                'category' => 'SOLID Architecture & OOP',
                'difficulty' => 'Medium',
                'points' => 25,
                'description_id' => 'Buat fungsi `calculateFinalPrice($subtotal, $membership)` dengan aturan: Jika membership `"PREMIUM"` diskon 20%, jika `"MEMBER"` diskon 10%, jika `"GUEST"` diskon 0%. Jika total setelah diskon >= 500000, berikan potongan ekstra flat Rp 25.000.',
                'description_en' => 'Create a function `calculateFinalPrice($subtotal, $membership)` with rules: PREMIUM gets 20% discount, MEMBER gets 10%, GUEST gets 0%. If total after percentage discount is >= 500,000, apply an extra flat 25,000 discount.',
                'starter_code' => "<?php\n\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    // Tulis kode kamu di sini\n    return 0.0;\n}",
                'hints_id' => [
                    'Hitung persentase diskon terlebih dahulu.',
                    'Cek apakah subtotal setelah diskon >= 500000 untuk memberikan potongan tambahan 25000.'
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
                'language' => 'php',
                'title_id' => 'PHP 05. Palindrome Phrase Inspector',
                'title_en' => 'PHP 05. Palindrome Phrase Inspector',
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
                    ['input' => ['Belajar Coding Baprade'], 'expected' => false],
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
