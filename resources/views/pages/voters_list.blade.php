@extends('layouts.app', ['activePage' => 'voter', 'titlePage' => __('Voters List')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Voters') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage voters') }}</p>
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
                                    <a href="{{ route('voter.create') }}" class="btn btn-sm btn-primary">{{ __('Add voter') }}</a>
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
                                        {{ __('Public Key') }}
                                    </th>
                                    <th>
                                        {{ __('Bitcoin Address') }}
                                    </th>
                                    <th>
                                        {{ __('Network') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($voters as $voter)
                                        <tr>
                                            <td>
                                                {{ $voter->name }}
                                            </td>
                                            <td>
                                                {{ $voter->email }}
                                            </td>
                                            <td style=" width: 65em">
                                                <p style="overflow-x: auto; white-space: nowrap; width: 65em">
                                                    {{ $voter->public_key }}
                                                </p>
                                            </td>
                                            <td>
                                                {{ $voter->bitcoin_address }}
                                            </td>
                                            <td>
                                                {{ $voter->network }}
                                            </td>
                                            <td class="td-actions text-right">
                                                @if ($voter->id)
{{--                                                    @if ($voter->id != auth()->id())--}}
                                                    <form action="{{ route('voter.destroy', $voter) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('voter.edit', $voter) }}" data-original-title="" title="">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this voter?") }}') ? this.parentElement.submit() : ''">
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
