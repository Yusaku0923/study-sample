<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudyRecord;
use App\Models\StudySchedule;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $records = StudyRecord::where('user_id', Auth::user()->id)->with('schedules')->get()->toArray();

        $on_schedule = StudySchedule::where('schedule', date('Y-m-d'))->whereNull('completed_at')->with('record')->get()->toArray();
        $over_deadline = StudySchedule::where('schedule', '<', date('Y-m-d'))->whereNull('completed_at')->with('record')->get()->toArray();

        $on_schedule = array_map([$this, 's2h'], $on_schedule);
        $over_deadline = array_map([$this, 's2h'], $over_deadline);

        return view('home')->with([
            'on_schedule' => $on_schedule,
            'over_deadline' => $over_deadline,
            'subject' => config('subject.list'),
        ]);
    }

    private function s2h ($schedule) {
        $hours = floor((int)$schedule['scheduled_seconds'] / 3600);
        $minutes = floor(((int)$schedule['scheduled_seconds'] / 60) % 60);
        $seconds = (int)$schedule['scheduled_seconds'] % 60;

        if ($hours == 0) {
            $schedule['scheduled_seconds'] = sprintf("%02d:%02d", $minutes, $seconds);
        } else {
            $schedule['scheduled_seconds'] = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        }
        return $schedule;
    }
}
