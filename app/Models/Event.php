<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Workshop;

class Event extends Model
{

    public function Workshops(){
        return $this->hasMany(Workshop::class);
    }

    public function getEventAssociatedWithWorkShop($eventId){

        $event = Event::find($eventId);
        return $event->hasMany(Workshop::class, 'event_id' );
    }
}
