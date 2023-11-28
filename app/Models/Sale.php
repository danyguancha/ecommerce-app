<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_user_id',
        'fk_client_id',
        'type_voucher',
        'serie_voucher',
        'date',
        'tax',
        'total',
        'state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'productxsale', 'fk_sale_id', 'fk_product_id')
            ->withPivot('amount', 'price', 'discount');
    }
}
