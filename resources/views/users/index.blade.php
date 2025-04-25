@extends('layouts.app')

@section('title')
    Users
@endsection

@section('actions')
    <a href="{{ route('users.create') }}" class="btn btn-primary">Add new user</a>
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id; }}</th>
                <td>
                    <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                </td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
