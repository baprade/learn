<?php

/**
 * Built by Bagas (Baprade)
 * Day 2: Security Hardened Code & SQL Evaluation Engine - 2026
 */

namespace App\Services;

use PDO;

class CodeEvaluatorService
{
    /**
     * Dangerous PHP functions & keywords blacklist for RCE prevention.
     */
    protected array $blacklistedKeywords = [
        'exec', 'system', 'shell_exec', 'passthru', 'proc_open', 'popen',
        'file_put_contents', 'unlink', 'rmdir', 'mkdir', 'chmod', 'chown',
        'eval', 'include', 'require', 'include_once', 'require_once',
        'curl_exec', 'curl_multi_exec', 'parse_ini_file', 'show_source',
        'symlink', 'putenv', 'dl', 'pcntl_exec', 'proc_close', 'proc_get_status',
        '$_ENV', '$_SERVER', '$_COOKIE', '$_SESSION', '$_POST', '$_GET', '$_FILES', '$_REQUEST',
        'header', 'setcookie', 'exit', 'die', 'readfile', 'file_get_contents', 'fopen'
    ];

    /**
     * Evaluate challenge (handles either SQL or PHP dynamically).
     *
     * @param string $userCode
     * @param array $challenge
     * @return array
     */
    public function evaluateChallenge(string $userCode, array $challenge): array
    {
        $lang = $challenge['language'] ?? 'php';

        if ($lang === 'sql') {
            return $this->evaluateSql($userCode, $challenge);
        }

        return $this->evaluatePhp($userCode, $challenge['test_cases']);
    }

    /**
     * Evaluate SQL query in an isolated in-memory SQLite sandbox.
     *
     * @param string $userQuery
     * @param array $challenge
     * @return array
     */
    public function evaluateSql(string $userQuery, array $challenge): array
    {
        $startTime = microtime(true);
        $testCases = $challenge['test_cases'];
        $schemaSetup = $challenge['schema_setup'] ?? '';

        // Security check for destructive SQL commands
        $cleanQuery = trim($userQuery);
        $upperQuery = strtoupper($cleanQuery);

        if (empty($cleanQuery)) {
            return [
                'status' => 'error',
                'message' => 'Query SQL tidak boleh kosong.',
                'passed_count' => 0,
                'total_count' => count($testCases),
                'results' => [],
                'execution_time_ms' => 0,
            ];
        }

        // Sandbox execution in SQLite Memory
        try {
            $pdo = new PDO('sqlite::memory:');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // Execute schema setup (create tables & seed dummy data)
            if (!empty($schemaSetup)) {
                $pdo->exec($schemaSetup);
            }

            // Execute user SQL query
            $stmt = $pdo->query($cleanQuery);
            $actualRows = $stmt->fetchAll();

            // Compare against expected test case
            $expectedRows = $testCases[0]['expected'] ?? [];
            
            // Normalize rows for comparison (cast numeric strings if needed)
            $isPassed = ($this->normalizeSqlRows($actualRows) === $this->normalizeSqlRows($expectedRows));

            $executionTime = round((microtime(true) - $startTime) * 1000, 2);

            $results = [
                [
                    'test_case' => 1,
                    'status' => $isPassed ? 'passed' : 'failed',
                    'input' => 'Executed Query: ' . $cleanQuery,
                    'expected' => json_encode($expectedRows, JSON_PRETTY_PRINT),
                    'actual' => json_encode($actualRows, JSON_PRETTY_PRINT),
                ]
            ];

            return [
                'status' => $isPassed ? 'all_passed' : 'partially_passed',
                'message' => $isPassed 
                    ? 'Luar biasa! Query SQL kamu valid dan mengembalikan data yang 100% tepat.' 
                    : 'Query berhasil dieksekusi, tetapi data/urutan/kolom belum sesuai dengan target soal.',
                'passed_count' => $isPassed ? 1 : 0,
                'total_count' => 1,
                'results' => $results,
                'execution_time_ms' => $executionTime,
            ];

        } catch (\Throwable $e) {
            $executionTime = round((microtime(true) - $startTime) * 1000, 2);
            return [
                'status' => 'error',
                'message' => 'SQL Syntax Error: ' . $e->getMessage(),
                'passed_count' => 0,
                'total_count' => count($testCases),
                'results' => [
                    [
                        'test_case' => 1,
                        'status' => 'error',
                        'message' => $e->getMessage(),
                        'input' => $cleanQuery,
                        'expected' => json_encode($testCases[0]['expected'] ?? []),
                        'actual' => null,
                    ]
                ],
                'execution_time_ms' => $executionTime,
            ];
        }
    }

    /**
     * Helper to normalize SQL rows for strict comparison.
     */
    protected function normalizeSqlRows(array $rows): array
    {
        return array_map(function($row) {
            $normalized = [];
            foreach ($row as $k => $v) {
                $normalized[strtolower((string)$k)] = is_numeric($v) ? (int)$v : (string)$v;
            }
            return $normalized;
        }, $rows);
    }

    /**
     * Evaluate submitted PHP code against challenge test cases securely.
     *
     * @param string $userCode
     * @param array $testCases
     * @return array
     */
    public function evaluatePhp(string $userCode, array $testCases): array
    {
        $startTime = microtime(true);

        // 1. Security Check: Keyword Blacklist
        $securityViolation = $this->checkSecurityViolation($userCode);
        if ($securityViolation) {
            return [
                'status' => 'security_blocked',
                'message' => 'Fungsi berbahaya terdeteksi: `' . $securityViolation . '`. Demi keamanan sandbox, perintah file/system diblokir.',
                'passed_count' => 0,
                'total_count' => count($testCases),
                'results' => [],
                'execution_time_ms' => 0,
            ];
        }

        // 2. Clean Code & Remove <?php tag
        $cleanCode = preg_replace('/^\s*<\?php/i', '', $userCode);

        // 3. Extract Original Function Name
        preg_match('/function\s+([a-zA-Z0-9_]+)\s*\(/i', $cleanCode, $matches);
        if (empty($matches[1])) {
            return [
                'status' => 'error',
                'message' => 'Deklarasi fungsi tidak ditemukan. Pastikan kamu tidak mengubah nama fungsi bawaan.',
                'passed_count' => 0,
                'total_count' => count($testCases),
                'results' => [],
                'execution_time_ms' => 0,
            ];
        }

        $originalFuncName = $matches[1];
        // Create unique randomized function name to prevent global redeclaration collisions
        $uniqueFuncName = $originalFuncName . '_' . substr(md5(uniqid((string)mt_rand(), true)), 0, 8);

        // Rewrite function name in user code
        $evalCode = preg_replace('/function\s+' . preg_quote($originalFuncName, '/') . '\s*\(/i', 'function ' . $uniqueFuncName . '(', $cleanCode, 1);

        // 4. Safely Evaluate Code Definition ONCE
        set_error_handler(function($errno, $errstr) {
            throw new \Exception($errstr);
        });

        try {
            eval($evalCode);
        } catch (\Throwable $e) {
            restore_error_handler();
            return [
                'status' => 'error',
                'message' => 'Syntax Error: ' . $e->getMessage(),
                'passed_count' => 0,
                'total_count' => count($testCases),
                'results' => [],
                'execution_time_ms' => 0,
            ];
        } finally {
            restore_error_handler();
        }

        // 5. Test Case Loop Execution
        $results = [];
        $passedCount = 0;

        foreach ($testCases as $index => $testCase) {
            $testNum = $index + 1;
            $inputs = $testCase['input'];
            $expected = $testCase['expected'];

            try {
                if (!function_exists($uniqueFuncName)) {
                    $results[] = [
                        'test_case' => $testNum,
                        'status' => 'error',
                        'message' => "Fungsi `{$originalFuncName}` gagal di-instansiasi.",
                        'input' => json_encode($inputs),
                        'expected' => json_encode($expected),
                        'actual' => null,
                    ];
                    continue;
                }

                $actual = call_user_func_array($uniqueFuncName, $inputs);
                $isPassed = ($actual === $expected);

                if ($isPassed) {
                    $passedCount++;
                }

                $results[] = [
                    'test_case' => $testNum,
                    'status' => $isPassed ? 'passed' : 'failed',
                    'input' => json_encode($inputs),
                    'expected' => json_encode($expected),
                    'actual' => json_encode($actual),
                ];
            } catch (\Throwable $e) {
                $results[] = [
                    'test_case' => $testNum,
                    'status' => 'error',
                    'message' => $e->getMessage(),
                    'input' => json_encode($inputs),
                    'expected' => json_encode($expected),
                    'actual' => null,
                ];
            }
        }

        $totalCount = count($testCases);
        $overallStatus = ($passedCount === $totalCount) ? 'all_passed' : 'partially_passed';
        $executionTime = round((microtime(true) - $startTime) * 1000, 2);

        return [
            'status' => $overallStatus,
            'message' => $overallStatus === 'all_passed' 
                ? 'Luar biasa! Seluruh test case berhasil dilewati dengan sempurna (100% Passed).' 
                : "Berhasil melewati {$passedCount} dari {$totalCount} test case.",
            'passed_count' => $passedCount,
            'total_count' => $totalCount,
            'results' => $results,
            'execution_time_ms' => $executionTime,
        ];
    }

    /**
     * Check if user code contains security blacklisted functions.
     *
     * @param string $code
     * @return string|null
     */
    protected function checkSecurityViolation(string $code): ?string
    {
        $codeLower = strtolower($code);
        foreach ($this->blacklistedKeywords as $keyword) {
            if (preg_match('/\b' . preg_quote($keyword, '/') . '\b/i', $codeLower)) {
                return $keyword;
            }
        }
        return null;
    }
}
