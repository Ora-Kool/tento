<?php

namespace App\Traits;

trait TenantTrait
{
    public static function bootTenantTrait(){
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->tenant_id = auth()->user()->tenant_id;
            }elseif (session()->has('tenant_id')) {
                $model->tenant_id = session()->get('tenant_id');
            }
        });
    }
}
