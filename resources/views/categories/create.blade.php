@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
