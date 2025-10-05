<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class experience extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function tools(){
        return $this->belongsToMany(tool::class ,'experience_tools', 'experience_id' ,'tool_id')->wherePivotNull('deleted_at')->withPivot('id');

    }

    public function screenshots(){
        return $this->hasMany(experienceScreenshot::class , 'experience_id' , 'id');
    }
}
