<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Queue;
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
        'status',
    ];

    protected $appends = ['excerpt'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::created(function () {
            Queue::push(function () {
                Artisan::call('sitemap:create');
            });
        });
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('pages', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at ?? $this->created_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.8);
    }

    public function getDynamicSEOData(): SEOData
    {
        $options = Option::all();

        return new SEOData(
            title: "{$this->title} - ".$options->where('key', 'nama aplikasi')->first()?->value,
            description: $this->excerpt,
            author: $options->where('key', 'nama aplikasi')->first()?->value,
            image: asset('imgs/logo.png'),
            published_time: new Carbon($this->created_at),
            modified_time: new Carbon($this->updated_at ?? $this->created_at)
        );
    }

    public function getExcerptAttribute() {
        $plainText = strip_tags($this->content);
        $plainText = preg_replace('/(\r\n|\r|\n)/', ', ', $plainText);

        if (strlen($plainText) > 50) {
            return substr($plainText, 0, 50) . '...';
        }

        return $plainText;
    }
}
