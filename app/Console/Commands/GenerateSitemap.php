<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SitemapController;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate {--base-url= : Custom base URL (e.g. https://tcsmarttechnology.com)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the public/sitemap.xml file for search engines and SEO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting sitemap generation...');

        $customBaseUrl = $this->option('base-url') ?: config('app.url', 'https://tcsmarttechnology.com');
        $customBaseUrl = rtrim(preg_replace('/\/public$/', '', $customBaseUrl), '/');

        $controller = new SitemapController();
        $urls = $controller->collectAllUrls($customBaseUrl);

        $xml = view('sitemap.index', compact('urls'))->render();

        $destination = public_path('sitemap.xml');
        $bytes = file_put_contents($destination, $xml);

        if ($bytes === false) {
            $this->error("Failed to write sitemap to {$destination}");
            return Command::FAILURE;
        }

        $this->info("Sitemap generated successfully!");
        $this->line("File location: <comment>{$destination}</comment>");
        $this->line("Total URLs indexed: <comment>" . count($urls) . "</comment>");
        $this->line("Base URL: <comment>{$customBaseUrl}</comment>");
        $this->line("File size: <comment>" . number_format($bytes / 1024, 2) . " KB</comment>");

        return Command::SUCCESS;
    }
}
