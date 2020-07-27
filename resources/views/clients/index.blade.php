@extends('home')@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">  
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}  
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <h3 class="my-3">{{ __('Clients') }}</h3>
            <a class="btn btn-link float-right" href="{{ route('client.create') }}">{{ __('Add Client') }}</a>
            <div class="table-responsive">
                <table id="tabulator" class="table table-light table-striped border rounded">
                    <thead>
                        <tr>
                            <th tabulator-headerFilter="true">{{ __('Name') }}</th>
                            <th tabulator-headerFilter="true">{{ __('Company') }}</th>
                            <th tabulator-headerFilter="true">{{ __('Number') }}</th>
                            <th tabulator-headerFilter="true">{{ __('Email') }}</th>
                            <th colspan = 2 tabulator-formatter="html">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client as $clients)
                        <tr>
                            <td>{{$clients->first_name}} {{$clients->last_name}}</td>
                            <td>{{$clients->company}}</td>
                            <td>{{$clients->number}}</td>
                            <td>{{$clients->email}}</td>
                            <td>
                                <a href="{{ route('client.edit',$clients->id)}}" class="btn btn-link">{{ __('Edit') }}</a>
                            </td>
                            <td>
                                <form action="{{ route('client.destroy', $clients->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link" type="submit">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection