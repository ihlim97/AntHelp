@extends('layouts.app', ['showCurator', true])

@section('content')
    <h1>{{$service->category}}</h1>
    <p class="text-muted">Created by {{$service->user_id}}</p>
    <p>{{$service->description}}</p>
@endsection