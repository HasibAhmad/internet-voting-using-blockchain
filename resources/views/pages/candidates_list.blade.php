@extends('layouts.app', ['activePage' => 'candidate', 'titlePage' => __('candidate List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Candidates') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage candidates') }}</p>
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
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('candidate.create') }}" class="btn btn-sm btn-primary">{{ __('Add Candidate') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Email') }}
                                    </th>
                                    <th>
                                        {{ __('Votes') }}
                                    </th>
                                    <th>
                                        {{ __('Description') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($candidates as $candidate)
                                        <tr>
                                            <td>
                                                {{ $candidate->name }}
                                            </td>
                                            <td>
                                                {{ $candidate->email }}
                                            </td>
                                            <td>
                                                {{ $candidate->votes }}
                                            </td>
                                            <td>
                                                {{ $candidate->description }}
                                            </td>
                                            <td class="td-actions text-right">
                                                @if ($candidate->id)
{{--                                                    @if ($voter->id != auth()->id())--}}
                                                    <form action="{{ route('voter.destroy', $candidate) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('candidate.edit', $candidate) }}" data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this candidate?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </form>
                                                @else
                                                    <a rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                @endif
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
