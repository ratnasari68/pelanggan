<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*class Pelanggan extends Model
{
    use HasFactory;
}*/
class pelanggan extends Model {
    protected $table = 'pelanggan';
    protected $guarded = [];
    // protected $fillable =  [
    //     'firstName', 'lastName', 'info'
    // ];
}
