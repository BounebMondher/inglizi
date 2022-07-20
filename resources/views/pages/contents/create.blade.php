@extends('layouts.app', ['activePage' => 'sections', 'titlePage' => __('Create Content')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('contents.store') }}" autocomplete="off" enctype="multipart/form-data" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Create Content') }}</h4>
                                <p class="card-category">{{ __('Content information') }}</p>
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
                                        <label class="col-sm-2 col-form-label">{{ __('Content title') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('contentTitle') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('contentTitle') ? ' is-invalid' : '' }}" name="contentTitle" id="input-contentTitle" type="text" placeholder="{{ __('content Title') }}" value="{{ old('contentTitle') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('contentTitle'))
                                                    <span id="name-error" class="error text-danger" for="input-contentTitle">{{ $errors->first('contentTitle') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Content Type') }}</label>
                                        <div class="col-sm-7">
                                            <div class="{{ $errors->has('contentType') ? ' has-danger' : '' }}">
                                                <select class="{{ $errors->has('contentType') ? ' is-invalid' : '' }}" name="contentType" data-live-search="true" id="input-contentType">
                                                    <option value="text">Rich Text</option>
                                                    <option value="question">Question</option>
                                                </select>
                                                @if ($errors->has('contentType'))
                                                    <span id="name-error" class="error text-danger" for="input-contentType">{{ $errors->first('contentType') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Answer Type (if content is a question)') }}</label>
                                        <div class="col-sm-7">
                                            <div class="{{ $errors->has('answerType') ? ' has-danger' : '' }}">
                                                <select class="{{ $errors->has('answerType') ? ' is-invalid' : '' }}" name="answerType" data-live-search="true" id="input-answerType">
                                                    <option value="text">Text</option>
                                                    <option value="image">Images</option>
                                                </select>
                                                @if ($errors->has('answerType'))
                                                    <span id="name-error" class="error text-danger" for="input-answerType">{{ $errors->first('answerType') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Content') }}</label>
                                        <div class="col-sm-7" id="content-div">
                                            <div class="form-group{{ $errors->has('content') ? ' has-danger' : '' }}">
                                                <textarea class="summernote-textarea" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="input-content" required="true" aria-required="true">{{old('content')}}</textarea>
                                                @if ($errors->has('content'))
                                                    <span id="name-error" class="error text-danger" for="input-content">{{ $errors->first('content') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" name="selectedSectionID" value="{{$selectedSectionID}}"/>
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
    </script>
@endsection