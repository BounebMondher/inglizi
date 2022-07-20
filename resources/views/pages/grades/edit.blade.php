@extends('layouts.app', ['activePage' => 'grades', 'titlePage' => __('Edit Grade')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('grades.update', ['id' => $grade['id']]) }}" autocomplete="off" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Grade') }}</h4>
                                <p class="card-category">{{ __('Grade information') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Grade') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('grade') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('grade') ? ' is-invalid' : '' }}" name="grade" id="input-name" type="text" placeholder="{{ __('Grade') }}" value="{{ old('grade', $grade['grade']) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('grade'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('grade') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                                    <div class="col-sm-7">
                                            <div class="form-group">
                                             <input class="form-control" name="enabled" id="input-enabled" type="checkbox" {{$grade['enabled'] ? "checked" : ""}} />
                                        </div>
                                    </div>
                                </div>
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