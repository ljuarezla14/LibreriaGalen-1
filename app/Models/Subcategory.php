<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['name', 'slug', 'category_id'];

    //Relacion uno a muchos
    public function products(){
        return $this->hasMany(Products::class);
    }

    //Relaion uno a muhos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
