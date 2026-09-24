<?php

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
                'description_id' => "Instruksi Lengkap:\nTulis kueri SQL `SELECT` untuk mengambil data pengguna dari tabel `users` dengan spesifikasi:\n1. Pilih kolom: `id`, `name`, `email`, dan `city`.\n2. Filter kondisi: Hanya baris dengan nilai kolom `status` bernilai `'active'`.\n3. Pengurutan data: Urutkan data berdasarkan kolom `name` secara alfabetis dari A ke Z (Ascending).\n4. Akhiri kueri dengan titik koma `;`.",
                'description_en' => "Instructions:\nWrite a SQL `SELECT` query on table `users` with the following requirements:\n1. Select columns: `id`, `name`, `email`, and `city`.\n2. Filter condition: Only records where `status = 'active'`.\n3. Sorting: Order results by `name` ascending (A-Z).\n4. Terminate statement with a semicolon `;`.",
                'schema_setup' => "CREATE TABLE users (id INT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100), status VARCHAR(20), city VARCHAR(50));\nINSERT INTO users VALUES (1, 'Bagas', 'bagas@example.com', 'active', 'Jakarta'), (2, 'Andi', 'andi@example.com', 'inactive', 'Bandung'), (3, 'Citra', 'citra@example.com', 'active', 'Surabaya'), (4, 'Budi', 'budi@example.com', 'active', 'Jakarta');",
                'starter_code' => "-- Tulis query SQL kamu di sini\nSELECT id, name, email, city \nFROM users \nWHERE status = 'active' \nORDER BY name ASC;",
                'hints_id' => [
                    'Sintaks dasar SQL: `SELECT kolom1, kolom2 FROM nama_tabel WHERE kondisi ORDER BY nama_kolom ASC;`',
                    'Pastikan tanda kutip tunggal digunakan untuk membandingkan string status: `WHERE status = \'active\'`.',
                    'Klausa `ORDER BY name ASC` diletakkan setelah klausa `WHERE`.',
                ],
                'hints_en' => [
                    'Basic syntax: `SELECT col1, col2 FROM table_name WHERE condition ORDER BY col_name ASC;`',
                    'Ensure single quotes around string literals: `WHERE status = \'active\'`.',
                    '`ORDER BY name ASC` must appear after the `WHERE` clause.',
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
                'description_id' => "Instruksi Lengkap:\nTulis kueri SQL agregasi untuk menganalisis total omset penjualan dari tabel `products`:\n1. Kelompokkan baris berdasarkan kolom `category`.\n2. Hitung total omset pendapatan per kategori dengan rumus `SUM(price * stock)` dan beri alias kolom `total_revenue`.\n3. Hitung jumlah total varian produk per kategori dengan `COUNT(*)` dan beri alias kolom `total_products`.\n4. Filter hasil agregasi: Hanya tampilkan kategori yang memiliki `total_revenue` lebih besar dari 500.000 (`HAVING SUM(price * stock) > 500000`).\n5. Urutkan hasil dari pendapatan terbesar ke terkecil (`ORDER BY total_revenue DESC`).",
                'description_en' => "Instructions:\nWrite a SQL aggregation query on table `products`:\n1. Group rows by `category`.\n2. Calculate total revenue using `SUM(price * stock)` aliased as `total_revenue`.\n3. Count products per category using `COUNT(*)` aliased as `total_products`.\n4. Filter aggregated group with `HAVING SUM(price * stock) > 500000`.\n5. Sort by `total_revenue DESC`.",
                'schema_setup' => "CREATE TABLE products (id INT PRIMARY KEY, name VARCHAR(100), category VARCHAR(50), price INT, stock INT);\nINSERT INTO products VALUES (1, 'Laptop Pro', 'Electronics', 1500000, 2), (2, 'Mouse Wireless', 'Electronics', 150000, 5), (3, 'Kaos Polos', 'Apparel', 75000, 4), (4, 'Jaket Hoodie', 'Apparel', 250000, 3), (5, 'Stiker Dev', 'Merchandise', 15000, 10);",
                'starter_code' => "-- Tulis query SQL agregasi kamu di sini\nSELECT category, \n       SUM(price * stock) AS total_revenue,\n       COUNT(*) AS total_products\nFROM products\nGROUP BY category\nHAVING total_revenue > 500000\nORDER BY total_revenue DESC;",
                'hints_id' => [
                    'Untuk mengalikan dua kolom sebelum dijumlahkan, gunakan fungsi `SUM(price * stock) AS total_revenue`.',
                    'Klausa `WHERE` tidak bisa memfilter hasil fungsi agregat seperti SUM. Kamu wajib menggunakan klausa `HAVING`.',
                    'Struktur urutan penulisan SQL: `SELECT ... FROM ... GROUP BY ... HAVING ... ORDER BY ...;`'
                ],
                'hints_en' => [
                    'To multiply before summing, use `SUM(price * stock) AS total_revenue`.',
                    '`WHERE` cannot filter aggregate functions; use `HAVING SUM(price * stock) > 500000` instead.',
                    'Clause order: `SELECT ... FROM ... GROUP BY ... HAVING ... ORDER BY ...;`'
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
                'description_id' => "Instruksi Lengkap:\nHubungkan dua tabel relasional `orders` (alias `o`) dan `customers` (alias `c`) menggunakan `INNER JOIN`:\n1. Kunci relasi foreign key: `o.customer_id = c.id`.\n2. Pilih kolom keluaran: `o.order_number`, `c.customer_name`, `o.amount`, dan `o.status`.\n3. Filter kondisi: Hanya tampilkan pesanan yang sudah lunas dengan `o.status = 'PAID'`.\n4. Pengurutan data: Urutkan berdasarkan nominal tagihan `o.amount` dari nominal terbesar ke terkecil (Descending).",
                'description_en' => "Instructions:\nJoin relational tables `orders` (alias `o`) and `customers` (alias `c`) via `INNER JOIN`:\n1. Join condition: `ON o.customer_id = c.id`.\n2. Select: `o.order_number`, `c.customer_name`, `o.amount`, `o.status`.\n3. Filter: Only orders with `o.status = 'PAID'`.\n4. Sort by `o.amount DESC`.",
                'schema_setup' => "CREATE TABLE customers (id INT PRIMARY KEY, customer_name VARCHAR(100), city VARCHAR(50));\nCREATE TABLE orders (id INT PRIMARY KEY, customer_id INT, order_number VARCHAR(50), amount INT, status VARCHAR(20));\nINSERT INTO customers VALUES (1, 'Bagas Praditya', 'Jakarta'), (2, 'Dewi Sartika', 'Bandung'), (3, 'Rian Hidayat', 'Surabaya');\nINSERT INTO orders VALUES (101, 1, 'ORD-2026-001', 750000, 'PAID'), (102, 2, 'ORD-2026-002', 300000, 'PENDING'), (103, 1, 'ORD-2026-003', 1200000, 'PAID'), (104, 3, 'ORD-2026-004', 450000, 'PAID');",
                'starter_code' => "-- Tulis query INNER JOIN kamu di sini\nSELECT o.order_number, c.customer_name, o.amount, o.status\nFROM orders o\nINNER JOIN customers c ON o.customer_id = c.id\nWHERE o.status = 'PAID'\nORDER BY o.amount DESC;",
                'hints_id' => [
                    'Gunakan alias tabel singkat untuk efisiensi kode: `FROM orders o INNER JOIN customers c ON o.customer_id = c.id`.',
                    'Klausa `WHERE o.status = \'PAID\'` ditulis setelah pendefinisian JOIN.',
                    'Tambahkan `ORDER BY o.amount DESC` untuk mengurutkan nilai invoice tertinggi lebih dulu.'
                ],
                'hints_en' => [
                    'Use table aliases for brevity: `FROM orders o INNER JOIN customers c ON o.customer_id = c.id`.',
                    '`WHERE o.status = \'PAID\'` comes after the `JOIN ... ON` statement.',
                    '`ORDER BY o.amount DESC` sorts highest invoice first.'
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
                'description_id' => "Instruksi Lengkap:\nBuat fungsi PHP `formatGreeting(\$name)` yang menerima satu parameter string nama dan mengembalikan string ucapan salam dengan format persis:\n`\"Halo, {name}! Selamat belajar coding.\"`\n\nKetentuan:\n- Jika input nama adalah `\"Bagas\"`, output harus `\"Halo, Bagas! Selamat belajar coding.\"`.\n- Perhatikan tanda baca koma `,`, tanda seru `!`, spasi, serta titik di akhir kalimat harus sama persis.",
                'description_en' => "Instructions:\nCreate a function `formatGreeting(\$name)` that accepts a string name parameter and returns the exact formatted greeting:\n`\"Halo, {name}! Selamat belajar coding.\"`\n\nRules:\n- Ensure punctuation (comma, exclamation mark, period) and spaces match the specification precisely.",
                'starter_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
                'hints_id' => [
                    'Clue 1 (Penggabungan String): Kamu bisa memakai operator titik `.` di PHP: `return "Halo, " . $name . "! Selamat belajar coding.";`',
                    'Clue 2 (String Interpolation): Dalam tanda kutip ganda `""`, variabel PHP otomatis terbaca: `return "Halo, $name! Selamat belajar coding.";`',
                    'Clue 3: Hindari penggunaan tanda kutip tunggal `\'\'` jika menggunakan interpolasi `$name` langsung di dalam string.'
                ],
                'hints_en' => [
                    'Clue 1: Use the concatenation operator `.`: `return "Halo, " . $name . "! Selamat belajar coding.";`',
                    'Clue 2: Or use string interpolation with double quotes `""`: `return "Halo, $name! Selamat belajar coding.";`',
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
                'description_id' => "Instruksi Lengkap:\nBuat fungsi PHP `sumEvenNumbers(array \$numbers): int` yang menerima array berisi angka integer dan mengembalikan hasil penjumlahan seluruh angka genap di dalam array tersebut.\n\nContoh:\n- Input: `[1, 2, 3, 4, 5, 6]` &rarr; Angka genap adalah 2, 4, 6 &rarr; Output: `12`.\n- Input: `[1, 3, 5]` &rarr; Tidak ada angka genap &rarr; Output: `0`.",
                'description_en' => "Instructions:\nCreate a function `sumEvenNumbers(array \$numbers): int` that takes an array of integers and returns the sum of all even integers.\n\nExample:\n- `[1, 2, 3, 4, 5, 6]` -> Evens: 2, 4, 6 -> Return: `12`.\n- `[1, 3, 5]` -> Return: `0`.",
                'starter_code' => "<?php\n\nfunction sumEvenNumbers(array \$numbers): int {\n    // Tulis kode kamu di sini\n    return 0;\n}",
                'hints_id' => [
                    'Clue 1 (Pengecekan Genap): Bilangan genap adalah bilangan yang habis dibagi 2 (sisa bagi 0). Gunakan operator modulo: `\$angka % 2 === 0`.',
                    'Clue 2 (Cara Loop Tradisional): Buat variabel `$total = 0;`, lalu lakukan loop `foreach (\$numbers as \$num)` dan tambahkan ke `$total` jika `$num % 2 === 0`.',
                    'Clue 3 (Cara Functional 1-Baris): Gunakan fungsi bawaan `array_filter` dan `array_sum`: `return array_sum(array_filter(\$numbers, fn(\$n) => \$n % 2 === 0));`'
                ],
                'hints_en' => [
                    'Clue 1: Check even numbers using modulo operator: `\$n % 2 === 0`.',
                    'Clue 2: Loop approach: accumulator `$total += \$num;` inside `foreach`.',
                    'Clue 3: Functional 1-liner: `return array_sum(array_filter(\$numbers, fn(\$n) => \$n % 2 === 0));`'
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
                'description_id' => "Instruksi Lengkap:\nBuat fungsi PHP `generateSlug(string \$title): string` yang mengubah string judul menjadi format URL slug yang ramah SEO (SEO-friendly slug).\n\nAturan Pembersihan String:\n1. Semua huruf harus diubah menjadi huruf kecil (lowercase).\n2. Hapus semua karakter khusus/simbol selain huruf (`a-z`), angka (`0-9`), dan spasi.\n3. Ganti satu atau lebih spasi berturutan menjadi tanda strip `-`.\n4. Bersihkan tanda strip yang berada di ujung awal atau ujung akhir string.",
                'description_en' => "Instructions:\nCreate a function `generateSlug(string \$title): string` that formats an article title into a clean SEO-friendly URL slug.\n\nRules:\n1. Convert all characters to lowercase.\n2. Remove special symbols (keep only letters, numbers, and spaces).\n3. Replace multiple spaces with a single dash `-`.\n4. Trim leading/trailing dashes.",
                'starter_code' => "<?php\n\nfunction generateSlug(string \$title): string {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
                'hints_id' => [
                    'Clue 1 (Lowercase): Gunakan `strtolower(\$title)` untuk mengubah semua huruf kapital menjadi kecil.',
                    'Clue 2 (Hapus Simbol): Gunakan Regular Expression `preg_replace(\'/[^a-z0-9\s-]/\', \'\', \$slug)` untuk menghapus karakter selain huruf dan angka.',
                    'Clue 3 (Spasi ke Strip): Ubah spasi menjadi strip dengan `preg_replace(\'/[\s-]+/\', \'-\', \$slug)`.',
                    'Clue 4 (Trim Ujung): Bersihkan strip di awal & akhir kalimat dengan `trim(\$slug, \'-\')`.'
                ],
                'hints_en' => [
                    'Clue 1: Use `strtolower(\$title)`.',
                    'Clue 2: Sanitize symbols with `preg_replace(\'/[^a-z0-9\s-]/\', \'\', \$slug)`.',
                    'Clue 3: Convert whitespaces: `preg_replace(\'/[\s-]+/\', \'-\', \$slug)`.',
                    'Clue 4: Trim ends: `trim(\$slug, \'-\')`.'
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
                'description_id' => "Instruksi Lengkap:\nBuat fungsi PHP `calculateFinalPrice(float \$subtotal, string \$membership): float` untuk menghitung total tagihan belanja dengan aturan tier diskon:\n\n1. Persentase Diskon Membership (case-insensitive):\n   - `'PREMIUM'` &rarr; Diskon 20% (`0.20`)\n   - `'MEMBER'` &rarr; Diskon 10% (`0.10`)\n   - `'GUEST'` atau lainnya &rarr; Diskon 0% (`0.0`)\n2. Hitung harga setelah diskon: `harga_diskon = subtotal - (subtotal * persentase)`.\n3. Diskon Tambahan (Flat): Jika `harga_diskon >= 500000`, kurangi lagi flat potongan sebesar Rp 25.000.\n4. Kembalikan total harga akhir dalam bentuk float/angka.",
                'description_en' => "Instructions:\nCreate a function `calculateFinalPrice(float \$subtotal, string \$membership): float` to calculate order checkout price based on tiers:\n1. Membership rates: 'PREMIUM' gets 20% off, 'MEMBER' gets 10% off, 'GUEST' gets 0%.\n2. Calculate discounted price = subtotal - (subtotal * rate).\n3. Extra voucher: If discounted price is >= 500,000, subtract an additional flat 25,000.\n4. Return final price.",
                'starter_code' => "<?php\n\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    // Tulis kode kamu di sini\n    return 0.0;\n}",
                'hints_id' => [
                    'Clue 1 (Penentuan Rate): Gunakan ekspresi `match(strtoupper(\$membership))` bawaan PHP 8+ yang modern dan bersih.',
                    'Clue 2 (Hitung Diskon): `$harga = \$subtotal - (\$subtotal * \$rate);`',
                    'Clue 3 (Syarat Tambahan): Periksa apakah `if (\$harga >= 500000)` bernilai true, jika iya kurangkan `$harga -= 25000;`.',
                    'Clue 4: Kembalikan nilai `$harga`.'
                ],
                'hints_en' => [
                    'Clue 1: Use PHP 8 `match(strtoupper(\$membership))` for clean rate mapping.',
                    'Clue 2: Calculate: `$discounted = \$subtotal - (\$subtotal * \$rate);`.',
                    'Clue 3: Apply threshold: `if (\$discounted >= 500000) \$discounted -= 25000;`.',
                    'Clue 4: Return result.'
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
                'description_id' => "Instruksi Lengkap:\nBuat fungsi PHP `isPalindrome(string \$text): bool` yang memeriksa apakah suatu kata atau kalimat adalah palindrom (dibaca sama dari depan maupun dari belakang).\n\nKetentuan:\n- Pengujian bersifat case-insensitive (huruf besar/kecil diabaikan).\n- Abaikan seluruh karakter spasi dan tanda baca.\n- Contoh palindrom valid: `\"Kasur ini rusak\"` &rarr; `true`, `\"A man a plan a canal Panama\"` &rarr; `true`.\n- Contoh bukan palindrom: `\"Belajar Coding Baprade\"` &rarr; `false`.",
                'description_en' => "Instructions:\nCreate a function `isPalindrome(string \$text): bool` that tests whether a string is a palindrome.\n\nRules:\n- Case-insensitive.\n- Ignore whitespaces and punctuation.\n- `\"Kasur ini rusak\"` -> `true`.\n- `\"Belajar Coding Baprade\"` -> `false`.",
                'starter_code' => "<?php\n\nfunction isPalindrome(string \$text): bool {\n    // Tulis kode kamu di sini\n    return false;\n}",
                'hints_id' => [
                    'Clue 1 (Sanitasi String): Bersihkan spasi dan karakter non-alfanumerik terlebih dahulu dengan `preg_replace(\'/[^a-zA-Z0-9]/\', \'\', \$text)`.',
                    'Clue 2 (Standarisasi Case): Ubah string yang sudah bersih menjadi huruf kecil dengan `strtolower(\$clean)`.',
                    'Clue 3 (Pembalikan String): Gunakan fungsi bawaan PHP `strrev(\$clean)` untuk membalik urutan karakter.',
                    'Clue 4 (Bandingkan): Bandingkan string asli dengan string yang dibalik: `return \$clean === strrev(\$clean);`.'
                ],
                'hints_en' => [
                    'Clue 1: Sanitize non-alphanumeric chars with `preg_replace(\'/[^a-zA-Z0-9]/\', \'\', \$text)`.',
                    'Clue 2: Lowercase with `strtolower()`.',
                    'Clue 3: Reverse string with native PHP `strrev()`.',
                    'Clue 4: Check equality: `return \$clean === strrev(\$clean);`.'
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
