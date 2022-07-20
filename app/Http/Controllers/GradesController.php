<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function print_r;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::orderBy("rank")->get();
        return view('pages.grades.grades')->with("grades", $grades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.grades.create');
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
            'grade' => 'required|max:255',
        ]);
            Grade::create(['grade' => $request->post('grade'), 'rank' => DB::table('grades')->max('rank')+1]);
            return Redirect::route('grades')->with('success', 'Grade created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view('pages.grades.edit')->with("grade", $grade);
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
            'grade' => 'required|max:255',
        ]);
        $grade = Grade::find($id);
        $grade->update(['grade' => $request->post('grade'), 'enabled' => $request->post('enabled') ? 1:0]);
        return Redirect::route('grades')->with('success', 'Grade updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return Redirect::route('grades')->with('success', 'Grade deleted successfully!');
    }
}
