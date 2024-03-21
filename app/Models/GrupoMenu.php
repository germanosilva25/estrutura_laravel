<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMenu extends Model
{
    use HasFactory;

    protected $table = 'grupos_menus';

    public $timestamps = false;

    protected $primaryKey = 'id_grupos_menus';

    protected $guarded = ["id_grupos_menus"];

    protected $fillable = [
        "id_grupo",
        "id_menu"
    ];

    // public function valor()
    // {
    //     return $this->valor;
    // }

    public function menus()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function grupos()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo', 'id_grupo');
    }
}
