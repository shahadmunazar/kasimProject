<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SitemapTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_xml_endpoint_returns_valid_xml()
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $this->assertStringContainsString('application/xml', $response->headers->get('Content-Type'));
        $content = $response->getContent();
        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $content);
        $this->assertStringContainsString('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">', $content);
        $this->assertStringContainsString('<loc>', $content);
        $this->assertStringContainsString('/services', $content);
        $this->assertStringContainsString('/products', $content);
    }

    public function test_artisan_sitemap_generate_command_creates_file()
    {
        $exitCode = Artisan::call('sitemap:generate', [
            '--base-url' => 'https://tcsmarttechnology.com'
        ]);
        $this->assertEquals(0, $exitCode);

        $path = public_path('sitemap.xml');
        $this->assertFileExists($path);
        $fileContent = file_get_contents($path);
        $this->assertStringContainsString('<urlset', $fileContent);
        $this->assertStringContainsString('https://tcsmarttechnology.com', $fileContent);
    }

    public function test_html_sitemap_page_renders_and_links_to_xml()
    {
        $response = $this->get('/sitemap');

        $response->assertStatus(200);
        $response->assertSee('sitemap.xml');
        $response->assertSee('Website Structure');
    }
}


