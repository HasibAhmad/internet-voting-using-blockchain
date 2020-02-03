@extends('layouts.app', ['activePage' => 'blockchain', 'titlePage' => __('blockchain')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('blockchain management') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage blockchain') }}</p>
{{--                            <p class="card-category"> {{ App\blockChain::demo() }}</p>--}}
                        </div>
                        <div class="card-body">
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('network') }}
                                    </th>
                                    <th>
                                        {{ __('networkBalance') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ $network }}
                                            </td>
                                            <td>
                                                {{ $networkBalance }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Available addresses') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage addresses') }}</p>
                            {{--                            <p class="card-category"> {{ App\blockChain::demo() }}</p>--}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="/getAddress" class="btn btn-sm btn-primary">{{ __('Get New Address') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('User ID') }}
                                    </th>
                                    <th>
                                        {{ __('Address') }}
                                    </th>
                                    <th>
                                        {{ __('Label') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($addresses as $address)
                                        <tr>
                                            <td>
                                                {{ $address->user_id }}
                                            </td>
                                            <td>
                                                {{ $address->address }}
                                            </td>
                                            <td>
                                                {{ $address->label }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
