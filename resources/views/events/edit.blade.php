@extends('layouts.base')
@section('title',"Alterando evento: $event->name")
@section('content')
    {!! Form::model($event, ['route' => ['admin.event_post',$event->id]]) !!}
    {!! Form::hidden('id') !!}
    <div class="form-group">
        {!! Form::label('name', 'Nome evento:') !!}
        {!! Form::text('name',null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        @foreach($privacy as $value)
            @php $priv[$value->id] = $value->name @endphp
        @endforeach
        {!! Form::label('privacy_event_id', 'Privacidade do evento:') !!}
        {!! Form::select('privacy_event_id',$priv, $event->public_event_id,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Local do evento:') !!}
        {!! Form::text('location',null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('presentation', 'Mensagem de apresentação evento:') !!}
        {!! Form::text('presentation',null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Alterar!', ['class'=>'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{route('admin.events')}}" role="button">Voltar ao eventos</a>
    {!! Form::close() !!}
@endsection
