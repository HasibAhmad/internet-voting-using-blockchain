@extends('layouts.app', ['activePage' => 'candidate', 'titlePage' => __('candidate Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('candidate.update', $candidate) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Candidate') }}</h4>
                <p class="card-category">{{ __('Candidate information') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $candidate->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $candidate->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('description') }}" value="{{ old('description', $candidate->description) }}" required="true" aria-required="true"/>
                            @if ($errors->has('description'))
                                <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Election Id') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('election_id') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('election_id') ? ' is-invalid' : '' }}" name="election_id" id="input-name" type="text" placeholder="{{ __('election_id') }}" value="{{ old('election_id', $candidate->election_id) }}" required="true" aria-required="true"/>
                            @if ($errors->has('election_id'))
                                <span id="election_id-error" class="error text-danger" for="input-name">{{ $errors->first('election_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Photo') }}</label>
                    <div class="col-sm-7">
                        <div class="form-file-upload form-file-simple">
{{--                             <input class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" id="input-name" type="text" placeholder="{{ __('photo') }}" value="{{ old('photo', $candidate->photo) }}" required="true" aria-required="true"/>--}}
                            <input type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" id="input-photo" required="true"
                                   aria-required="true" value="">
                             @if ($errors->has('photo'))
                                 <span id="photo-error" class="error text-danger" for="input-name">{{ $errors->first('photo') }}</span>
                             @endif
                            @if($candidate->photo)
                                <div id="upload-image-preview">
                                    <img id="img" src="{{url( 'storage/'.$candidate->photo) }}" class="col-sm-4" style="height:100px;width:150px;padding-left: 0px !important;" alt="--">
                                </div>
                            @endif
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
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function () {
                var img = $('#img').attr('src');
                img = "<div class='form-group col-md-4'  style='margin-left: 0px;margin-right: 0px;'>" +
                    "<img src='" + img + "' width='100px' height='100px' />";
                function readURL(input) {
                    if (input.files && input.files.length == 1) {
                        var flag = 1;
                        var file = input.files;
                        var reader = new FileReader();
                        var name = file[0].name;
                        var filename = name.split(".");
                        var extension = filename[filename.length - 1];
                        if (!extension.match(/(jpg|jpeg|png|gif)$/i)) {
                            $("input[type=file]").val("");
                            alert("Select valid image");
                            $(".alert-image").text("The upload images must be a image of type: jpeg, png, jpg.");
                            flag = 0;
                            $('#upload-image-preview').empty();
                            $('#upload-image-preview').append(img);
                            return false;
                        }
                        reader.readAsDataURL(file[0]);
                        $('#upload-image-preview').empty();
                        if (flag) {
                            $(".alert-image").text("");
                            var file = input.files;
                            reader.onload = function (e) {
                                var img = e.target.result;
                                var reader = new FileReader();
                                var content = "<div class='form-group col-md-4'  style='margin-left: 0px;margin-right: 0px;'>" +
                                    "<img src='" + img + "' width='100px' height='100px' />";
                                $('#upload-image-preview').empty();
                                $('#upload-image-preview').append(content);
                                reader.readAsDataURL(file[0]);
                            }
                        }
                    } else {
                        $('#upload-image-preview').empty();
                        $('#upload-image-preview').append(img);
                    }
                }
                $("#input-photo").change(function () {
                    readURL(this);
                });
            });
        </script>
@endsection
