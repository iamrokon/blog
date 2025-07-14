<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected static function booted()
    {
        if (!app()->runningInConsole()) {
            static::addGlobalScope(new TenantScope);

            static::creating(function ($model) {
                $model->tenant_id = app('currentTenant')->id;
            });
        }
    }
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'tenant_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
