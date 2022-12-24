<?php

namespace App\Models;

use App\Traits\Model\generateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    use generateUuid;

    protected $fillable = [
        'uuid',
        'name',
        'code',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }
    public static function getByUuid(string $uuid): ?Webinar
    {
        return self::whereUuid($uuid)->first();
    }
}
