<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefpost extends Model
{
    protected $fillable = [
        'content',
        'ip_address',
        ];
        
    public function prefinfo()
    {
        return $this->belongsTo(Prefinfo::class);
    }
}
