<?php

namespace App\Http\Controllers;

use App\Attendee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            "colors" => $this->getColorTheme(),
            "hero" => $this->getHeroAndCircles()
        ]);
    }

    public function register() {
        return view('register', [
            "colors" => $this->getColorTheme(),
            "hero" => $this->getHeroAndCircles()
        ]);
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

    public function afterRegister() {
        return view('post_register', [
            "colors" => $this->getColorTheme(),
            "hero" => $this->getHeroAndCircles()
        ]);
    }

    public function sweetener() {
        return view('sweetener', [
            "colors" => $this->getColorTheme(),
            "hero" => $this->getHeroAndCircles()
        ]);
    }

    public function getHeroAndCircles() {
        $heros = [
            [
                "filename" => "ashcrew.jpg",
                "pts" => [
                    "big" => ["top"=> "auto", "left" => "-4%", "right" => "auto", "bottom" => "-10%"],
                    "med" => ["top"=> "4%", "left" => "auto", "right" => "12%", "bottom" => "auto"],
                    "small" => ["top"=> "8%", "left" => "15%", "right" => "auto", "bottom" => "auto"]
                ]
            ],
            [
                "filename" => "atrium.jpg",
                "pts" => [
                    "big" => ["top"=> "-3%", "left" => "auto", "right" => "5%", "bottom" => "auto"],
                    "med" => ["top"=> "4%", "left" => "8%", "right" => "auto", "bottom" => "auto"],
                    "small" => ["top"=> "78%", "left" => "-1%", "right" => "auto", "bottom" => "auto"]
                ]
            ],
            [
                "filename" => "create.jpg",
                "pts" => [
                    "big" => ["top"=> "-1%", "left" => "auto", "right" => "7%", "bottom" => "auto"],
                    "med" => ["top"=> "2%", "left" => "2%", "right" => "auto", "bottom" => "auto"],
                    "small" => ["top"=> "63%", "left" => "15%", "right" => "auto", "bottom" => "auto"]
                ]
            ],
            [
                "filename" => "laptoplin.jpg",
                "pts" => [
                    "big" => ["top"=> "-10%", "left" => "21%", "right" => "auto", "bottom" => "auto"],
                    "med" => ["top"=> "auto", "left" => "7%", "right" => "auto", "bottom" => "4%"],
                    "small" => ["top"=> "10%", "left" => "auto", "right" => "-0.5%", "bottom" => "auto"]
                ]
            ],
            [
                "filename" => "jacobcrew.jpg",
                "pts" => [
                    "big" => ["top"=> "-3%", "left" => "-3%", "right" => "auto", "bottom" => "auto"],
                    "med" => ["top"=> "-2%", "left" => "auto", "right" => "17%", "bottom" => "auto"],
                    "small" => ["top"=> "73%", "left" => "13%", "right" => "auto", "bottom" => "auto"]
                ]
            ]
        ];

        $hero = $heros[array_rand($heros, 1)];
        return $hero;
    }

    public function getColorTheme() {

        $red_blue_theme = [
            "accent-color" => ['25,37,80', explode(',', '25,37,80')],
            "primary-color" => ['25,37,80', explode(',', '25,37,80')],
            "secondary-color" => ['240,14,46', explode(',', '240,14,46')],
            "hero-fill" => ['255,255,255', explode(',', '255,255,255')],
            "hero-color" => ['25,37,80', explode(',', '25,37,80')],
            "mango-color" => ['255,255,255', explode(',', '255,255,255')],
        ];

        $pink_cream_purple_theme = [
            "accent-color" => ['86,91,203', explode(',', '86,91,203')],
            "primary-color" => ['232,35,99', explode(',', '232,35,99')],
            "secondary-color" => ['239,211,135', explode(',', '239,211,135')],
            "hero-fill" => ['86,91,203', explode(',', '86,91,203')],
            "hero-color" => ['255,255,255', explode(',', '255,255,255')],
            "mango-color" => ['255,255,255', explode(',', '255,255,255')],
        ];

        $purple_yellow_theme = [
            "accent-color" => ['75,23,167', explode(',', '75,23,167')],
            "primary-color" => ['75,23,167', explode(',', '75,23,167')],
            "secondary-color" => ['245,204,128', explode(',', '245,204,128')],
            "hero-fill" => ['255,255,255', explode(',', '255,255,255')],
            "hero-color" => ['75,23,167', explode(',', '75,23,167')],
            "mango-color" => ['255,255,255', explode(',', '255,255,255')],
        ];

        $orange_yellow_black_theme = [
            "accent-color" => ['0,0,0', explode(',', '0,0,0')],
            "primary-color" => ['255,105,57', explode(',', '255,105,57')],
            "secondary-color" => ['255,198,99', explode(',', '255,198,99')],
            "hero-fill" => ['0,0,0', explode(',', '0,0,0')],
            "hero-color" => ['255,255,255', explode(',', '255,255,255')],
            "mango-color" => ['0,0,0', explode(',', '0,0,0')],
        ];

        $pink_blue_theme = [
            "accent-color" => ['3,23,130', explode(',', '3,23,130')],
            "primary-color" => ['49,70,185', explode(',', '49,70,185')],
            "secondary-color" => ['240,55,165', explode(',', '240,55,165')],
            "hero-fill" => ['255,255,255', explode(',', '255,255,255')],
            "hero-color" => ['49,70,185', explode(',', '49,70,185')],
            "mango-color" => ['255,255,255', explode(',', '255,255,255')],
        ];

        $all_colors = [
            $red_blue_theme,
            $pink_cream_purple_theme,
            $purple_yellow_theme,
            $orange_yellow_black_theme,
            $pink_blue_theme
        ];

        $color = $all_colors[array_rand($all_colors, 1)];
        return $color;
    }
}
