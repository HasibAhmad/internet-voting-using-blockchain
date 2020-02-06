@extends('layouts.app', ['activePage' => 'election', 'titlePage' => __('Add Election')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('election.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

              <div class="card ">
                  <div class="card-header card-header-primary">
                      <h4 class="card-title">{{ __('Add election') }}</h4>
                      <p class="card-category">{{ __('election information') }}</p>
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
                        <label class="col-sm-2 col-form-label">{{ __('Status') }}</label>
                        <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
{{--                            <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status" type="status" placeholder="{{ __('status') }}" required />--}}
                            <select class="form-control" data-style="btn btn-link" id="exampleFormControlSelect1">
                                <option>pending</option>
                                <option>running</option>
                                <option>completed</option>
                            </select>
                            @if ($errors->has('status'))
                              <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
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
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Voting Date') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('voting_date') ? ' has-danger' : '' }}">
                                  <input type="datetime-local" class="form-control{{ $errors->has('voting_date') ? ' is-invalid' : '' }}" name="voting_date" id="input-voting_date" type="text" required="true" aria-required="true"/>
                                  @if ($errors->has('voting_date'))
                                      <span id="voting_date-error" class="error text-danger" for="input-voting_date">{{ $errors->first('voting_date') }}</span>
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
