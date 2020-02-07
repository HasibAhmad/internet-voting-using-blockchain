@extends('layouts.app', ['activePage' => 'voter', 'titlePage' => __('Voter Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('voter.update', $voter) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Voter') }}</h4>
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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $voter->name) }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $voter->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Public Key') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('public_key') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('public_key') ? ' is-invalid' : '' }}" name="public_key" id="input-name" type="text" placeholder="{{ __('public_key') }}" value="{{ old('public_key', $voter->public_key) }}" required="true" aria-required="true"/>
                      @if ($errors->has('public_key'))
                        <span id="public_key-error" class="error text-danger" for="input-name">{{ $errors->first('public_key') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Bitcoin Address') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('bitcoin_address') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('bitcoin_address') ? ' is-invalid' : '' }}" name="bitcoin_address" id="input-bitcoin_address" type="text" placeholder="{{ __('bitcoin_address') }}" value="{{ old('public_key', $voter->bitcoin_address) }}" required="true" aria-required="true"/>
                                @if ($errors->has('bitcoin_address'))
                                    <span id="bitcoin_address-error" class="error text-danger" for="input-bitcoin_address">{{ $errors->first('bitcoin_address') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Network') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('network') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('network') ? ' is-invalid' : '' }}" name="network" id="input-network" type="text" placeholder="{{ __('network') }}" value="{{ old('network', $voter->network) }}" required="true" aria-required="true"/>
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
@endsection
