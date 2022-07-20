@extends('layouts.app', ['activePage' => 'units', 'titlePage' => __('Create Unit')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('units.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Unit') }}</h4>
                                <p class="card-category">{{ __('Unit information') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Unit') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('unit') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('unit') ? ' is-invalid' : '' }}" name="unit" id="input-unit" type="text" placeholder="{{ __('Unit') }}" value="{{ old('unit') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('unit'))
                                                <span id="name-error" class="error text-danger" for="input-unit">{{ $errors->first('unit') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Grade') }}</label>
                                    <div class="col-sm-7">
                                        <div class="{{ $errors->has('grade') ? ' has-danger' : '' }}">
                                            <select class="{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" data-live-search="true" id="input-grade">
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
                                <input type="hidden" name="selectedGradeID" value="{{$selectedGradeID}}"/>
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
@endsection