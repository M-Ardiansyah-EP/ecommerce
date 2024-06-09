@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" placeholder="Category Name">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
