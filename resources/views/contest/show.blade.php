@extends('components.layout')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>{{ $contest->title }}</h3>
        </div>
        <div class="card-body">
            <p>{!! $contest->description !!}</p>
            <div class="mb-3">
                Criado por: <a href="/?user={{ $contest->created_by }}#">{{ $contest->created_by }}</a>
            </div>
            <form action="/contest/{{ $contest->id }}" method="post">
                @csrf
                <input type="submit" class="btn btn-primary btn-block" value="Register">
            </form>
        </div>
        <div class="card-footer">
            <table class="table">
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
</div>
@endsection