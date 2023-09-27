@extends('users.layouts')

@section('content')
    <div class="card" style="margin:20px">
        <div class="card-header">
            <h2>Create New User</h2>
        </div>
        <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action=" {{ url('users') }} " method = "POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="isAdmin" id="isAdmin" value="1">
                    <label class="form-check-label" for="isAdmin">Make this user Admin?</label>
                </div>
                <input type="submit" id="submit" class="btn btn-primary" name="Submit">
            </form>
    </div>
@endsection