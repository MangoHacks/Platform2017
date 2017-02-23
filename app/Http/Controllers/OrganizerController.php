<?php

namespace App\Http\Controllers;

use App\Attendee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class OrganizerController extends Controller
{
    /**
     * @param Request $request
     */
    public function sendConfirmations(Request $request) {
        $targetUsers = Attendee::where('rsvp', 0)
            ->where('checked_in', 0)
            ->where('confirmations_sent', $request->get('wave'))
            ->get();

        foreach($targetUsers as $attendee) {

            $id = $attendee['id'];
            $hashed_id = urlencode(simple_encrypt($id));
            $attendee_data = [
                'hashed_id' => $hashed_id,
                'first_name' => $attendee['first_name'],
                'last_name' => $attendee['last_name'],
                'email' => $attendee['email']
            ];

            Mail::send('emails.confirm', ['attendee' => $attendee_data], function($m) use ($attendee_data) {
                $m->from('team@mangohacks.com', 'MangoHacks Team');

                $m->to($attendee_data['email'], $attendee_data['first_name'].' '.$attendee_data['last_name'])
                    ->subject('MangoHacks Decisions Are Out!');
            });

            $confs_sent = $attendee['confirmations_sent'];
            $attendee['confirmations_sent'] = $confs_sent + 1;
            $attendee->save();
        }

        return "Sending Emails";
    }

    /**
     * @param Request $request
     */
    public function sendLogistics(Request $request) {
        $targetUsers = Attendee::where('rsvp', 1)
            ->where('checked_in', 0)
            ->get();

        foreach($targetUsers as $attendee) {

            $id = $attendee['id'];
            $hashed_id = urlencode(simple_encrypt($id));
            $attendee_data = [
                'hashed_id' => $hashed_id,
                'first_name' => $attendee['first_name'],
                'last_name' => $attendee['last_name'],
                'email' => $attendee['email']
            ];

            Mail::send('emails.pre_event', ['attendee' => $attendee_data], function($m) use ($attendee_data) {
                $m->from('team@mangohacks.com', 'MangoHacks Team');

                $m->to($attendee_data['email'], $attendee_data['first_name'].' '.$attendee_data['last_name'])
                    ->subject('MangoHacks Decisions Are Out!');
            });

            $confs_sent = $attendee['confirmations_sent'];
            $attendee->save();
        }

        return "Sending Emails";
    }

    /**
     * @param Request $request
     */
    public function sendBusInfo(Request $request) {
        $targetUsers = Attendee::where('rsvp', 1)
            ->where('confirmations_sent', 1)
            ->whereIn('school_name', [
                'Embry-Riddle - Daytona Beach',
                'Florida Institute of Technology',
                'Florida A&M University',
                'Florida Polytechnic University',
                'Florida State University',
                'Stetson University',
                'Tallahassee Community College',
                'University of Central Florida',
                'University of Florida',
                'University of South Florida',
                'University of North Florida'
            ])->get();

        foreach($targetUsers as $attendee) {
            $attendee_data = [
                'first_name' => $attendee['first_name'],
                'last_name' => $attendee['last_name'],
                'email' => $attendee['email']
            ];
            Mail::send('emails.bus', ['attendee' => $attendee_data], function($m) use ($attendee_data) {
                $m->from('team@mangohacks.com', 'MangoHacks Team');
                $m->to($attendee_data['email'], $attendee_data['first_name'].' '.$attendee_data['last_name'])
                    ->subject('MangoHacks NorthFlo Bus Info!');
            });

            $confs_sent = $attendee['confirmations_sent'];
            $attendee['confirmations_sent'] = $confs_sent + 1;
            $attendee->save();
        }

        return "Sent Bus Emails";
    }

    public function registerPost(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|unique:attendees',
            'first_name' => 'required',
            'last_name' => 'required',
            'school_name' => 'required',
            'school_year' => 'required',
            'school_major' => 'required',
            'first_hackathon' => 'required',
            'resume' => 'file',
            'shirt_size' => 'required',
            'mlh_coc' => 'accepted',
            'mlh_privacy' => 'accepted'
        ]);

        $filename = $request->get('first_name').'_'
            .$request->get('last_name').'_'
            .Carbon::now()->getTimestamp().'.'
            .$request->file('resume')->extension();

        $resume_path = $request->file('resume')->storeAs(
            'resumes',
            $filename,
            [
                'disk' => 's3',
                'visibility' => 'public'
            ]
        );

        $attendee = new Attendee();
        $attendee['first_name'] = $request->get('first_name');
        $attendee['last_name'] = $request->get('last_name');
        $attendee['email'] = $request->get('email');
        $attendee['school_name'] = $request->get('school_name');
        $attendee['school_major'] = $request->get('school_major');
        $attendee['school_year'] = $request->get('school_year');
        $attendee['first_hackathon'] = $request->get('first_hackathon') == "yes" ? true: false;
        $attendee['shirt_size'] = $request->get('shirt_size');
        $attendee['github_url'] = $request->get('github_url', "");
        $attendee['linkedin_url'] = $request->get('linkedin_url', "");
        $attendee['resume_url'] = $resume_path;
        $attendee['dietary'] = $request->get('dietary', "");
        $attendee['registration_date'] = Carbon::now()->toDateTimeString();

        $saved = $attendee->save();

        if ($saved) {
            return redirect('post-register')->with('name', $attendee['first_name']);
        }

        return view('register', [
            "colors" => $this->getColorTheme(),
            "hero" => $this->getHeroAndCircles()
        ]);
    }
}
