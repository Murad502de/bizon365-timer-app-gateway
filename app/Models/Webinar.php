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

    /* ENTITY RELATIONS */
    public function gifts()
    {
        return $this->hasMany(Gift::class);
    }

    /* CRUD METHODS */
    public static function getByUuid(string $uuid): ?Webinar
    {
        return self::whereUuid($uuid)->first();
    }
}
