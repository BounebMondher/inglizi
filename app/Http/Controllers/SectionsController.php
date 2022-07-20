<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Lesson;
use App\Section;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($selectedLessonID = 0)
    {
        $unit = null;
        $grade = null;
        $lesson = null;
        if ($selectedLessonID === 0)
        {
            $sections = Section::orderBy('rank')->get();
        }
        else
        {
            $sections = Section::where('lesson_id', $selectedLessonID)->orderBy('rank')->get();
            $lesson = Lesson::find($selectedLessonID);
            $unit = Unit::find($lesson['unit_id']);
            $grade = Grade::find($unit['grade_id']);
        }
        foreach ($sections as $key=>$section)
        {
            if (Lesson::find($section['lesson_id']))
            {
                $currentLesson = Lesson::find($section['lesson_id']);
                $sections[$key]['lesson'] = $currentLesson['lesson'];
                if (Unit::find($currentLesson['unit_id'])->exists())
                {
                    $currentUnit = Unit::find($currentLesson['unit_id']);
                    $sections[$key]['unit'] = $currentUnit['unit'];
                    if (Grade::find($currentUnit['grade_id'])->exists())
                    {
                        $sections[$key]['grade'] = Grade::find($currentUnit['grade_id'])['grade'];
                    }
                    else
                    {
                        $sections[$key]['grade'] = "parent grade deleted ! please check database administrator";
                    }
                }
                else
                {
                    $sections[$key]['unit'] = "parent unit deleted ! please check database administrator";
                }
            }
            else
            {
                $sections[$key]['lesson'] = "parent lesson deleted ! please check database administrator";
            }

        }
        return view('pages.sections.sections')->with(["sections" => $sections, "lesson" => $lesson, "unit" => $unit, 'grade' => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($selectedLessonID = 0)
    {
        $grades = Grade::all();
        $units = Unit::all();
        $lessons = Lesson::all();
        $selectedGradeID = 0;
        $selectedUnitID = 0;
        foreach ($grades as $key => $grade)
        {
            $grades[$key]['units'] = Unit::where('grade_id', $grade['id'])->orderBy('rank')->get();

            foreach($grades[$key]['units'] as $key2 => $unit)
            {
                $grades[$key]['units'][$key2]['lessons'] = Lesson::where('unit_id', $unit['id'])->orderBy('rank')->get();
                if ($selectedLessonID != 0 && Lesson::find($selectedLessonID)->exists() && Lesson::find($selectedLessonID)['unit_id'] == $unit['id'])
                {
                    $selectedUnitID = $unit['id'];
                }
            }
            if ($selectedUnitID != 0 && Unit::find($selectedUnitID)->exists() && Unit::find($selectedUnitID)['grade_id'] == $grade['id'])
            {
                $selectedGradeID = $grade['id'];
            }
        }
        return view('pages.sections.create')->with(['selectedGradeID' => $selectedGradeID, 'selectedUnitID' => $selectedUnitID, 'selectedLessonID' => $selectedLessonID, 'lessons' => $lessons, 'grades' => $grades, 'units' => $units]);
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
            'section' => 'required|max:255',
            'lesson' => 'required',
        ]);
        Section::create(['section' => $request->post('section'), 'lesson_id' => $request->post('lesson'), 'rank' => DB::table('sections')->max('rank')+1]);
        return Redirect::route('sections', ["selectedLessonID"=>$request->post('selectedLessonID') != 0 ? $request->post('selectedLessonID') : null])->with('success', 'Section created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $selectedLessonID = 0)
    {
        $grades = Grade::all();
        $units = Unit::all();
        $lessons = Lesson::all();
        $selectedGradeID = 0;
        $selectedUnitID = 0;
        $section = Section::find($id);
        $sectionLesson = Lesson::find($section['lesson_id']);
        $lessonUnit = Unit::find($sectionLesson['unit_id']);
        foreach ($grades as $key => $grade)
        {
            $grades[$key]['units'] = Unit::where('grade_id', $grade['id'])->orderBy('rank')->get();

            foreach($grades[$key]['units'] as $key2 => $unit)
            {
                $grades[$key]['units'][$key2]['lessons'] = Lesson::where('unit_id', $unit['id'])->orderBy('rank')->get();
                if ($selectedLessonID != 0 && Lesson::find($selectedLessonID)->exists() && Lesson::find($selectedLessonID)['unit_id'] == $unit['id'])
                {
                    $selectedUnitID = $unit['id'];
                }
            }
            if ($selectedUnitID != 0 && Unit::find($selectedUnitID)->exists() && Unit::find($selectedUnitID)['grade_id'] == $grade['id'])
            {
                $selectedGradeID = $grade['id'];
            }
        }
        return view('pages.sections.edit')->with(['sectionLesson' => $sectionLesson, 'lessonUnit' => $lessonUnit, 'section' => $section ,'selectedGradeID' => $selectedGradeID, 'selectedUnitID' => $selectedUnitID, 'selectedLessonID' => $selectedLessonID, 'lessons' => $lessons, 'grades' => $grades, 'units' => $units]);

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
            'section' => 'required|max:255',
            'lesson' => 'required'
        ]);
        $section = Section::find($id);
        $section->update(['section' => $request->post('section'), 'enabled' => $request->post('enabled') ? 1:0, 'lesson_id' => $request->post('lesson')]);
        return Redirect::route('sections', ["selectedLessonID"=>$request->post('selectedLessonID') != 0 ? $request->post('selectedLessonID') : null])->with('success', 'Section updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $selectedLessonID = 0)
    {
        $section = Section::find($id);
        $section->delete();
        return Redirect::route('sections', ["selectedLessonID"=>$selectedLessonID != 0 ? $selectedLessonID : null])->with('success', 'Section deleted successfully!');
    }
}
