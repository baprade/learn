<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LearnTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test learning platform home page returns 200 and displays challenge list and JSON-LD schema.
     */
    public function test_learn_home_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Learn Baprade');
        $response->assertSee('Code Sandbox for Beginners');
        $response->assertSee('Course'); // JSON-LD Schema assertion
    }

    /**
     * Test challenge workspace page loads correctly for guest preview.
     */
    public function test_challenge_workspace_loads(): void
    {
        $response = $this->get('/challenge/hello-world-string-concatenation');

        $response->assertStatus(200);
        $response->assertSee('01. Formatting Greeting & Concatenation');
        $response->assertSee('formatGreeting');
        $response->assertSee('LearningResource'); // JSON-LD LearningResource schema
    }

    /**
     * Test code evaluation engine with authenticated user and valid solution.
     */
    public function test_code_evaluator_passes_correct_solution(): void
    {
        $user = User::factory()->create();
        $validCode = "<?php\nfunction formatGreeting(\$name) {\n    return \"Halo, {\$name}! Selamat belajar PHP.\";\n}";

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

    /**
     * Test code evaluation engine blocks dangerous system functions for authenticated user.
     */
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

    /**
     * Test unauthenticated user receives 401 unauthenticated response when trying to evaluate code.
     */
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

    /**
     * Test sitemap XML generation.
     */
    public function test_sitemap_xml_returns_valid_content(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('urlset');
        $response->assertSee('hello-world-string-concatenation');
    }

    /**
     * Test robots.txt generation.
     */
    public function test_robots_txt_returns_valid_content(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertStatus(200);
        $response->assertSee('User-agent: *');
        $response->assertSee('Sitemap:');
    }
}
