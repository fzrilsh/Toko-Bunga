<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\AlternateTag;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Page extends Model implements Sitemapable
{
    use HasSEO;

    public $timestamps = true;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'status'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('pages', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at ?? $this->created_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.1);
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->title,
            description: $this->excerpt,
            author: 'Toko Bunga Tangerang',
            image: public_path($this->featured_image),
            published_time: new Carbon($this->created_at)
        );
    }
}
