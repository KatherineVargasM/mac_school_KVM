<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pers extends Model
{
    use HasFactory;
    protected $table = 'kvm_pers';
    protected $primaryKey = 'PER_CODIGO';
    public $timestamps = false;

    protected $fillable = [
        'PER_APENOM', 
        'PER_CEDULA'
    ]; 
}