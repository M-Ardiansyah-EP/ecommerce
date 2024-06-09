@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Edit Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label for="description">Product Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Product Description" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" placeholder="Product Price" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
