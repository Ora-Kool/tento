<?php

namespace App\Models;

use App\Scopes\TenantScope;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use TenantTrait;
    protected $fillable = ['task', 'done', 'user_id'];


    protected static function booted(){
        static::addGlobalScope(new TenantScope());
    }
}
