<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Product extends Model implements Sitemapable
{
    use HasSEO;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'price',
        'image',
        'sold',
        'keyword',
        'category_id',
    ];

    protected $appends = ['category', 'discount', 'types'];

    protected $hiddens = ['categroy_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('products.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at ?? $this->created_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.8);
    }

    public function getDynamicSEOData(): SEOData
    {
        $options = Option::all();

        return new SEOData(
            title: "{$this->name} - ".$options->where('key', 'nama aplikasi')->first()?->value,
            description: $this->description,
            author: $options->where('key', 'nama aplikasi')->first()?->value,
            image: asset('storage/'.$this->image),
            published_time: new Carbon($this->created_at),
            modified_time: new Carbon($this->updated_at ?? $this->created_at)
        );
    }

    public function Types(): HasMany
    {
        return $this->hasMany(ProductType::class, 'product_id', 'id');
    }

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function Discount(): HasOne
    {
        return $this->hasOne(Discount::class);
    }

    public function getTypesAttribute()
    {
        return $this->Types()->get()->map(fn ($type) => [
            ...$type->toArray(),
            'price' => $type->price - ($type->price * $this->discount['percentraw'] / 100),
        ]);
    }

    public function getCategoryAttribute()
    {
        return $this->Category()->first()?->text;
    }

    public function getDiscountAttribute()
    {
        $discount = $this->Discount()->first();
        $percent = $discount?->discount ?? 0;
        $after = $discount?->discount ? $this->price - ($this->price * $discount->discount / 100) : $this->price;

        return [
            'id' => $discount?->id,
            'discounted' => $discount?->discount ? true : false,
            'percent' => "{$percent}%",
            'percentraw' => $percent,
            'price_after_discount' => $after,
        ];
    }
}
