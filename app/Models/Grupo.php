<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';
 
    public $timestamps = false;

    protected $primaryKey = 'id_grupo';

    protected $guarded = ["id_grupo"];

    protected $fillable = [
        "nome_grupo"
    ];

    public function nome_grupo()
    {
        return $this->nome_grupo;
    }

    public function usuario()
    {
        return $this->hasMany(User::class, 'id_grupo', 'id_grupo');
    }

    public function gruposMenus() : BelongsToMany
    {
        return $this->belongsToMany(GrupoMenu::class);
    }
}
