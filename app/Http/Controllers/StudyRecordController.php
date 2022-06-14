<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudyRecord;
use App\Models\StudySchedule;

class StudyRecordController extends Controller
{
    public function create()
    {
        return view('study_records.create');
    }

    public function store(Request $request)
    {
        $study_record = new StudyRecord();
        $study_record->user_id = Auth::user()->id;
        $study_record->name = $request->name;
        $study_record->subject = $request->subject;
        $study_record->detail = $request->detail;
        $study_record->save();

        foreach($request->term as $date) {
            $study_schedule = new StudySchedule();
            $study_schedule->study_record_id = $study_record->id;
            $study_schedule->schedule = date('Y-m-d', strtotime('+'.$date.' day'));
            $study_schedule->save();
        }

        return redirect()->route('home');
    }
}
