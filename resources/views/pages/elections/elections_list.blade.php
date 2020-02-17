@extends('layouts.app', ['activePage' => 'election', 'titlePage' => __('Election List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Election') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage elections') }}</p>
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
                                    <a href="{{ route('election.create') }}" class="btn btn-sm btn-primary">{{ __('Add election') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Name') }}
                                    </th>
                                    <th>
                                        {{ __('Status') }}
                                    </th>
                                    <th>
                                        {{ __('Description') }}
                                    </th>
                                    <th>
                                        {{ __('Voting Date') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($elections as $election)
                                        <tr>
                                            <td>
                                                {{ $election->name }}
                                            </td>
                                            <td>
                                                {{ $election->status }}
                                            </td>
                                            <td>
                                                {{ $election->description }}
                                            </td>
                                            <td>
                                                {{ $election->voting_date }}
                                            </td>
                                            <td class="td-actions text-right">
                                                @if ($election->id)
{{--                                                    @if ($election->id != auth()->id())--}}
                                                    <form action="{{ route('election.destroy', $election) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('startElection', $election) }}" data-original-title="{{(($election->status == 'running') ? 'stop election': ($election->status == 'pending' ? 'start election' : 'restart election'))}}" title="">
                                                            <i class="material-icons">settings_power</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('election.edit', $election) }}" data-original-title="edit" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="delete" onclick="confirm('{{ __("Are you sure you want to delete this election?") }}') ? this.parentElement.submit() : ''">
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
