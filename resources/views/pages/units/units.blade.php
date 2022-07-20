@extends('layouts.app', ['activePage' => 'units', 'titlePage' => __('Units')])

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
                  <h4 class="card-title ">Units</h4>
                  <p class="card-category"> Here you can find all the available units {!! $grade ? "under the grade : <b>".$grade['grade']."</b>": "" !!}</p>
                </div>
                <div class="col-md-2">
                  <a class="round-button-filled float-right" href="{{ route('units.create', ['selectedGradeID' => $grade ? $grade['id'] : null]) }}"><i class="material-icons">add</i></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="data-table" class="table">
                  <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Grade</th>
                  <th class="no-search">Status</th>
                  <th class="no-search">Actions</th>
                  </thead>
                  <tbody>
                  @foreach($units as $unit)
                    <tr>
                      <td>
                        {{$unit['id']}}
                      </td>
                      <td>
                        {{$unit['unit']}}
                      </td>
                      <td>
                        {{$unit['grade']}}
                      </td>
                      <td>
                        @if($unit['enabled'] === 1)
                          <i class="material-icons material-icons-green">check_circle_outline</i>
                        @else
                          <i class="material-icons material-icons-red">highlight_off</i>
                        @endif
                      </td>
                      <td class="text-primary">
                        <a class="round-button" href="{{ route('lessons', ['selectedUnitID' => $unit['id']]) }}"><i class="material-icons">view_list</i>Explore Lessons</a>
                        <a class="round-button" href="{{ route('units.edit', ['id' => $unit['id'], 'selectedGradeID' => $grade ? $grade['id'] : null]) }}"><i class="material-icons">mode_edit</i>Edit</a>
                        <a class="round-button" href="" data-route="{{route('units.destroy', ['id'=>$unit['id'], 'selectedGradeID' => $grade ? $grade['id'] : null])}}" onclick="delete_unit(this, '{{$unit['id']}}', event)"><i class="material-icons">delete_outline</i>Delete</a>
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