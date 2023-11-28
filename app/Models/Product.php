<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $primaryKey = "id_product";
    protected $fillable = [
        'fk_category_id',
        'code',
        'name',
        'price',
        'stock',
        'description',
        'image',
        'estado',
        'slug',

    ] ;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'fk_category_id')->withDefault();
    }

    public function sales():BelongsToMany
    {
        return $this->belongsToMany(Sale::class, 'productxsale', 'fk_product_id', 'fk_sale_id')
            ->withPivot('amount', 'price', 'discount');
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'productxuser', 'fk_product_id', 'fk_user_id')
            ->withPivot('date');
    }

    public function details():BelongsToMany
    {
        return $this->belongsToMany(DetailProduct::class, 'detailsxproduct', 'fk_product_id', 'fk_detail_id');
    }
}
