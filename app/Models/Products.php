<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function brand(){
        return $this->belongsTo(Brands::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    // relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Images::class, "imageable");
    }

    //URL AMIGABLE
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
