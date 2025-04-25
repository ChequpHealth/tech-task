@extends('layouts.app')

@section('title')
    <a href="{{ route('users.index') }}">Users</a> - <a
        href="{{ route('users.show', $user) }}">{{ $user->name }} {{ $user->surname }}</a> - Edit
@endsection

@section('actions')
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="p-5 border rounded shadow">
            <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="firstname">First name</label>
                    <input name="name" id="firstname" value="{{ old('name', $user->name) }}" class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="surname">Surname</label>
                    <input name="surname" id="surname" value="{{ old('surname', $user->surname) }}"
                           class="form-control"><br>
                </div>
                <div class="form-group mb-4">
                    <label for="gender">Gender</label>
                    <select class="form-select" name="gender" id="gender">
                        <option selected>Select gender</option>
                        @foreach(['male', 'female'] as $gender)
                            <option
                                value="{{ $gender }}" {{ old('gender', $user->gender) == $gender ? 'selected' : '' }}>{{ ucfirst($gender) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                           class="form-control"><br>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control"><br>
                </div>
                <div class="form-group mb-4">
                    <label for="country">Country</label>
                    <select class="form-select" name="country" id="country">
                        <option selected>Select country</option>
                        @foreach(['UK', 'France', 'Germany', 'Spain'] as $country)
                            <option
                                value="{{ $country }}" {{ old('country', $user->country) == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="New Password (leave blank to keep current)">
                </div>
                <div class="form-group mb-4">
                    <label for="repeat-password">Repeat password</label>
                    <input type="password" name="password_confirmation" id="repeat-password" class="form-control">
                </div>
                @if($user->profile_image)
                    <p>Current image:</p>
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" width="100"><br>
                @endif
                <div class="form-group mb-4">
                    <label for="profile_image">Profile image</label>
                    <input type="file" class="form-control-file form-control" id="profile_image" name="profile_image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
