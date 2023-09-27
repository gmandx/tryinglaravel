@extends('users.layouts')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Test CRUD using Laravel</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('users/create') }}" class="btn btn-success btn-sm">Add User</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class = "table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $item)
                                        <tr>
                                            <td>{{ $loop -> iteration }}</td>
                                            <td>{{ $item -> id }}</td>
                                            <td>{{ $item -> name }}</td>
                                            <td>{{ $item -> email }}</td>
                                            <td>
                                                <a href="{{ url('/users/'.$item->id) }}" title="View"><button class="btn btn-info btn-sm">View</button></a>
                                                <a href="{{ url('/users/'.$item->id.'/edit') }}" title="Edit"><button class="btn btn-primary btn-sm">Edit</button></a>
                                                <form method="POST" action="{{ url('/users/'.$item->id) }}"style="display:inline">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" button class="btn btn-danger btn-sm" onclick="return confirm('Confirm delete user: {{ $item->name }}')">Delete</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection