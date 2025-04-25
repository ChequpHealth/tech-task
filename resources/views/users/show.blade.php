@extends('layouts.app')

@section('title')
    <a href="{{ route('users.index') }}">Users</a> - {{ $user->name }} {{ $user->surname }}
@endsection

@section('actions')
    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('users.destroy', $user) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this user?')">
            Delete
        </button>
    </form>
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="p-5 border rounded shadow text-center">
            @if($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" width="150">
            @endif
            <h2>{{ $user->name }} {{ $user->surname  }}</h2>
            <p>{{ $user->email }}</p>
            <p>{{ $user->gender }}</p>
            <p>{{ $user->phone }}</p>
            <p>{{ $user->country }}</p>
        </div>
    </div>
@endsection
