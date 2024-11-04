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
                        @if($user->team_id)
                            <td>{{App\Models\Team::find($user->team_id)->name}}</td>
                        @else
                            <td>{{App\Models\User::find($user->user_id)->user_name}}</td>
                        @endif
                        <td></td>
                        <td class="text-right">{{$user->points}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
