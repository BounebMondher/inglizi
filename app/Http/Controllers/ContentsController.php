<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Lesson;
use App\Section;
use App\Unit;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function resource_path;
use function strpos;

class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($selectedSectionID)
    {
        $contents = Content::where('section_id', $selectedSectionID)->orderBy('rank')->get();
        $selectedSection = Section::find($selectedSectionID);
        foreach($contents as $key=>$content)
        {
            $contents[$key]['section'] =  $selectedSection['section'];
            $selectedLesson = Lesson::find($selectedSection['lesson_id']);
            $contents[$key]['lesson'] = $selectedLesson['lesson'];
            $selectedUnit = Unit::find($selectedLesson['unit_id']);
            $contents[$key]['unit'] = $selectedUnit['unit'];
            $selectedGrade = Grade::find($selectedUnit['grade_id']);
            $contents[$key]['grade'] = $selectedGrade['grade'];
        }
        $selectedLesson = Lesson::find($selectedSection['lesson_id']);
        $selectedUnit = Unit::find($selectedLesson['unit_id']);
        $selectedGrade = Grade::find($selectedUnit['grade_id']);
        return view('pages.contents.contents')->with(["contents" => $contents, "selectedSectionID" => $selectedSectionID, 'selectedSection' => $selectedSection, 'selectedLesson' => $selectedLesson, 'selectedUnit' => $selectedUnit, 'selectedGrade' => $selectedGrade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($selectedSectionID)
    {
        return view('pages.contents.create')->with(['selectedSectionID' => $selectedSectionID]);
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
            'content' => 'required',
            'contentTitle' => 'required',
            'contentType' => 'required'
        ]);
        $content = $request->post('content');
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_NOERROR);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            $fileName = $image->getAttribute('data-filename');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $imgeData = base64_decode($data);
            $image_name= "" . time()."-".$fileName;
            $path = resource_path() ."/images/". $image_name;
            //echo $path."<br>";
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', asset('resources')."/images/".$image_name);
            //echo "<pre>".$content."</pre>";exit();

        }
        $audioFile = $dom->getElementsByTagName('audio');
        foreach($audioFile as $item => $audio){
            $data = $audio->getAttribute('src');
            $fileName = $audio->getAttribute('data-filename');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $audioData = base64_decode($data);
            $audio_name= "" . time()."-".$fileName;
            $path = resource_path() ."/audios/". $audio_name;
            //echo $path."<br>";
            file_put_contents($path, $audioData);

            $audio->removeAttribute('src');
            $audio->setAttribute('src', asset('resources')."/audios/".$audio_name);
        }
        $content = $dom->saveHTML();

        Content::create(['content' => $content, 'content_type' => $request->post('contentType'), 'answer_type' => $request->post('answerType'), 'content_title' => $request->post('contentTitle'),  'section_id' => $request->post('selectedSectionID'), 'rank' => DB::table('contents')->max('rank')+1]);
        return Redirect::route('contents', ["selectedSectionID"=>$request->post('selectedSectionID')])->with('success', 'Content created successfully!');

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
    public function edit($id, $selectedSectionID)
    {
        $content = Content::find($id);
        return view('pages.contents.edit')->with(['content'=> $content, 'selectedSectionID' => $selectedSectionID]);
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
            'content' => 'required',
            'contentTitle' => 'required',
            'contentType' => 'required'
        ]);
        $scontent = $request->post('content');
        $dom = new \DomDocument();
        $dom->loadHtml($scontent, LIBXML_NOERROR);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            $fileName = $image->getAttribute('data-filename');
            if (explode(':', $data)[0]==="data")
            {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $imgeData = base64_decode($data);
                $image_name= "" . time()."-".$fileName;
                $path = resource_path() ."/images/". $image_name;
                file_put_contents($path, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', asset('resources')."/images/".$image_name);
            }

        }
        $audioFile = $dom->getElementsByTagName('audio');
        foreach($audioFile as $item => $audio){
            $data = $audio->getAttribute('src');
            $fileName = $audio->getAttribute('data-filename');

            if (explode(':', $data)[0]==="data")
            {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $audioData = base64_decode($data);
                $audio_name= "" . time()."-".$fileName;
                $path = resource_path() ."/audios/". $audio_name;
                file_put_contents($path, $audioData);

                $audio->removeAttribute('src');
                $audio->setAttribute('src', asset('resources')."/audios/".$audio_name);
            }

        }
        $scontent = $dom->saveHTML();
        $content = Content::find($id);
        $content->update(['content' => $scontent, 'content_type' => $request->post('contentType'), 'answer_type' => $request->post('answerType'), 'content_title' => $request->post('contentTitle'),  'section_id' => $request->post('selectedSectionID'), 'rank' => DB::table('contents')->max('rank')+1]);
        return Redirect::route('contents', ["selectedSectionID"=>$request->post('selectedSectionID')])->with('success', 'Content updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $selectedSectionID)
    {
        $content = Content::find($id);
        $content->delete();
        return Redirect::route('contents', ["selectedSectionID"=>$selectedSectionID])->with('success', 'Content deleted successfully!');
    }
}
