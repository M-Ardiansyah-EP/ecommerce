@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Product</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Product Description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" placeholder="Product Price" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" required>
                    <!-- Tampilkan pesan validasi untuk gambar -->
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
