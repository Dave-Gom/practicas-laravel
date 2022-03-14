<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
  use HasFactory;
  
  /**
   * The products that belong to the Cart
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function products()
  {
      return $this->belongsToMany(Product::class)->withPivot('quantity');
  }
}
