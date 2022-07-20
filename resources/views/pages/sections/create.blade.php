@extends('layouts.app', ['activePage' => 'sections', 'titlePage' => __('Create Section')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('sections.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Section') }}</h4>
                                <p class="card-category">{{ __('Section information') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('success'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('success') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Section') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('section') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('section') ? ' is-invalid' : '' }}" name="section" id="input-section" type="text" placeholder="{{ __('Section') }}" value="{{ old('section') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('section'))
                                                <span id="name-error" class="error text-danger" for="input-section">{{ $errors->first('section') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Grade') }}</label>
                                        <div class="col-sm-7">
                                            <div class="{{ $errors->has('grade') ? ' has-danger' : '' }}">
                                                <select class="{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" data-live-search="true" id="input-grade-lessons">
                                                    @foreach($grades as $grade)
                                                        <option {{$grade['id'] == $selectedGradeID ? "selected" : ""}} value="{{$grade['id']}}">{{$grade['grade']}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('grade'))
                                                    <span id="name-error" class="error text-danger" for="input-grade">{{ $errors->first('grade') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Unit') }}</label>
                                        <div class="col-sm-7">
                                            <div class="{{ $errors->has('unit') ? ' has-danger' : '' }}">
                                                <select class="{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" data-live-search="true" id="input-unit-lessons">
                                                    @foreach($units as $unit)
                                                        <option {{$unit['id'] == $selectedUnitID ? "selected" : ""}} value="{{$unit['id']}}">{{$unit['unit']}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('unit'))
                                                    <span id="name-error" class="error text-danger" for="input-unit">{{ $errors->first('unit') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Lesson') }}</label>
                                        <div class="col-sm-7">
                                            <div class="{{ $errors->has('lesson') ? ' has-danger' : '' }}">
                                                <select class="{{ $errors->has('lesson') ? ' is-invalid' : '' }}" name="lesson" data-live-search="true" id="input-unit-lesson-sections">
                                                    @foreach($lessons as $lesson)
                                                        <option {{$lesson['id'] == $selectedLessonID ? "selected" : ""}} value="{{$lesson['id']}}">{{$lesson['lesson']}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('lesson'))
                                                    <span id="name-error" class="error text-danger" for="input-lesson">{{ $errors->first('lesson') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" name="selectedLessonID" value="{{$selectedLessonID}}"/>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var grades = {!! json_encode($grades) !!};
        var selectedUnitID = "{{$selectedUnitID}}";
        var selectedLessonID = "{{$selectedLessonID}}";
    </script>
@endsection