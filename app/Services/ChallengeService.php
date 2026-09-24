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
                'id' => 100,
                'slug' => 'sql-select-all-customers',
                'language' => 'sql',
                'title_id' => 'SQL 00. Ambil Semua Data Pelanggan (SELECT *)',
                'title_en' => 'SQL 00. Select All Customers (SELECT *)',
                'category' => 'SQL Basics & Querying',
                'difficulty' => 'Easy',
                'points' => 10,
                'summary_id' => 'Pelajari query SQL paling mendasar: mengambil seluruh data dan kolom dari sebuah tabel.',
                'summary_en' => 'Learn the most fundamental SQL query: select all records and columns from a table.',
                'example_title_id' => 'Contoh Logika Serupa: Mengambil Semua Baris Produk',
                'example_title_en' => 'Similar Pattern Example: Select All Items',
                'example_explanation_id' => 'Untuk mengambil seluruh kolom dari suatu tabel, kita menggunakan simbol bintang (<code>*</code>) setelah kata kunci <code>SELECT</code>.',
                'example_explanation_en' => 'To retrieve all columns, use the asterisk wildcard (<code>*</code>) after <code>SELECT</code>.',
                'example_code' => "-- Contoh mengambil semua data dari tabel 'categories'\nSELECT * FROM categories;",
                'steps_id' => [
                    'Gunakan klausa <code>SELECT *</code> untuk mengambil semua kolom.',
                    'Arahkan sumber tabel dengan klausa <code>FROM customers</code>.',
                    'Akhiri query SQL kamu dengan titik koma (<code>;</code>).'
                ],
                'steps_en' => [
                    'Use <code>SELECT *</code> to retrieve all columns.',
                    'Specify the table via <code>FROM customers</code>.',
                    'End statement with semicolon (<code>;</code>).'
                ],
                'rules_id' => [
                    'Tabel sumber: <code>customers</code> (kolom: <code>id</code>, <code>name</code>, <code>city</code>)',
                    'Tampilkan seluruh 3 baris data yang ada di tabel.'
                ],
                'rules_en' => [
                    'Source table: <code>customers</code>',
                    'Display all records without filtering.'
                ],
                'schema_setup' => "CREATE TABLE customers (id INT PRIMARY KEY, name VARCHAR(100), city VARCHAR(50));\nINSERT INTO customers VALUES (1, 'Bagas Praditya', 'Jakarta'), (2, 'Dewi Sartika', 'Bandung'), (3, 'Rian Hidayat', 'Surabaya');",
                'starter_code' => "-- Tulis query SQL kamu di sini\nSELECT ...",
                'hints_id' => [
                    'Clue 1: Sintaks dasar: `SELECT * FROM nama_tabel;`',
                    'Clue 2: Tabel yang diminta adalah `customers`.'
                ],
                'hints_en' => [
                    'Clue 1: Basic syntax: `SELECT * FROM table_name;`',
                    'Clue 2: Target table is `customers`.'
                ],
                'solution_code' => "SELECT * FROM customers;",
                'test_cases' => [
                    [
                        'input' => ['SELECT * FROM customers'],
                        'expected' => [
                            ['id' => 1, 'name' => 'Bagas Praditya', 'city' => 'Jakarta'],
                            ['id' => 2, 'name' => 'Dewi Sartika', 'city' => 'Bandung'],
                            ['id' => 3, 'name' => 'Rian Hidayat', 'city' => 'Surabaya'],
                        ]
                    ]
                ],
            ],
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
                'example_title_id' => 'Contoh Logika Serupa: Filter Pegawai Tetap',
                'example_title_en' => 'Similar Pattern Example: Filter Permanent Staff',
                'example_explanation_id' => 'Jika kita ingin mengambil kolom <code>id</code>, <code>title</code> dari tabel <code>books</code> yang berstatus <code>available</code> terurut abjad:',
                'example_explanation_en' => 'Selecting specific columns with status filtering and sorting:',
                'example_code' => "-- Contoh memilih kolom spesifik, filter WHERE, & urutan ASC\nSELECT id, title, price \nFROM books \nWHERE status = 'available' \nORDER BY title ASC;",
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
                'starter_code' => "-- Tulis query SQL kamu di sini\nSELECT id, name, email, city \nFROM users \nWHERE ...",
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
                'example_title_id' => 'Contoh Logika Serupa: Agregasi Nilai Transaksi per Cabang',
                'example_title_en' => 'Similar Pattern Example: Aggregating Branch Sales',
                'example_explanation_id' => 'Mengelompokkan data per wilayah, menjumlahkan nilai total, menghitung jumlah invoice, dan memfilter total dengan <code>HAVING</code>:',
                'example_explanation_en' => 'Grouping records by region with sum calculation and HAVING filter:',
                'example_code' => "-- Contoh GROUP BY dengan SUM, COUNT, dan filter HAVING\nSELECT branch_city, \n       SUM(total_amount) AS branch_revenue,\n       COUNT(*) AS total_invoices\nFROM sales\nGROUP BY branch_city\nHAVING SUM(total_amount) > 1000000\nORDER BY branch_revenue DESC;",
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
                'starter_code' => "-- Tulis query SQL agregasi kamu di sini\nSELECT category, \n       SUM(price * stock) AS total_revenue,\n       COUNT(*) AS total_products\nFROM products\nGROUP BY ...",
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
                'example_title_id' => 'Contoh Logika Serupa: Relasi Mahasiswa & Jurusan',
                'example_title_en' => 'Similar Pattern Example: Student & Department Join',
                'example_explanation_id' => 'Menghubungkan dua tabel dengan foreign key, memilih kolom dari kedua tabel, dan mengurutkan hasilnya:',
                'example_explanation_en' => 'Joining two tables on foreign keys with column selection and ordering:',
                'example_code' => "-- Contoh menggabungkan tabel students (s) dan departments (d)\nSELECT s.nim, s.student_name, d.department_name, s.gpa\nFROM students s\nINNER JOIN departments d ON s.department_id = d.id\nWHERE s.status = 'ACTIVE'\nORDER BY s.gpa DESC;",
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
                'starter_code' => "-- Tulis query INNER JOIN kamu di sini\nSELECT o.order_number, c.customer_name, o.amount, o.status\nFROM orders o\nINNER JOIN customers c ON ...",
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
                'id' => 0,
                'slug' => 'php-basic-sum-two-numbers',
                'language' => 'php',
                'title_id' => 'PHP 00. Penjumlahan Dua Angka (Dasar Operator +)',
                'title_en' => 'PHP 00. Addition of Two Numbers (Basic + Operator)',
                'category' => 'PHP Basics',
                'difficulty' => 'Easy',
                'points' => 10,
                'summary_id' => 'Pelajari fungsi paling dasar: menerima 2 input angka dan menjumlahkannya.',
                'summary_en' => 'Learn the most basic function: take two numbers and return their sum.',
                'example_title_id' => 'Contoh Logika Serupa: Menghitung Selisih Dua Angka',
                'example_title_en' => 'Similar Pattern Example: Calculating Difference',
                'example_explanation_id' => 'Fungsi berikut menerima 2 parameter dan mengembalikan hasil pengurangan:',
                'example_explanation_en' => 'The following function takes two parameters and returns subtraction:',
                'example_code' => "<?php\n\nfunction calculateDifference(int \$x, int \$y): int {\n    // Mengurangkan x dengan y\n    return \$x - \$y;\n}",
                'steps_id' => [
                    'Terima parameter <code>int $a</code> dan <code>int $b</code>.',
                    'Gunakan operator penjumlahan <code>+</code> untuk menghitung total <code>$a + $b</code>.',
                    'Kembalikan (return) hasil penjumlahan integer tersebut.'
                ],
                'steps_en' => [
                    'Accept parameters <code>int $a</code> and <code>int $b</code>.',
                    'Use addition operator <code>+</code> to compute <code>$a + $b</code>.',
                    'Return the integer sum.'
                ],
                'rules_id' => [
                    'Input: <code>(5, 7)</code> &rarr; Return: <code>12</code>',
                    'Input: <code>(10, -3)</code> &rarr; Return: <code>7</code>'
                ],
                'rules_en' => [
                    'Input: <code>(5, 7)</code> -> Return: <code>12</code>',
                    'Input: <code>(10, -3)</code> -> Return: <code>7</code>'
                ],
                'starter_code' => "<?php\n\nfunction sumNumbers(int \$a, int \$b): int {\n    // Tulis kode kamu di sini\n    return 0;\n}",
                'hints_id' => [
                    'Clue 1: Gunakan tanda tambah `+` untuk menjumlahkan variabel `$a` dan `$b`.',
                    'Clue 2: Satu baris sederhana: `return $a + $b;`'
                ],
                'hints_en' => [
                    'Clue 1: Use `+` operator on `$a` and `$b`.',
                    'Clue 2: Simple one-liner: `return $a + $b;`'
                ],
                'solution_code' => "<?php\n\nfunction sumNumbers(int \$a, int \$b): int {\n    return \$a + \$b;\n}",
                'test_cases' => [
                    ['input' => [5, 7], 'expected' => 12],
                    ['input' => [10, -3], 'expected' => 7],
                    ['input' => [0, 0], 'expected' => 0],
                ],
            ],
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
                'example_title_id' => 'Contoh Logika Serupa: Format Tag Selamat Datang Toko',
                'example_title_en' => 'Similar Pattern Example: Welcome Store Formatter',
                'example_explanation_id' => 'Contoh penggabungan string nama toko dan kota menggunakan operator titik (<code>.</code>):',
                'example_explanation_en' => 'String concatenation using dot (<code>.</code>) operator:',
                'example_code' => "<?php\n\nfunction formatStoreWelcome(string \$storeName, string \$city): string {\n    // Menggabungkan string dengan operator titik\n    return \"Selamat datang di \" . \$storeName . \", Cabang \" . \$city . \".\";\n}",
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
                'starter_code' => "<?php\n\nfunction formatGreeting(\$name) {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
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
                'example_title_id' => 'Contoh Logika Serupa: Jumlahkan Angka Ganjil',
                'example_title_en' => 'Similar Pattern Example: Sum of Odd Numbers',
                'example_explanation_id' => 'Memfilter angka dengan kondisi sisa bagi modulo (<code>% 2 !== 0</code>) dan menjumlahkannya:',
                'example_explanation_en' => 'Filtering odd numbers via modulo and computing sum:',
                'example_code' => "<?php\n\nfunction sumOddNumbers(array \$numbers): int {\n    \$odds = array_filter(\$numbers, fn(\$n) => \$n % 2 !== 0);\n    return array_sum(\$odds);\n}",
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
                'starter_code' => "<?php\n\nfunction sumEvenNumbers(array \$numbers): int {\n    // Tulis kode kamu di sini\n    return 0;\n}",
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
                'example_title_id' => 'Contoh Logika Serupa: Sanitisasi Username Kode',
                'example_title_en' => 'Similar Pattern Example: Username Sanitizer',
                'example_explanation_id' => 'Mengubah huruf kecil, menghapus karakter selain huruf dan angka dengan regex:',
                'example_explanation_en' => 'Lowercasing and stripping illegal characters via regex:',
                'example_code' => "<?php\n\nfunction sanitizeUsername(string \$input): string {\n    \$clean = strtolower(\$input);\n    // Menghapus semua karakter selain a-z dan 0-9\n    return preg_replace('/[^a-z0-9]/', '', \$clean);\n}",
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
                'starter_code' => "<?php\n\nfunction generateSlug(string \$title): string {\n    // Tulis kode kamu di sini\n    return \"\";\n}",
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
                'example_title_id' => 'Contoh Logika Serupa: Kalkulasi Pajak Kendaraan',
                'example_title_en' => 'Similar Pattern Example: Tiered Vehicle Tax Calculation',
                'example_explanation_id' => 'Menggunakan ekspresi <code>match</code> untuk tarif persentase dan menambahkan biaya administrasi kondisional:',
                'example_explanation_en' => 'Using match expressions for rates and conditional extra fees:',
                'example_code' => "<?php\n\nfunction calculateTax(float \$basePrice, string \$type): float {\n    \$rate = match(strtoupper(\$type)) {\n        'ELECTRIC' => 0.02,\n        'HYBRID'   => 0.05,\n        default    => 0.10,\n    };\n    \$tax = \$basePrice * \$rate;\n    if (\$basePrice > 100000000) {\n        \$tax += 500000; // Biaya admin barang mewah\n    }\n    return \$tax;\n}",
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
                'starter_code' => "<?php\n\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    // Tulis kode kamu di sini\n    return 0.0;\n}",
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
                'example_title_id' => 'Contoh Logika Serupa: Cek Kesamaan Kata Terbalik',
                'example_title_en' => 'Similar Pattern Example: Reverse Word Equality',
                'example_explanation_id' => 'Fungsi pembanding teks sederhana menggunakan <code>strrev</code>:',
                'example_explanation_en' => 'Basic string reverse comparison using strrev:',
                'example_code' => "<?php\n\nfunction isSimpleMirror(string \$word): bool {\n    // Membalik kata dan membandingkan secara langsung\n    return strtolower(\$word) === strrev(strtolower(\$word));\n}",
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
                'starter_code' => "<?php\n\nfunction isPalindrome(string \$text): bool {\n    // Tulis kode kamu di sini\n    return false;\n}",
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

            // ==========================================
            // PYTHON TRACK MODULES
            // ==========================================
            [
                'id' => 200,
                'slug' => 'python-multiply-two-numbers',
                'language' => 'python',
                'title_id' => 'Python 00. Perkalian Dua Angka (Dasar Operator *)',
                'title_en' => 'Python 00. Multiply Two Numbers (Basic * Operator)',
                'category' => 'Python Basics',
                'difficulty' => 'Easy',
                'points' => 10,
                'summary_id' => 'Pelajari fungsi paling dasar di Python: menerima 2 input angka dan mengembalikan hasil perkaliannya.',
                'summary_en' => 'Learn the most fundamental Python function: accept two numbers and return their product.',
                'example_title_id' => 'Contoh Logika Serupa: Penjumlahan Dua Angka di Python',
                'example_title_en' => 'Similar Pattern Example: Adding Two Numbers in Python',
                'example_explanation_id' => 'Fungsi Python menerima argumen dan mengembalikan nilai dengan kata kunci <code>return</code>:',
                'example_explanation_en' => 'A basic Python function returning sum of two arguments:',
                'example_code' => "def add_numbers(x: int, y: int) -> int:\n    # Menjumlahkan dua angka\n    return x + y",
                'steps_id' => [
                    'Deklarasikan fungsi <code>def multiply_two_numbers(a: int, b: int) -> int:</code>.',
                    'Gunakan operator perkalian bintang (<code>*</code>) untuk mengalikan <code>a * b</code>.',
                    'Kembalikan (return) hasil perkalian integer tersebut.'
                ],
                'steps_en' => [
                    'Define function <code>def multiply_two_numbers(a: int, b: int) -> int:</code>.',
                    'Use asterisk <code>*</code> operator to multiply <code>a * b</code>.',
                    'Return the integer result.'
                ],
                'rules_id' => [
                    'Input: <code>(4, 5)</code> &rarr; Return: <code>20</code>',
                    'Input: <code>(7, 0)</code> &rarr; Return: <code>0</code>',
                    'Input: <code>(-3, 6)</code> &rarr; Return: <code>-18</code>'
                ],
                'rules_en' => [
                    'Input: <code>(4, 5)</code> -> Return: <code>20</code>',
                    'Input: <code>(7, 0)</code> -> Return: <code>0</code>'
                ],
                'starter_code' => "def multiply_two_numbers(a: int, b: int) -> int:\n    # Tulis kode Python kamu di sini\n    return 0",
                'hints_id' => [
                    'Clue 1: Gunakan simbol bintang `*` untuk perkalian matematika.',
                    'Clue 2: Tulis langsung: `return a * b`'
                ],
                'hints_en' => [
                    'Clue 1: Use `*` operator for multiplication.',
                    'Clue 2: Write: `return a * b`'
                ],
                'solution_code' => "def multiply_two_numbers(a: int, b: int) -> int:\n    return a * b",
                'test_cases' => [
                    ['input' => [4, 5], 'expected' => 20],
                    ['input' => [7, 0], 'expected' => 0],
                    ['input' => [-3, 6], 'expected' => -18],
                ],
            ],
            [
                'id' => 201,
                'slug' => 'python-count-vowels-in-string',
                'language' => 'python',
                'title_id' => 'Python 01. Hitung Huruf Vokal dalam Kalimat',
                'title_en' => 'Python 01. Count Vowels in a String',
                'category' => 'Python Basics & Strings',
                'difficulty' => 'Easy',
                'points' => 15,
                'summary_id' => 'Hitung jumlah total huruf vokal (a, e, i, o, u) dari sebuah teks tanpa membedakan huruf besar/kecil.',
                'summary_en' => 'Count total occurrences of vowels (a, e, i, o, u) in a string case-insensitively.',
                'example_title_id' => 'Contoh Logika Serupa: Menghitung Karakter Angka dalam String',
                'example_title_en' => 'Similar Pattern Example: Count Digits in String',
                'example_explanation_id' => 'Menggunakan looping atau list comprehension untuk menyaring karakter tertentu:',
                'example_explanation_en' => 'Filtering characters using Python list comprehension & generator expressions:',
                'example_code' => "def count_digits(text: str) -> int:\n    # Menghitung karakter angka (0-9)\n    return sum(1 for char in text if char.isdigit())",
                'steps_id' => [
                    'Deklarasikan fungsi <code>def count_vowels(text: str) -> int:</code>.',
                    'Ubah seluruh teks menjadi huruf kecil dengan method <code>text.lower()</code>.',
                    'Periksa setiap karakter dan hitung hanya yang termasuk huruf vokal (<code>a, e, i, o, u</code>).',
                    'Kembalikan jumlah total kemunculan huruf vokal berupa integer (<code>int</code>).'
                ],
                'steps_en' => [
                    'Define function <code>def count_vowels(text: str) -> int:</code>.',
                    'Convert string to lowercase using <code>text.lower()</code>.',
                    'Iterate through characters and count vowels: <code>a, e, i, o, u</code>.',
                    'Return total count as an integer.'
                ],
                'rules_id' => [
                    'Input: <code>"Bagas Praditya"</code> &rarr; Vokal: a, a, a, i, a &rarr; Return: <code>5</code>',
                    'Input: <code>"Python Programming"</code> &rarr; Vokal: o, o, a, i &rarr; Return: <code>4</code>',
                    'Input: <code>"rhythm"</code> &rarr; Vokal: 0 &rarr; Return: <code>0</code>'
                ],
                'rules_en' => [
                    'Input: <code>"Bagas Praditya"</code> -> Return: <code>5</code>',
                    'Input: <code>"Python Programming"</code> -> Return: <code>4</code>',
                    'Input: <code>"rhythm"</code> -> Return: <code>0</code>'
                ],
                'starter_code' => "def count_vowels(text: str) -> int:\n    # Tulis kode Python kamu di sini\n    return 0",
                'hints_id' => [
                    'Clue 1: Gunakan `text.lower()` untuk mengabaikan perbedaan huruf kapital.',
                    'Clue 2: Manfaatkan list comprehension Python yang elegan: `sum(1 for c in text.lower() if c in "aeiou")`.'
                ],
                'hints_en' => [
                    'Clue 1: Use `text.lower()` for case-insensitivity.',
                    'Clue 2: Use list comprehension: `sum(1 for c in text.lower() if c in "aeiou")`.'
                ],
                'solution_code' => "def count_vowels(text: str) -> int:\n    vowels = set('aeiou')\n    return sum(1 for char in text.lower() if char in vowels)",
                'test_cases' => [
                    ['input' => ['Bagas Praditya'], 'expected' => 5],
                    ['input' => ['Python Programming'], 'expected' => 4],
                    ['input' => ['rhythm'], 'expected' => 0],
                ],
            ],
            [
                'id' => 202,
                'slug' => 'python-filter-positive-even-numbers',
                'language' => 'python',
                'title_id' => 'Python 02. Filter Bilangan Genap Positif',
                'title_en' => 'Python 02. Filter Positive Even Numbers',
                'category' => 'Python Lists & Comprehensions',
                'difficulty' => 'Easy',
                'points' => 15,
                'summary_id' => 'Saring daftar angka dan ambil hanya angka genap yang bernilai positif (> 0).',
                'summary_en' => 'Filter a list of numbers and extract only positive even integers (> 0).',
                'example_title_id' => 'Contoh Logika Serupa: Saring Angka Ganjil Negatif',
                'example_title_en' => 'Similar Pattern Example: Filter Negative Odd Numbers',
                'example_explanation_id' => 'Memfilter list dengan list comprehension berkondisi ganda:',
                'example_explanation_en' => 'Filtering elements with compound boolean condition in list comprehension:',
                'example_code' => "def filter_negative_odds(numbers: list) -> list:\n    # Mengambil angka negatif (< 0) yang ganjil\n    return [n for n in numbers if n < 0 and n % 2 != 0]",
                'steps_id' => [
                    'Deklarasikan fungsi <code>def filter_positive_evens(numbers: list) -> list:</code>.',
                    'Periksa setiap angka <code>n</code> dalam list dengan 2 syarat: <code>n > 0</code> dan <code>n % 2 == 0</code>.',
                    'Susun angka yang lolos seleksi ke dalam list baru.',
                    'Kembalikan list hasil filter.'
                ],
                'steps_en' => [
                    'Define function <code>def filter_positive_evens(numbers: list) -> list:</code>.',
                    'Check conditions for each element: <code>n > 0</code> and <code>n % 2 == 0</code>.',
                    'Collect matching elements into a list.',
                    'Return the filtered list.'
                ],
                'rules_id' => [
                    'Input: <code>[-4, -2, 0, 1, 2, 3, 4, 6]</code> &rarr; Lolos: <code>[2, 4, 6]</code>',
                    'Input: <code>[-1, -3, 0]</code> &rarr; Lolos: <code>[]</code>'
                ],
                'rules_en' => [
                    'Input: <code>[-4, -2, 0, 1, 2, 3, 4, 6]</code> -> Output: <code>[2, 4, 6]</code>',
                    'Input: <code>[-1, -3, 0]</code> -> Output: <code>[]</code>'
                ],
                'starter_code' => "def filter_positive_evens(numbers: list) -> list:\n    # Tulis kode Python kamu di sini\n    return []",
                'hints_id' => [
                    'Clue 1: Gunakan modulo `n % 2 == 0` dan perbandingan `n > 0`.',
                    'Clue 2: Solusi 1-baris Pythonic: `return [n for n in numbers if n > 0 and n % 2 == 0]`'
                ],
                'hints_en' => [
                    'Clue 1: Use modulo `n % 2 == 0` and `n > 0`.',
                    'Clue 2: Pythonic one-liner: `return [n for n in numbers if n > 0 and n % 2 == 0]`'
                ],
                'solution_code' => "def filter_positive_evens(numbers: list) -> list:\n    return [n for n in numbers if n > 0 and n % 2 == 0]",
                'test_cases' => [
                    ['input' => [[-4, -2, 0, 1, 2, 3, 4, 6]], 'expected' => [2, 4, 6]],
                    ['input' => [[10, 15, 20, 25, -8]], 'expected' => [10, 20]],
                    ['input' => [[-1, -3, 0]], 'expected' => []],
                ],
            ],
            [
                'id' => 203,
                'slug' => 'python-format-user-badge',
                'language' => 'python',
                'title_id' => 'Python 03. Format User Badge & f-String',
                'title_en' => 'Python 03. Format User Badge & f-String',
                'category' => 'Python Basics & Strings',
                'difficulty' => 'Easy',
                'points' => 10,
                'summary_id' => 'Format label badge user dengan role huruf kapital dan username yang bersih.',
                'summary_en' => 'Format user badge string with uppercase role and sanitized username.',
                'example_title_id' => 'Contoh Logika Serupa: Format Header Invoice Toko',
                'example_title_en' => 'Similar Pattern Example: Store Invoice Header Formatter',
                'example_explanation_id' => 'Menggunakan f-string untuk menggabungkan kode invoice uppercase dan nama cabang yang sudah dibersihkan spasi:',
                'example_explanation_en' => 'Using Python f-strings with uppercase and string trimming methods:',
                'example_code' => "def format_invoice_header(code: str, city: str) -> str:\n    # Format: \"INV-[JAKARTA] #001\"\n    return f\"INV-[{city.strip().upper()}] #{code.strip()}\"",
                'steps_id' => [
                    'Deklarasikan fungsi <code>def format_user_badge(username: str, role: str) -> str:</code>.',
                    'Ubah string <code>role</code> menjadi huruf kapital penuh (UPPERCASE) dengan <code>role.upper()</code>.',
                    'Hapus spasi liar di awal dan akhir <code>username</code> menggunakan <code>username.strip()</code>.',
                    'Gabungkan dengan format: <code>"[{ROLE}] {USERNAME}"</code> (misal: <code>"[ADMIN] Bagas"</code>).',
                    'Kembalikan string hasil format.'
                ],
                'steps_en' => [
                    'Define function <code>def format_user_badge(username: str, role: str) -> str:</code>.',
                    'Convert <code>role</code> to uppercase using <code>role.upper()</code>.',
                    'Trim leading/trailing whitespace with <code>username.strip()</code>.',
                    'Format template as <code>"[{ROLE}] {USERNAME}"</code>.',
                    'Return the resulting string.'
                ],
                'rules_id' => [
                    'Input: <code>("  Bagas  ", "admin")</code> &rarr; Output: <code>"[ADMIN] Bagas"</code>',
                    'Input: <code>("Baprade", "member")</code> &rarr; Output: <code>"[MEMBER] Baprade"</code>'
                ],
                'rules_en' => [
                    'Input: <code>("  Bagas  ", "admin")</code> -> Output: <code>"[ADMIN] Bagas"</code>',
                    'Input: <code>("Baprade", "member")</code> -> Output: <code>"[MEMBER] Baprade"</code>'
                ],
                'starter_code' => "def format_user_badge(username: str, role: str) -> str:\n    # Tulis kode Python kamu di sini\n    return \"\"",
                'hints_id' => [
                    'Clue 1: Gunakan f-string modern Python: `f"[{role.upper()}] {username.strip()}"`.',
                    'Clue 2: Pastikan ada spasi setelah kurung siku penutup `]`.'
                ],
                'hints_en' => [
                    'Clue 1: Use Python f-string: `f"[{role.upper()}] {username.strip()}"`.',
                    'Clue 2: Keep exact spacing after `]`.'
                ],
                'solution_code' => "def format_user_badge(username: str, role: str) -> str:\n    return f\"[{role.upper()}] {username.strip()}\"",
                'test_cases' => [
                    ['input' => ['  Bagas  ', 'admin'], 'expected' => '[ADMIN] Bagas'],
                    ['input' => ['Baprade', 'member'], 'expected' => '[MEMBER] Baprade'],
                    ['input' => ['Developer', 'guest'], 'expected' => '[GUEST] Developer'],
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
