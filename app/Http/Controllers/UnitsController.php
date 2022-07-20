<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($selectedGradeID = 0)
    {
        $grade = null;
        if ($selectedGradeID === 0)
        {
            $units = Unit::orderBy('rank')->get();
        }
        else
        {
            $units = Unit::where('grade_id', $selectedGradeID)->orderBy('rank')->get();
            $grade = Grade::find($selectedGradeID);
        }
        foreach ($units as $key=>$unit)
        {
            if (Grade::find($unit['grade_id'])->exists())
            {
                $units[$key]['grade'] = Grade::find($unit['grade_id'])['grade'];
            }
            else
            {
                $units[$key]['grade'] = "parent grade deleted ! please check database administrator";
            }
        }
        return view('pages.units.units')->with(["units" => $units, "grade" => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($selectedGradeID = 0)
    {
        $grades = Grade::all();
        return view('pages.units.create')->with(['selectedGradeID' => $selectedGradeID, 'grades' => $grades]);
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
            'unit' => 'required|max:255',
        ]);
        Unit::create(['unit' => $request->post('unit'), 'grade_id' => $request->post('grade'), 'rank' => DB::table('units')->max('rank')+1]);
        return Redirect::route('units', ["selectedGradeID"=>$request->post('selectedGradeID') != 0 ? $request->post('selectedGradeID') : null])->with('success', 'Unit created successfully!');
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
    public function edit($id, $selectedGradeID = 0)
    {
        $unit = Unit::find($id);
        $grade = null;
        $grades = Grade::all();
        if ($selectedGradeID != 0)
        {
            $grade = Grade::find($selectedGradeID);
        }
        return view('pages.units.edit')->with(['selectedGradeID' => $selectedGradeID, 'grades' => $grades, 'grade' => $grade, "unit"=> $unit]);
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
            'unit' => 'required|max:255',
        ]);
        $unit = Unit::find($id);
        $unit->update(['unit' => $request->post('unit'), 'enabled' => $request->post('enabled') ? 1:0, 'grade_id' => $request->post('grade')]);
        return Redirect::route('units', ["selectedGradeID"=>$request->post('selectedGradeID') != 0 ? $request->post('selectedGradeID') : null])->with('success', 'Unit updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $selectedGradeID = 0)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return Redirect::route('units', ["selectedGradeID"=>$selectedGradeID != 0 ? $selectedGradeID : null])->with('success', 'Unit deleted successfully!');
    }
}
