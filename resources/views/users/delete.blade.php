@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete User</h1>
        <p>Are you sure you want to delete this user?</p>
        <p><strong>{{ $user->name }}</strong></p>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
