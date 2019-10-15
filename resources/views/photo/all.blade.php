@extends('layouts.base')
@section('title', 'Eventos')
@section('content')
    @if(count($events))
        <table class="table table-hover table-bordered table-sm">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Local</th>
                <th scope="col">Público</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td scope="row">{{$event->id}}</td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->location}}</td>
                    <td>{{$event->public_event['name']}}</td>
                    <td>{{$event->created_at}}</td>
                    <td>
                        @if(!$event->trashed())
                            <a class="btn btn-primary btn-sm" href="{{route('admin.event_show',$event->id)}}"
                               title="Ver evento {{$event->id}}"><span
                                    data-feather="eye" title="Ver evento {{$event->id}}"></span></a>
                            <a class="btn btn-info btn-sm" href="{{route('admin.event_edit',$event->id)}}"
                               title="Editar evento {{$event->id}}"><span
                                    data-feather="edit" title="Editar evento {{$event->id}}"></span></a>
                            <a class="btn btn-danger btn-sm" href="{{route('admin.event_destroy',$event->id)}}"
                               onclick="event.preventDefault();if(confirm('Deseja realmente apagar?')===true)document.getElementById('form-destroy-{{$event->id}}').submit();"><span
                                    data-feather="trash"></span></a>
                            {!! Form::open(['route' => ['admin.event_destroy',$event->id], 'method'=>'DELETE', 'id'=>'form-destroy-'.$event->id]) !!}
                            {!! Form::hidden('id',$event->id) !!}
                            {!! Form::close() !!}
                        @else
                            <a class="btn btn-primary btn-sm" href="{{route('admin.event_restore',$event->id)}}"
                               onclick="event.preventDefault();if(confirm('Deseja realmente restaurar?')===true)document.getElementById('form-restore-{{$event->id}}').submit();"><span
                                    data-feather="refresh-cw"></span></a>
                            <a class="btn btn-danger btn-sm" href="{{route('admin.event_restore',$event->id)}}"
                               onclick="event.preventDefault();if(confirm('O evento será apagado permanentemente, você tem certeza?')===true)document.getElementById('form-destroyPerm-{{$event->id}}').submit();"><span
                                    data-feather="trash-2"></span></a>
                            {!! Form::open(['route' => ['admin.event_restore',$event->id], 'method'=>'POST', 'id'=>'form-restore-'.$event->id]) !!}
                            {!! Form::hidden('id',$event->id) !!}
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['admin.event_destroyPerm',$event->id], 'method'=>'DELETE', 'id'=>'form-destroyPerm-'.$event->id]) !!}
                            {!! Form::hidden('id',$event->id) !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$events->links()}}
        @if($trashed)
            @if($trashed == 'view')
            <a href="{{route('admin.events',['deleted'])}}" class="btn btn-secondary">Mostrar apagados</a>
                @elseif($trashed == 'hidden')
                <a href="{{route('admin.events')}}" class="btn btn-secondary">Esconder apagados</a>
                @endif
        @endif
    @else
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Ops....</h1>
                <p class="lead">Nenhum evento cadastrado</p>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="#" role="button">Cadastrar agora</a>
            </div>
        </div>
    @endif
@endsection

