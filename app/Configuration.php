<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [
        'name', 'value', 'created_by', 'updated_by'
    ];

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
            $model->updated_by = NULL;
        });

        static::updating(function ($model) {
            $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
        });
    }
}
