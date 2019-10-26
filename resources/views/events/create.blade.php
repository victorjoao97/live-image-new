@extends('layouts.base')
@section('title', 'Cadastrar evento')
@section('content')
    {!! Form::open(['method'=>'post','route' => ['admin.event_store']]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nome evento:') !!}
        {!! Form::text('name',null, ['class' => 'form-control', 'required'=> true]) !!}
    </div>
    <div class="form-group">
        @foreach($privacy as $value)
            @php $priv[$value->id] = $value->name @endphp
        @endforeach
        {!! Form::label('privacy_event_id', 'Privacidade do evento:') !!}
        {!! Form::select('privacy_event_id',$priv, null,['class'=>'form-control','required'=> true]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('location', 'Local do evento:') !!}
        {!! Form::text('location',null, ['class' => 'form-control', 'required'=> true]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('presentation', 'Mensagem de apresentação evento:') !!}
        {!! Form::text('presentation',null, ['class' => 'form-control', 'required'=> true]) !!}
    </div>
    {!! Form::submit('Cadastrar!', ['class'=>'btn btn-primary']) !!}
    <a class="btn btn-dark" href="{{route('admin.events')}}" role="button">Voltar ao eventos</a>
    {!! Form::close() !!}
@endsection

