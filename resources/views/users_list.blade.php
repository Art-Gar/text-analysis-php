
@extends('layout')
@section('content')
    <h1>{{ $heading }}</h1>
    <div id="users_table">
        @unless(count($users) == 0)
            <table class="table table-bordered w-100">
                <thead>
                <tr>
                    <th scope="col">Vartotojas</th>
                    <th scope="col">Paštas</th>
                    <th scope="col">Rolė</th>
                </tr>
                </thead>
                <tbody style="font-size: 12px">
                @foreach($users as $user)
                    <tr>
                        <td>{{$user}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['role'] ? $user['role']['name'] : "None"}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Vartotojų nerasta</p>
        @endunless
    </div>
@endsection
