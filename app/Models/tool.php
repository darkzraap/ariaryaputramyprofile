<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tool extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',

    ];

    public function projects(){
        return $this->belongsToMany(project::class , 'project_tools' , 'tool_id' , 'project_id');
    }

    public function experiences(){
        return $this->belongsToMany(experience::class ,'experience_tools', 'tool_id' ,'experience_id');

    }
}
