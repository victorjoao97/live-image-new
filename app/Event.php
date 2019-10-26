<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','location','presentation'];
    //
    public function getCreatedAtAttribute($timestamp) {
        return Carbon::parse($timestamp)->format('d/m/Y H:i:s');
    }
    protected $hidden = [
        'deleted_at',
    ];
    public function privacy_event()
    {
        return $this->belongsTo(PrivacyEvent::class);
    }
}
