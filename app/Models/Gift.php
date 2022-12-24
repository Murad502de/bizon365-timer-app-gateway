<?php

namespace App\Models;

use App\Traits\Model\generateUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Gift extends Model
{
    use HasFactory;
    use generateUuid;

    protected $fillable = [
        'uuid',
        'name',
        'link',
        'number',
        'delay',
        'webinar_id',
    ];
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    /* ENTITY RELATIONS */
    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }

    /* CRUD METHODS */
    public static function createGift(array $gift): ?Gift
    {
        $webinar = Webinar::getByUuid($gift['webinar_uuid']);

        return self::create(array_merge($gift, [
            'webinar_id' => $webinar ? $webinar->id : null,
        ]));
    }
    public function updateGift(array $gift)
    {
        Log::info(__METHOD__, $gift); //DELETE

        if (isset($gift['webinar_uuid'])) {
            Log::info(__METHOD__, ['have uuid']); //DELETE

            $webinar = Webinar::getByUuid($gift['webinar_uuid']);

            return $this->update(array_merge($gift, [
                'webinar_id' => $webinar ? $webinar->id : null,
            ]));
        }

        Log::info(__METHOD__, ['dont have uuid']); //DELETE

        return $this->update($gift);
    }
}
