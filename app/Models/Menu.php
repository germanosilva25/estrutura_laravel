<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
 
    public $timestamps = false;

    protected $primaryKey = 'id_menu';

    protected $guarded = ["id_menu"];
    protected $fillable = [
        "icone",
        "chave",
        "valor",
        "numero_ordenacao",
        "submenu",
        "submenugroup",
        "issubmenu",
        "visible",
        "global"
    ];

    public function valor()
    {
        return $this->valor;
    }


    public function gruposMenus() : BelongsToMany
    {
        return $this->belongsToMany(GrupoMenu::class);
    }
}
