<?php

namespace Hemmy\RoleManager\Models;

use Illuminate\Database\Eloquent\Model;

class SystemFunctionModel extends Model
{
    //
    protected $table = "hemmy_system_functions";
    protected $fillable = ['function_name'];

    public function scopeActive($query){
        return $query->where('status','=',1);
    }
}
