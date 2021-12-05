<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefinfo extends Model
{
    protected $fillable = [
        'name', 'scene_image', 'map_image',
    ];
    
    public function prefposts()
    {
        return $this->hasMany(Prefpost::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount('prefposts');
    }
}
