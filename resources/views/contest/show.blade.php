@extends('components.layout')

@section('content')
    <div>
        <h3>
            {{$contest->name}}
        </h3>
    </div>
    <div>
        <p>{!! $contest->description !!}</p>
        <br>
        <div >
            Criado por: <a href="/?user={{ $contest->created_by }}#">{{ $contest->created_by }}</a>
        </div>
        <form action="/contest/{{ $contest->id }}" method="post">
            @csrf
            <input type="submit" class="btn btn-primary btn-block" value="Register>>">
        </form>
        </div>
        <br>
        <div>
            <table class="table">
                <caption>Participantes registrados:</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuário</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contest->users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->user_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection