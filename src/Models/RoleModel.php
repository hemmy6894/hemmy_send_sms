<?php

namespace Hemmy\RoleManager\Models;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    //
    protected $table = "hemmy_roles";
    protected $fillable = ['name','bg_color'];

    public function scopeActive($query){
        return $query->where('status','=',1);
    }
}
