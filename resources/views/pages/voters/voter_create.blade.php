@extends('layouts.app', ['activePage' => 'voter', 'titlePage' => __('Add Voter')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('voter.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

              <div class="card ">
                  <div class="card-header card-header-primary">
                      <h4 class="card-title">{{ __('Add Voter') }}</h4>
                      <p class="card-category">{{ __('Voter information') }}</p>
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
{{--                      <div class="row">--}}
{{--                        <label class="col-sm-2 col-form-label">{{ __('Election id') }}</label>--}}
{{--                        <div class="col-sm-7">--}}
{{--                          <div class="form-group{{ $errors->has('election_id') ? ' has-danger' : '' }}">--}}
{{--                            <input type="number" class="form-control{{ $errors->has('election_id') ? ' is-invalid' : '' }}" name="election_id" id="input-election-id" type="text" placeholder="{{ __('Election Id') }}" required="true" aria-required="true"/>--}}
{{--                            @if ($errors->has('election_id'))--}}
{{--                              <span id="election-id-error" class="error text-danger" for="input-election-id">{{ $errors->first('election_id') }}</span>--}}
{{--                            @endif--}}
{{--                          </div>--}}
{{--                         </div>--}}
{{--                      </div>--}}
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Election') }}</label>
                          <div class="col-sm-7">
                              <select class="form-control{{ $errors->has('election_name') ? ' is-invalid' : '' }}" name="election_id" id="input-election-id" type="text" data-style="btn btn-link"
                                      id="exampleFormControlSelect1" required="true" aria-required="true">
                                  @foreach($elections as $election)
                                      <option value="{{$election->id}}">{{ $election->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Bitcoin Address') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('bitcoin_address') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('bitcoin_address') ? ' is-invalid' : '' }}" name="bitcoin_address" id="input-bitcoin-address" type="text" placeholder="{{ __('Bitcoin Address') }}" required="true" aria-required="true"/>
                                  @if ($errors->has('bitcoin_address'))
                                      <span id="bitcoin-address-error" class="error text-danger" for="input-bitcoin_address">{{ $errors->first('bitcoin_address') }}</span>
                                  @endif
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <label class="col-sm-2 col-form-label">{{ __('Network') }}</label>
                          <div class="col-sm-7">
                              <div class="form-group{{ $errors->has('network') ? ' has-danger' : '' }}">
                                  <input class="form-control{{ $errors->has('network') ? ' is-invalid' : '' }}" name="network" id="input-network" type="text" placeholder="{{ __('Network') }}" required="true" aria-required="true"/>
                                  @if ($errors->has('network'))
                                      <span id="network-error" class="error text-danger" for="input-network">{{ $errors->first('network') }}</span>
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
