@extends('layouts.base')
@section('title', "Evento - $event->name")
@section('content')
    <div class="jumbotron">
        <h1 class="display-4">{{$event->name}}</h1>
        <p class="lead">Evento realizado em: {{$event->location}}</p>
        <p>Privacidade: {{$event->privacy_event['name']}}</p>
        <p>Texto de apresentação:
            <button type="button" class="btn btn-sm btn-primary" data-toggle="popover" title="Texto de apresentação" data-content="{{$event->presentation}}">Clique aqui</button></p>
        <hr class="my-4">
        <p> <span class="badge badge-primary">{{$event->created_at}}</span></p>
        <a class="btn btn-dark" href="{{route('admin.events')}}" role="button">Voltar ao eventos</a>
    </div>
@endsection

