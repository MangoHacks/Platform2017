<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Attendee;
use Illuminate\Support\Facades\Storage;

class MoveResumes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mango:move-resumes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move Attendee Resumes to new folder on S3';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $attendees = Attendee::where('checked_in', 1)->get();
        foreach ($attendees as $attendee) {
            if ($attendee->resume_url != 'late' && Storage::disk('s3')->exists($attendee->resume_url)) {
                $this->line('Copying: '.$attendee->email.': '.$attendee->resume_url);
                $newPath = 'attendeeresumes/'.explode('/', $attendee->resume_url)[1];
                Storage::disk('s3')->copy($attendee->resume_url, $newPath);
            }
        }
    }
}
