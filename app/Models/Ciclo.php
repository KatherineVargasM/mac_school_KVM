<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Ciclo extends Model
{
    use HasFactory;
    protected $table = 'kvm_ciclo';
    protected $primaryKey = 'CIC_CODI';
    public $timestamps = false;
    protected $fillable = ['CIC_NOMB', 'CIC_OBSERV']; 
}