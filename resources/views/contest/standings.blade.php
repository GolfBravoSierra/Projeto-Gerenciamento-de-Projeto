@extends('components.contestnav')
@extends('components.layout')

@section('contestnav')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Participantes</th>
                <th scope="col"></th>
                <th scope="col">Pontuação</th>
            </tr>
        </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        @auth
                            @if($user->id == auth()->user()->id)
                                <td><a class="text-decoration-none fw-bold" href="/profile/{{ auth()->user()->id }}">{{ auth()->user()->user_name }}</a></td>
                            @else
                                <td>{{App\Models\User::find($user->user_id)->user_name}}</td>
                            @endif
                        @else
                            <td>{{App\Models\User::find($user->user_id)->user_name}}</td>
                        @endif
                        @if($user->team_id)
                            <td>{{App\Models\Team::find($user->team_id)->name}}</td>
                        @else
                            <td></td>
                        @endif
                        <td class="text-right">{{$user->points}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
