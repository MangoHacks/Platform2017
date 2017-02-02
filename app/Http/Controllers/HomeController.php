<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
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
