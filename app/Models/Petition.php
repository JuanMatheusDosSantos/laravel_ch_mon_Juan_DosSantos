<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'destinatario',
        'firmantes',
        'estado'
    ];
    protected $hidden = [
        "user_id",
        "category_id"
    ];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function userSigners()
    {
        return $this->belongsToMany(User::class,"petition_user");
    }
}
