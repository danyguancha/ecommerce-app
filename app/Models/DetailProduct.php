<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DetailProduct extends Model
{
    use HasFactory;
    protected $primaryKey = "id_detail";

    protected $fillable = [
        'ram',
        'internal_storage',
        'battery',
        'main_camera',
        'front_camera',
        'display',
        'processor',
        'connectivity',
        'colors',
        'operating_system',
        'dimensions',
        'weight',
        'model',
    ];

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'detailsxproduct', 'fk_detail_id', 'fk_product_id');
    }
}
