@extends('layouts.app', ['activePage' => 'sections', 'titlePage' => __('Sections')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @if (session('success'))
            <div class="alert alert-success">
              {{session('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-md-10">
                  <h4 class="card-title ">Sections</h4>
                  <p class="card-category"> Here you can find all the available sections {!! $lesson ? "under the lesson : <b>".$lesson['lesson']."</b> (unit : ".$unit['unit'].", grade : ".$grade['grade']." )": "" !!}</p>
                </div>
                <div class="col-md-2">
                  <a class="round-button-filled float-right" href="{{ route('sections.create', ['selectedLessonID' => $lesson ? $lesson['id'] : null]) }}"><i class="material-icons">add</i></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="data-table" class="table">
                  <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Lesson</th>
                  <th>Unit</th>
                  <th>Grade</th>
                  <th class="no-search">Status</th>
                  <th class="no-search">Actions</th>
                  </thead>
                  <tbody>
                  @foreach($sections as $section)
                    <tr>
                      <td>
                        {{$section['id']}}
                      </td>
                      <td>
                        {{$section['section']}}
                      </td>
                      <td>
                        {{$section['lesson']}}
                      </td>
                      <td>
                        {{$section['unit']}}
                      </td>
                      <td>
                        {{$section['grade']}}
                      </td>
                      <td>
                        @if($section['enabled'] === 1)
                          <i class="material-icons material-icons-green">check_circle_outline</i>
                        @else
                          <i class="material-icons material-icons-red">highlight_off</i>
                        @endif
                      </td>
                      <td class="text-primary">
                        <a class="round-button" href="{{ route('contents', ['selectedSectionID' => $section['id']]) }}"><i class="material-icons">view_list</i>Explore Contents</a>
                        <a class="round-button" href="{{ route('sections.edit', ['id' => $section['id'], 'selectedLessonID' => $lesson ? $lesson['id'] : null]) }}"><i class="material-icons">mode_edit</i>Edit</a>
                        <a class="round-button" href="" data-route="{{route('sections.destroy', ['id'=>$section['id'], 'selectedLessonID' => $lesson ? $lesson['id'] : null])}}" onclick="delete_section(this, '{{$section['id']}}', event)"><i class="material-icons">delete_outline</i>Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection