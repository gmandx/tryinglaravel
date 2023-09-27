@extends('users.layouts')

@section('content')
<div class="card" style="margin:20px">
        <div class="card-header">
            <h2>Edit User</h2>
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
            <form action=" {{ url('users/'.$users->id) }} " method = "POST">
                @csrf
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{ $users->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $users->password }}">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ $users->password }}">
                </div>
                <input type="submit" id="submit" class="btn btn-primary" name="Update">
                <a href='{{ url("/users") }}' class="btn btn-danger">Back to Index</a>"
            </form>
    </div> 
@endsection