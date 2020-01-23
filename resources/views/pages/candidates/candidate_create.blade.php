@extends('layouts.app', ['activePage' => 'candidate', 'titlePage' => __('Add candidate')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('candidate.store') }}" autocomplete="off" class="form-horizontal">
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
                                  <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" required="true" aria-required="true"/>
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
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" required />
                            @if ($errors->has('email'))
                              <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Votes') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('votes') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('votes') ? ' is-invalid' : '' }}" name="votes" id="input-name" type="text" placeholder="{{ __('Votes') }}" required="true" aria-required="true"/>
                                  @if ($errors->has('votes'))
                                      <span id="votes-error" class="error text-danger" for="input-name">{{ $errors->first('votes') }}</span>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Description') }}" required="true" aria-required="true"/>
                                  @if ($errors->has('description'))
                                      <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
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
    </div>
  </div>
@endsection
