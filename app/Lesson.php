<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'lesson', 'unit_id', 'enabled', 'rank', 'created_by', 'updated_by', 'deleted_by'
    ];


    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
            $model->updated_by = NULL;
            $model->deleted_by = NULL;
        });

        static::updating(function ($model) {
            $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
        });

        static::deleting(function ($model) {
            $model->deleted_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 0;
        });
    }
}
