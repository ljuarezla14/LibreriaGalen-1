<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'create_at', 'updated_at'];

    const RECIBIDO = 1;
    const PAGADO = 2;
    const ENTREGADO = 3;
    const CANCELADO = 4;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
