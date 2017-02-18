<?php

namespace App\Http\Controllers;

use App\Attendee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AttendeeController extends Controller
{
    public function attendeePost(Request $request, $id) {
        $attendee = Attendee::find($id);
        $checked_in = $request->get('checked_in');

        $attendee->checked_in = $checked_in;
        $attendee->save();

        return $attendee;
    }

    public function attendeeCount() {
        $attendees_count = Attendee::where('checked_in', 1)->count();
        return [
            "checked_in_count" => $attendees_count
        ];
    }

}
