<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fcurso extends Model
{
    use HasFactory;

    protected $table = 'kvm_fcurso';
    protected $primaryKey = 'FCU_COD';
    public $timestamps = false;
    protected $fillable = [
        'FCU_DESCRI', 
        'FCU_CIC'
    ];
}