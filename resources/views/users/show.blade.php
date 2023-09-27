@extends('users.layouts')
@section('content')

<div class='card' style='margin:20px'>
    <div class='card-header'>
        <h4>User Page</h4><a href='{{ url("/users") }}' class="btn btn-info">Back to Index</a>
    </div>
    <div class='card-body'>
        <h5 class='card-title'>Name: {{ $users -> name }}</h5>
        <p class='card-text'>Address: {{ $users -> email}}</p>
    </div>
</div>