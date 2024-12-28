<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class CreateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To create/generate XML sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $generator = SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function (Url $url) {
                if ($url->path() === '/') {
                    $url->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY);
                } elseif (str_starts_with($url->path(), '/products')) {
                    $url->setPriority(0.8)->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY);
                } else {
                    $url->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY);
                }

                if (str_contains($url->path(), 'admin')) {
                    return null;
                }

                return $url;
            });

        $generator->writeToFile(public_path("sitemap.xml"));
    }
}
