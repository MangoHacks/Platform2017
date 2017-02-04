<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $table = 'attendees';

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'school',
        'year',
        'major',
        'first_time',
        'shirt_size',
        'linkedin_url',
        'github_url',
        'resume_url',
        'food_special',
        'qr_code',
        'confirmations_sent',
        'registration_date',
        'checked_in',
        'rsvp',
    ];

}
