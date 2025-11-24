<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asig extends Model
{
    use HasFactory;

    protected $table = 'kvm_asig';
    protected $primaryKey = 'ASIG_CODIGO';
    public $timestamps = false;
    protected $fillable = [
        'ASIG_NOMBRE',
        'ASIG_OBSERV'
    ];
}