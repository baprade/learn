<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LearnTest extends TestCase
{
    use RefreshDatabase;

    public function test_learn_home_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Learn Baprade');
        $response->assertSee('Course');
    }

    public function test_challenge_workspace_loads(): void
    {
        $response = $this->get('/challenge/hello-world-string-concatenation');

        $response->assertStatus(200);
        $response->assertSee('formatGreeting');
        $response->assertSee('LearningResource');
    }

    public function test_php_code_evaluator_passes_correct_solution(): void
    {
        $user = User::factory()->create();
        $validCode = "<?php\nfunction formatGreeting(\$name) {\n    return \"Halo, \" . \$name . \"! Selamat belajar coding.\";\n}";

        $response = $this->actingAs($user)->postJson('/challenge/hello-world-string-concatenation/run', [
            'code' => $validCode,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'all_passed',
            'passed_count' => 3,
            'total_count' => 3,
        ]);
    }

    public function test_php_float_evaluator_passes_numeric_normalization(): void
    {
        $user = User::factory()->create();
        $validCode = "<?php\nfunction calculateFinalPrice(float \$subtotal, string \$membership): float {\n    \$rate = match(strtoupper(\$membership)) {\n        'PREMIUM' => 0.20,\n        'MEMBER' => 0.10,\n        default => 0.0,\n    };\n    \$discounted = \$subtotal - (\$subtotal * \$rate);\n    if (\$discounted >= 500000) {\n        \$discounted -= 25000;\n    }\n    return \$discounted;\n}";

        $response = $this->actingAs($user)->postJson('/challenge/solid-single-responsibility-calculator/run', [
            'code' => $validCode,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'all_passed',
            'passed_count' => 3,
            'total_count' => 3,
        ]);
    }

    public function test_sql_evaluator_passes_correct_query(): void
    {
        $user = User::factory()->create();
        $validSql = "SELECT id, name, email, city FROM users WHERE status = 'active' ORDER BY name ASC;";

        $response = $this->actingAs($user)->postJson('/challenge/sql-select-active-users/run', [
            'code' => $validSql,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'all_passed',
            'passed_count' => 1,
            'total_count' => 1,
        ]);
    }

    public function test_python_evaluator_passes_correct_solution(): void
    {
        $user = User::factory()->create();
        $validPython = "def count_vowels(text: str) -> int:\n    return sum(1 for c in text.lower() if c in 'aeiou')";

        $response = $this->actingAs($user)->postJson('/challenge/python-count-vowels-in-string/run', [
            'code' => $validPython,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'all_passed',
            'passed_count' => 3,
            'total_count' => 3,
        ]);
    }

    public function test_code_evaluator_blocks_malicious_security_keywords(): void
    {
        $user = User::factory()->create();
        $maliciousCode = "<?php\nfunction formatGreeting(\$name) {\n    system('whoami');\n    return \$name;\n}";

        $response = $this->actingAs($user)->postJson('/challenge/hello-world-string-concatenation/run', [
            'code' => $maliciousCode,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'security_blocked',
            'passed_count' => 0,
        ]);
    }

    public function test_unauthenticated_user_receives_401_guard(): void
    {
        $response = $this->postJson('/challenge/hello-world-string-concatenation/run', [
            'code' => '<?php echo "test";',
        ]);

        $response->assertStatus(401);
        $response->assertJson([
            'status' => 'unauthenticated',
        ]);
    }

    public function test_sitemap_xml_returns_valid_content(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('urlset');
        $response->assertSee('sql-select-active-users');
    }

    public function test_robots_txt_returns_valid_content(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertSee('User-agent: *');
        $response->assertSee('Sitemap:');
    }
}
