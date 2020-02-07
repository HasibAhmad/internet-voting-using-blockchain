<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ __('IVBLOCK - Internet Voting using BlockChain') }}</title>
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
              name='viewport'/>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet"/>
    </head>
    <body class="{{ $class ?? '' }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text">
                            <h2 class="card-title ">{{ __('IVUB') }}</h2>
                        </div>
                        <div class="card-body">
                            <p class="card-text"> {{ __('Welcome to the IVUB voting portal') }}</p>
                            <p class="card-text"> {{ __('Voting is not started yet, comback at') }}
                                <span class="card-text text-rose">
                                    {{ $election_date }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
