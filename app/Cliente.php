<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * 
*/
class Cliente extends Model
{
    use SoftDeletes; 
    //columnas de la tabla clientes
    protected $dates = ['deleted_at'];
    protected $sexo = ['Femenino', 'Masculino'];
    protected $tipo = ['Tecnico ORTSI', 'Profesor','Administrativo', 'Estudiante','Directivo', 'Otros'];
    protected $table = 'clientes';
    protected $fillable = [
           'nombre',
           'apellido',
           'cedula',
           'telefono',
           'sexo',
           'email',
           'tipo',          
           'dependencia_id',
           'user_id',  
    ];
    //registrar cuando se realice una accion soble la tabla en la base de datos
    public static function boot()
    {
        parent::boot();

        Cliente::observe(new \App\Observers\UserActionsObserver);
    }
    //validacon de campos del front
    public static function storeValidation($request)
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|unique:clientes|max:10',
            'telefono' => 'string|max:50',
            'sexo' => 'required|string|max:10',
            'tipo' => 'required|string|max:20',
            'dependencia_id' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:clientes,email',
            'user_id' => 'required|string',
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|unique:clientes|max:10',
            'telefono' => 'string|max:50',
            'sexo' => 'required|string|max:10',
            'tipo' => 'required|string|max:20',
            'dependencia_id' => 'required|string|max:255',
            'email' => 'string|email|max:255|unique:clientes,email',
            'user_id' => 'required|string',
        ];
    }
    
    //relacion de las tablas
   
    public function tickets(){
        return $this->HasMany(Ticket::class);
    }
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();;
    }
     public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id')->withTrashed();
    }
    
    
}
