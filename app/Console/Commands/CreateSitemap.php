<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
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
        $sitemap = Sitemap::create();

        // Homepage
        $sitemap->add(
            Url::create(route('dashboard.index'))
                ->setLastModificationDate(now())
                ->setPriority(1.0)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        // Products Index Page
        $sitemap->add(
            Url::create(route('products.index'))
                ->setLastModificationDate(now())
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        );

        // All Products
        Product::all()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(
                Url::create(route('products.show', $product))
                    ->setLastModificationDate($product->updated_at)
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        // All Pages (About, Privacy, etc.)
        Page::all()->each(function (Page $page) use ($sitemap) {
            $sitemap->add(
                Url::create(route('pages.show', $page))
                    ->setLastModificationDate($page->updated_at)
                    ->setPriority(0.6)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });

        // Write to file
        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully!');
        $this->info('Location: ' . public_path('sitemap.xml'));
        $this->info('Total URLs: ' . (1 + 1 + Product::count() + Page::count()));
    }
}
