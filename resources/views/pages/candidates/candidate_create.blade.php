@extends('layouts.app', ['activePage' => 'candidate', 'titlePage' => __('Add candidate')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('candidate.store') }}" autocomplete="off"
                          class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add candidate') }}</h4>
                                <p class="card-category">{{ __('candidate information') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name" id="input-name" type="text"
                                                   placeholder="{{ __('Name') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                      for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email" id="input-email" type="email"
                                                   placeholder="{{ __('Email') }}" required/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                      for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                name="description" id="input-description" type="text"
                                                placeholder="{{ __('Description') }}" required="true"
                                                aria-required="true"/>
                                            @if ($errors->has('description'))
                                                <span id="description-error" class="error text-danger"
                                                      for="input-description">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Election Id') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('election_id') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('election_id') ? ' is-invalid' : '' }}"
                                                name="election_id" id="input-election_id" type="text"
                                                placeholder="{{ __('election_id') }}" required="true"
                                                aria-required="true"/>
                                            @if ($errors->has('election_id'))
                                                <span id="election_id-error" class="error text-danger"
                                                      for="input-election_id">{{ $errors->first('election_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Photo') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-file-upload form-file-simple">
                                            <input type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" id="input-photo" required="true"
                                                   aria-required="true">
                                            @if ($errors->has('photo'))
                                                <span id="photo-error" class="error text-danger"
                                                      for="input-photo">{{ $errors->first('photo') }}</span>
                                            @endif
                                            <div id="upload-image-preview">
                                            </div>
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
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // $("#cost_price").inputmask('Regex', {regex: "^[0-9]*(\\.\\d{1,})?$"});
            // $("#selling_price").inputmask('Regex', {regex: "^[0-9]*(\\.\\d{1,})$"});
            // $("#offer_price").inputmask('Regex', {regex: "^[0-9]*(\\.\\d{1,})?$"});
            // $("#quantity").inputmask('Regex', {regex: "^[1-9]+$"});
            $(function () {
                function readURL(input) {
                    if (input.files && input.files.length==1) {
                        var flag = 1;
                        var file = input.files;
                        var reader = new FileReader();
                        var name = file[0].name;
                        var filename = name.split(".");
                        var extension = filename[filename.length - 1];
                        if (!extension.match(/(jpg|jpeg|png|gif)$/i)){
                            $("input[type=file]").val("");
                            $(".alert-image").text("The upload images must be an image of type: jpeg, png, jpg.");
                            flag = 0;
                            $('#upload-image-preview').empty();
                            return false;
                        } else {
                            $(".alert-image").text("");
                        }
                        reader.readAsDataURL(file[0]);
                        if (flag) {
                            $(".alert-image").text("");
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = e.target.result;
                                var name = file.name;
                                var content = '<div class="form-group col-md-4" style="margin-left: 0px;margin-right: 0px;"><img src="' + img + '" width="100px" height="100px" />';
                                $('#upload-image-preview').empty();
                                $('#upload-image-preview').append(content);
                            }
                            reader.readAsDataURL(file[0]);
                        }
                    } else {
                        $('#upload-image-preview').empty();
                    }
                }
                $("#input-photo").change(function () {
                    readURL(this);
                });
            });
        });
    </script>
@endsection
