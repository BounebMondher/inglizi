@extends('layouts.app', ['activePage' => 'grades', 'titlePage' => __('Grades')])

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
                <h4 class="card-title ">Grades</h4>
                <p class="card-category"> Here you can find all the available grades</p>
              </div>
              <div class="col-md-2">
                <a class="round-button-filled float-right" href="{{ route('grades.create') }}"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="data-table" class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th class="no-search">Status</th>
                  <th class="no-search">Actions</th>
                </thead>
                <tbody>
                @foreach($grades as $grade)
                  <tr>
                    <td>
                      {{$grade['id']}}
                    </td>
                    <td>
                      {{$grade['grade']}}
                    </td>
                    <td>
                      @if($grade['enabled'] === 1)
                        <i class="material-icons material-icons-green">check_circle_outline</i>
                        @else
                        <i class="material-icons material-icons-red">highlight_off</i>
                      @endif
                    </td>
                    <td class="text-primary">
                      <a class="round-button" href="{{ route('units', ['selectedGradeID' => $grade['id']]) }}"><i class="material-icons">view_list</i>Explore Units</a>
                      <a class="round-button" href="{{ route('grades.edit', ['id' => $grade['id']]) }}"><i class="material-icons">mode_edit</i>Edit</a>
                      <a class="round-button" href="" data-route="{{route('grades.destroy', ['id'=>$grade['id']])}}" onclick="delete_grade(this, '{{$grade['id']}}', event)"><i class="material-icons">delete_outline</i>Delete</a>
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