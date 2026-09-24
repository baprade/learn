<?php

namespace App\Services;

class ChallengeService
{
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
                'summary_id' => 'Ambil data pengguna dengan status aktif dan urutkan berdasarkan nama.',
                'summary_en' => 'Select active users from database sorted alphabetically by name.',
                'steps_id' => [
                    'Pilih kolom yang ditampilkan: <code>id</code>, <code>name</code>, <code>email</code>, dan <code>city</code>.',
                    'Gunakan klausa <code>WHERE status = \'active\'</code> untuk memfilter pengguna aktif.',
                    'Urutkan data berdasarkan kolom <code>name</code> secara ascending (A-Z) dengan <code>ORDER BY name ASC</code>.',
                    'Akhiri kueri SQL kamu dengan titik koma (<code>;</code>).'
                ],
                'steps_en' => [
                    'Select columns: <code>id</code>, <code>name</code>, <code>email</code>, and <code>city</code>.',
                    'Filter active records using <code>WHERE status = \'active\'</code>.',
                    'Sort results alphabetically using <code>ORDER BY name ASC</code>.',
                    'End statement with semicolon (<code>;</code>).'
                ],
                'rules_id' => [
                    'Tabel sumber: <code>users</code>',
                    'Kolom output harus tepat 4 kolom sesuai urutan di atas.'
                ],
                'rules_en' => [
                    'Source table: <code>users</code>',
                    'Output must contain exactly 4 columns in the requested order.'
                ],
                'schema_setup' => "CREATE TABLE users (id INT PRIMARY KEY, name VARCHAR(100), email VARCHAR(100), status VARCHAR(20), city VARCHAR(50));\nINSERT INTO users VALUES (1, 'Bagas', 'bagas@example.com', 'active', 'Jakarta'), (2, 'Andi', 'andi@example.com', 'inactive', 'Bandung'), (3, 'Citra', 'citra@example.com', 'active', 'Surabaya'), (4, 'Budi', 'budi@example.com', 'active', 'Jakarta');",
                'starter_code' => "-- Tulis query SQL kamu di sini\nSELECT id, name, email, city \nFROM users \nWHERE status = 'active' \nORDER BY name ASC;",
                'hints_id' => [
                    'Sintaks dasar SQL: `SELECT kolom1, kolom2 FROM nama_tabel WHERE kondisi ORDER BY nama_kolom ASC;`',
                    'Pastikan tanda kutip tunggal digunakan untuk membandingkan string: `WHERE status = \'active\'`.',
                    'Klausa `ORDER BY name ASC` diletakkan setelah klausa `WHERE`.',
                ],
                'hints_en' => [
                    'Basic syntax: `SELECT col1, col2 FROM table_name WHERE condition ORDER BY col_name ASC;`',
                    'Ensure single quotes around string literals: `WHERE status = \'active\'`.',
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
                'summary_id' => 'Hitung total omset dan jumlah produk per kategori dengan filter threshold pendapatan.',
                'summary_en' => 'Calculate total revenue and product count per category filtered by threshold.',
                'steps_id' => [
                    'Kelompokkan baris berdasarkan kolom <code>category</code>.',
                    'Hitung total pendapatan dengan rumus <code>SUM(price * stock)</code> dan beri alias <code>total_revenue</code>.',
                    'Hitung total jumlah varian produk dengan <code>COUNT(*)</code> dan beri alias <code>total_products</code>.',
                    'Filter hasil agregasi: Hanya tampilkan kategori yang memiliki omset lebih dari 500.000 menggunakan klausa <code>HAVING total_revenue > 500000</code> atau <code>HAVING SUM(price * stock) > 500000</code>.',
                    'Urutkan dari pendapatan terbesar ke terkecil: <code>ORDER BY total_revenue DESC</code>.'
                ],
                'steps_en' => [
                    'Group rows by <code>category</code>.',
                    'Compute total revenue via <code>SUM(price * stock) AS total_revenue</code>.',
                    'Count items with <code>COUNT(*) AS total_products</code>.',
                    'Filter groups using <code>HAVING SUM(price * stock) > 500000</code>.',
                    'Sort descending with <code>ORDER BY total_revenue DESC</code>.'
                ],
                'rules_id' => [
                    'Tabel sumber: <code>products</code> (kolom: <code>id</code>, <code>name</code>, <code>category</code>, <code>price</code>, <code>stock</code>)',
                    'Kolom output yang wajib: <code>category</code>, <code>total_revenue</code>, <code>total_products</code>.'
                ],
                'rules_en' => [
                    'Source table: <code>products</code>',
                    'Output columns: <code>category</code>, <code>total_revenue</code>, <code>total_products</code>.'
                ],
                'schema_setup' => "CREATE TABLE products (id INT PRIMARY KEY, name VARCHAR(100), category VARCHAR(50), price INT, stock INT);\nINSERT INTO products VALUES (1, 'Laptop Pro', 'Electronics', 1500000, 2), (2, 'Mouse Wireless', 'Electronics', 150000, 5), (3, 'Kaos Polos', 'Apparel', 75000, 4), (4, 'Jaket Hoodie', 'Apparel', 250000, 3), (5, 'Stiker Dev', 'Merchandise', 15000, 10);",
                'starter_code' => "-- Tulis query SQL agregasi kamu di sini\nSELECT category, \n       SUM(price * stock) AS total_revenue,\n       COUNT(*) AS total_products\nFROM products\nGROUP BY category\nHAVING total_revenue > 500000\nORDER BY total_revenue DESC;",
                'hints_id' => [
                    'Gunakan `SUM(price * stock) AS total_revenue` untuk mengalikan harga dan stok sebelum dijumlahkan.',
                    'Gunakan `HAVING` bukan `WHERE` untuk memfilter hasil fungsi agregat SUM.',
                    'Urutkan dengan `ORDER BY total_revenue DESC`.'
                ],
                'hints_en' => [
                    'Use `SUM(price * stock) AS total_revenue`.',
                    'Use `HAVING` instead of `WHERE` for aggregate filter.',
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
                'summary_id' => 'Gabungkan data transaksi pesanan dengan tabel pelanggan menggunakan INNER JOIN.',
                'summary_en' => 'Join orders and customers relational tables via INNER JOIN.',
                'steps_id' => [
                    'Relasikan tabel <code>orders o</code> dan <code>customers c</code> dengan syarat: <code>ON o.customer_id = c.id</code>.',
                    'Pilih 4 kolom keluaran: <code>o.order_number</code>, <code>c.customer_name</code>, <code>o.amount</code>, dan <code>o.status</code>.',
                    'Filter pesanan lunas: Tambahkan kondisi <code>WHERE o.status = \'PAID\'</code>.',
                    'Urutkan dari tagihan tertinggi ke terendah: <code>ORDER BY o.amount DESC</code>.'
                ],
                'steps_en' => [
                    'Join condition: <code>ON o.customer_id = c.id</code>.',
                    'Select 4 columns: <code>o.order_number</code>, <code>c.customer_name</code>, <code>o.amount</code>, <code>o.status</code>.',
                    'Filter condition: <code>WHERE o.status = \'PAID\'</code>.',
                    'Sort descending: <code>ORDER BY o.amount DESC</code>.'
                ],
                'rules_id' => [
                    'Tabel: <code>orders</code> dan <code>customers</code>',
                    'Pastikan kolom order_number dan customer_name berpasangan dengan benar.'
                ],
                'rules_en' => [
                    'Tables: <code>orders</code> and <code>customers</code>',
                    'Ensure correct key linkage between orders and customers.'
                ],
                'schema_setup' => "CREATE TABLE customers (id INT PRIMARY KEY, customer_name VARCHAR(100), city VARCHAR(50));\nCREATE TABLE orders (id INT PRIMARY KEY, customer_id INT, order_number VARCHAR(50), amount INT, status VARCHAR(20));\nINSERT INTO customers VALUES (1, 'Bagas Praditya', 'Jakarta'), (2, 'Dewi Sartika', 'Bandung'), (3, 'Rian Hidayat', 'Surabaya');\nINSERT INTO orders VALUES (101, 1, 'ORD-2026-001', 750000, 'PAID'), (102, 2, 'ORD-2026-002', 300000, 'PENDING'), (103, 1, 'ORD-2026-003', 1200000, 'PAID'), (104, 3, 'ORD-2026-004', 450000, 'PAID');",
                'starter_code' => "-- Tulis query INNER JOIN kamu di sini\nSELECT o.order_number, c.customer_name, o.amount, o.status\nFROM orders o\nINNER JOIN customers c ON o.customer_id = c.id\nWHERE o.status = 'PAID'\nORDER BY o.amount DESC;",
                'hints_id' => [
                    'Gunakan alias tabel: `FROM orders o INNER JOIN customers c ON o.customer_id = c.id`.',
                    'Klausa `WHERE o.status = \'PAID\'` ditulis setelah perintah JOIN.',
                    'Tambahkan `ORDER BY o.amount DESC`.'
                ],
                'hints_en' => [
                    'Use table aliases: `FROM orders o INNER JOIN customers c ON o.customer_id = c.id`.',
                    '`WHERE o.status = \'PAID\'` follows the join clause.',
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
                'summary_id' => 'Buat fungsi pembentuk salam dengan penggabungan string nama yang dinamis.',
                'summary_en' => 'Create a greeting formatter function using dynamic string concatenation.',
                'steps_id' => [
                    'Deklarasikan fungsi: <code>function formatGreeting($name)</code>.',
                    'Gabungkan string nama ke dalam template salam dengan format persis: <code>"Halo, {name}! Selamat belajar coding."</code>.',
                    'Kembalikan (return) string hasil salam.'
                ],
                'steps_en' => [
                    'Declare function: <code>function formatGreeting($name)</code>.',
                    'Combine string to match exact format: <code>"Halo, {name}! Selamat belajar coding."</code>.',
                    'Return the formatted string.'
                ],
                'rules_id' => [
                    'Contoh Input: <code>"Bagas"</code> &rarr; Output: <code>"Halo, Bagas! Selamat belajar coding."</code>',
                    'Perhatikan spasi, tanda koma <code>,</code>, tanda seru <code>!</code>, dan titik <code>.</code> di akhir kalimat.'
                ],
                'rules_en' => [
                    'Example Input: <code>"Bagas"</code> -> Output: <code>"Halo, Bagas! Selamat belajar coding."</code>',
                    'Punctuation and spacing must match exact specifications.'
                ],
                'starter_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    // Tulis kode kamu di sini\n    return \"Halo, \" . \$name . \"! Selamat belajar coding.\";\n}",
                'hints_id' => [
                    'Clue 1: Gunakan operator titik `.` untuk menyambung string: `"Halo, " . $name . "! Selamat belajar coding."`',
                    'Clue 2: Atau gunakan interpolasi tanda kutip ganda `""`: `"Halo, $name! Selamat belajar coding."`'
                ],
                'hints_en' => [
                    'Clue 1: Use string concatenation operator `.`.',
                    'Clue 2: Or use string interpolation with double quotes `""`.'
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
                'summary_id' => 'Filter seluruh angka genap dalam array dan jumlahkan nilainya.',
                'summary_en' => 'Filter all even numbers in an array and calculate their sum.',
                'steps_id' => [
                    'Terima parameter <code>array $numbers</code>.',
                    'Periksa setiap elemen: angka dikatakan genap jika sisa bagi dengan 2 adalah nol (<code>$n % 2 === 0</code>).',
                    'Jumlahkan seluruh angka genap yang ditemukan.',
                    'Kembalikan total penjumlahan integer (jika tidak ada angka genap, kembalikan <code>0</code>).'
                ],
                'steps_en' => [
                    'Accept parameter <code>array $numbers</code>.',
                    'Filter even integers using modulo: <code>$n % 2 === 0</code>.',
                    'Sum all matched even numbers.',
                    'Return integer sum (or <code>0</code> if none).'
                ],
                'rules_id' => [
                    'Input: <code>[1, 2, 3, 4, 5, 6]</code> &rarr; Genap: 2, 4, 6 &rarr; Return: <code>12</code>',
                    'Input: <code>[1, 3, 5]</code> &rarr; Tidak ada genap &rarr; Return: <code>0</code>'
                ],
                'rules_en' => [
                    'Input: <code>[1, 2, 3, 4, 5, 6]</code> -> Evens: 2, 4, 6 -> Return: <code>12</code>',
                    'Input: <code>[1, 3, 5]</code> -> Return: <code>0</code>'
                ],
                'starter_code' => "<?php\n\nfunction sumEvenNumbers(array \$numbers): int {\n    // Tulis kode kamu di sini\n    \$evens = array_filter(\$numbers, fn(\$n) => \$n % 2 === 0);\n    return array_sum(\$evens);\n}",
                'hints_id' => [
                    'Clue 1: Modulo `$n % 2 === 0` mengecek apakah bilangan genap.',
                    'Clue 2: Cara 1-baris bersih: `return array_sum(array_filter($numbers, fn($n) => $n % 2 === 0));`'
                ],
                'hints_en' => [
                    'Clue 1: Modulo `$n % 2 === 0` tests for even numbers.',
                    'Clue 2: Clean 1-liner: `return array_sum(array_filter($numbers, fn($n) => $n % 2 === 0));`'
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
                'summary_id' => 'Format judul artikel menjadi URL slug bersih, huruf kecil, dan ramah SEO.',
                'summary_en' => 'Transform a title into a lowercase SEO-friendly URL slug.',
                'steps_id' => [
                    'Ubah semua karakter huruf menjadi huruf kecil (<code>strtolower</code>).',
                    'Hapus karakter khusus/simbol selain huruf (<code>a-z</code>), angka (<code>0-9</code>), dan spasi.',
                    'Ganti satu atau beberapa spasi berturutan menjadi tanda strip tunggal (<code>-</code>).',
                    'Hapus tanda strip yang berada di ujung depan atau belakang string (<code>trim</code>).'
                ],
                'steps_en' => [
                    'Convert string to lowercase (<code>strtolower</code>).',
                    'Strip all non-alphanumeric characters except spaces.',
                    'Replace sequential whitespace with a dash (<code>-</code>).',
                    'Trim leading/trailing dashes (<code>trim</code>).'
                ],
                'rules_id' => [
                    'Input: <code>"Belajar PHP & SQL Modern 2026!"</code> &rarr; Output: <code>"belajar-php-sql-modern-2026"</code>',
                    'Input: <code>"  Clean   URL  Generator  "</code> &rarr; Output: <code>"clean-url-generator"</code>'
                ],
                'rules_en' => [
                    'Input: <code>"Belajar PHP & SQL Modern 2026!"</code> -> Output: <code>"belajar-php-sql-modern-2026"</code>',
                    'Input: <code>"  Clean   URL  Generator  "</code> -> Output: <code>"clean-url-generator"</code>'
                ],
                'starter_code' => "<?php\n\nfunction generateSlug(string \$title): string {\n    // Tulis kode kamu di sini\n    \$slug = strtolower(\$title);\n    \$slug = preg_replace('/[^a-z0-9\s-]/', '', \$slug);\n    \$slug = preg_replace('/[\s-]+/', '-', \$slug);\n    return trim(\$slug, '-');\n}",
                'hints_id' => [
                    'Clue 1: Lowercase dengan `strtolower($title)`.',
                    'Clue 2: Hapus simbol: `preg_replace(\'/[^a-z0-9\s-]/\', \'\', $slug)`.',
                    'Clue 3: Ganti spasi: `preg_replace(\'/[\s-]+/\', \'-\', $slug)`.',
                    'Clue 4: Trim ujung: `trim($slug, \'-\')`.'
                ],
                'hints_en' => [
                    'Clue 1: Use `strtolower($title)`.',
                    'Clue 2: Sanitize symbols with regex.',
                    'Clue 3: Replace whitespace with dashes.',
                    'Clue 4: Trim ends with `trim($slug, \'-\')`.'
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
                'summary_id' => 'Hitung harga checkout bertingkat berdasarkan tier membership dan voucher flat.',
                'summary_en' => 'Calculate tiered checkout price based on membership and flat voucher.',
                'steps_id' => [
                    'Tentukan persentase diskon membership: <code>PREMIUM = 20%</code> (0.20), <code>MEMBER = 10%</code> (0.10), <code>GUEST = 0%</code> (0.0).',
                    'Hitung harga terdiskon awal: <code>$discounted = $subtotal - ($subtotal * $rate)</code>.',
                    'Syarat Voucher Ekstra: Jika nilai <code>$discounted >= 500000</code>, berikan potongan tambahan flat sebesar <code>Rp 25.000</code> (<code>$discounted -= 25000</code>).',
                    'Kembalikan nilai total harga akhir (float/number).'
                ],
                'steps_en' => [
                    'Determine membership rate: <code>PREMIUM = 20%</code>, <code>MEMBER = 10%</code>, <code>GUEST = 0%</code>.',
                    'Compute discounted price: <code>$discounted = $subtotal - ($subtotal * $rate)</code>.',
                    'Voucher condition: If <code>$discounted >= 500000</code>, deduct additional flat <code>25,000</code>.',
                    'Return final calculated price.'
                ],
                'rules_id' => [
                    'Input: <code>(100000, "PREMIUM")</code> &rarr; Diskon 20% &rarr; Return: <code>80000</code>',
                    'Input: <code>(600000, "MEMBER")</code> &rarr; Diskon 10% (540rb) + Flat 25rb &rarr; Return: <code>515000</code>',
                    'Input: <code>(200000, "GUEST")</code> &rarr; Diskon 0% &rarr; Return: <code>200000</code>'
                ],
                'rules_en' => [
                    'Input: <code>(100000, "PREMIUM")</code> -> 20% off -> Return: <code>80000</code>',
                    'Input: <code>(600000, "MEMBER")</code> -> 10% off (540k) + Flat 25k off -> Return: <code>515000</code>',
                    'Input: <code>(200000, "GUEST")</code> -> 0% off -> Return: <code>200000</code>'
                ],
                'starter_code' => "<?php\n\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    // Tulis kode kamu di sini\n    \$rate = match(strtoupper(\$membership)) {\n        'PREMIUM' => 0.20,\n        'MEMBER' => 0.10,\n        default => 0.0,\n    };\n    \$discounted = \$subtotal - (\$subtotal * \$rate);\n    if (\$discounted >= 500000) {\n        \$discounted -= 25000;\n    }\n    return \$discounted;\n}",
                'hints_id' => [
                    'Clue 1: Gunakan `match(strtoupper($membership))` untuk memetakan tier ke persentase desimal.',
                    'Clue 2: Hitung diskon persentase dulu sebelum mengecek threshold 500.000.',
                    'Clue 3: Potongan Rp 25.000 hanya diberikan jika harga setelah diskon persentase bernilai >= 500.000.'
                ],
                'hints_en' => [
                    'Clue 1: Use `match(strtoupper($membership))` for tier mapping.',
                    'Clue 2: Apply percentage discount first.',
                    'Clue 3: Apply flat 25,000 deduction if `>= 500000`.'
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
                'summary_id' => 'Periksa apakah suatu kalimat terbaca sama dari depan maupun belakang.',
                'summary_en' => 'Test whether a string reads identically forwards and backwards.',
                'steps_id' => [
                    'Bersihkan string dari spasi, tanda baca, dan karakter non-alfanumerik.',
                    'Ubah semua karakter huruf menjadi huruf kecil (lowercase).',
                    'Balik urutan karakter string menggunakan fungsi <code>strrev</code>.',
                    'Bandingkan string asli yang sudah bersih dengan string terbalik. Kembalikan <code>true</code> jika identik, atau <code>false</code> jika tidak.'
                ],
                'steps_en' => [
                    'Sanitize string by stripping whitespace and non-alphanumerics.',
                    'Convert characters to lowercase.',
                    'Reverse string characters using <code>strrev</code>.',
                    'Compare and return boolean <code>true</code>/<code>false</code>.'
                ],
                'rules_id' => [
                    '<code>"Kasur ini rusak"</code> &rarr; Bersih: <code>"kasurinirusak"</code> &rarr; Return: <code>true</code>',
                    '<code>"A man a plan a canal Panama"</code> &rarr; Bersih: <code>"amanaplanacanalpanama"</code> &rarr; Return: <code>true</code>',
                    '<code>"Belajar Coding Baprade"</code> &rarr; Return: <code>false</code>'
                ],
                'rules_en' => [
                    '<code>"Kasur ini rusak"</code> -> Sanitized: <code>"kasurinirusak"</code> -> Return: <code>true</code>',
                    '<code>"Belajar Coding Baprade"</code> -> Return: <code>false</code>'
                ],
                'starter_code' => "<?php\n\nfunction isPalindrome(string \$text): bool {\n    // Tulis kode kamu di sini\n    \$clean = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', \$text));\n    return \$clean === strrev(\$clean);\n}",
                'hints_id' => [
                    'Clue 1: Hapus spasi & simbol: `preg_replace(\'/[^a-zA-Z0-9]/\', \'\', $text)`.',
                    'Clue 2: Lowercase dengan `strtolower(...)`.',
                    'Clue 3: Balik string dengan `strrev($clean)`.',
                    'Clue 4: Bandingkan `$clean === strrev($clean)`.'
                ],
                'hints_en' => [
                    'Clue 1: Strip symbols: `preg_replace(\'/[^a-zA-Z0-9]/\', \'\', $text)`.',
                    'Clue 2: Lowercase with `strtolower()`.',
                    'Clue 3: Reverse with `strrev()`.',
                    'Clue 4: Compare `$clean === strrev($clean)`.'
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
