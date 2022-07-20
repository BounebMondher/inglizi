<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Lesson;
use App\Grade;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($selectedUnitID = 0)
    {
        $unit = null;
        $grade = null;
        if ($selectedUnitID === 0)
        {
            $lessons = Lesson::orderBy('rank')->get();
        }
        else
        {
            $lessons = Lesson::where('unit_id', $selectedUnitID)->orderBy('rank')->get();
            $unit = Unit::find($selectedUnitID);
            $grade = Grade::find($unit['grade_id']);
        }
        foreach ($lessons as $key=>$lesson)
        {
            if (Unit::find($lesson['unit_id'])->exists())
            {
                $currentUnit = Unit::find($lesson['unit_id']);
                $lessons[$key]['unit'] = $currentUnit['unit'];
                if (Grade::find($currentUnit['grade_id'])->exists())
                {
                    $lessons[$key]['grade'] = Grade::find($currentUnit['grade_id'])['grade'];
                }
                else
                {
                    $lessons[$key]['grade'] = "parent grade deleted ! please check database administrator";
                }
            }
            else
            {
                $lessons[$key]['unit'] = "parent unit deleted ! please check database administrator";
            }
        }
        return view('pages.lessons.lessons')->with(["lessons" => $lessons, "unit" => $unit, 'grade' => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($selectedUnitID = 0)
    {
        $grades = Grade::all();
        $units = Unit::all();
        $selectedGradeID = 0;
        foreach ($grades as $key => $grade)
        {
            $grades[$key]['units'] = Unit::where('grade_id', $grade['id'])->orderBy('rank')->get();
            if ($selectedUnitID != 0 && Unit::find($selectedUnitID)->exists() && Unit::find($selectedUnitID)['grade_id'] == $grade['id'])
            {
                $selectedGradeID = $grade['id'];
            }
        }
        return view('pages.lessons.create')->with(['selectedGradeID' => $selectedGradeID, 'selectedUnitID' => $selectedUnitID, 'grades' => $grades, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lesson' => 'required|max:255',
            'unit' => 'required'
        ]);
        Lesson::create(['lesson' => $request->post('lesson'), 'unit_id' => $request->post('unit'), 'rank' => DB::table('lessons')->max('rank')+1]);
        return Redirect::route('lessons', ["selectedUnitID"=>$request->post('selectedUnitID') != 0 ? $request->post('selectedUnitID') : null])->with('success', 'Lesson created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $selectedUnitID = 0)
    {
        $lesson = Lesson::find($id);
        $unit = null;
        $units = Unit::all();
        $grades = Grade::all();
        if ($selectedUnitID != 0)
        {
            $unit = Unit::find($selectedUnitID);
        }
        $lessonUnit = Unit::find($lesson["unit_id"]);
        foreach ($grades as $key => $grade)
        {
            $grades[$key]['units'] = Unit::where('grade_id', $grade['id'])->orderBy('rank')->get();
            if ($selectedUnitID != 0 && Unit::find($selectedUnitID)->exists() && Unit::find($selectedUnitID)['grade_id'] == $grade['id'])
            {
                $selectedGradeID = $grade['id'];
            }
        }
        return view('pages.lessons.edit')->with(['lessonUnit' => $lessonUnit ,'selectedUnitID' => $selectedUnitID, 'grades' => $grades, 'units' => $units, 'lesson' => $lesson, "unit"=> $unit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'lesson' => 'required|max:255',
            'unit' => 'required'
        ]);
        $lesson = Lesson::find($id);
        $lesson->update(['lesson' => $request->post('lesson'), 'enabled' => $request->post('enabled') ? 1:0, 'unit_id' => $request->post('unit')]);
        return Redirect::route('lessons', ["selectedUnitID"=>$request->post('selectedUnitID') != 0 ? $request->post('selectedUnitID') : null])->with('success', 'Lesson updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $selectedUnitID = 0)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return Redirect::route('lessons', ["selectedUnitID"=>$selectedUnitID != 0 ? $selectedUnitID : null])->with('success', 'Lesson deleted successfully!');

    }
}
