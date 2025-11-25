<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'kvm_alumnos';
    protected $primaryKey = 'ALUM_NMATRI'; 
    public $timestamps = false;
    
    protected $fillable = [
        'ALUM_NOMBRES', 
        'ALUM_CODCUR'
    ]; 
    
    public function curso()
    {
        return $this->belongsTo(Fcurso::class, 'ALUM_CODCUR', 'FCU_COD');
    }
}