@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Update Product</h1>
    </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="post">
        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif
        @csrf
        @method('PUT')
         <div class="form-group">
             <label for="title">title</label>
             <input type="text" class="form-control" name="title" placeholder="" value="{{ $product->title }}">
             <span class="text-danger">@error('title'){{ $message }}@enderror</span>
         </div>
         <div class="form-group">
             <label for="description">description</label>
             <input type="text" class="form-control" name="description" placeholder="" value="{{ $product->description }}">
             <span class="text-danger">@error('description'){{ $message }}@enderror</span>
         </div>
         <div class="form-group">
             <label for="stock">stock</label>
             <input type="number" class="form-control" name="stock" placeholder="" value="{{ $product->stock }}">
             <span class="text-danger">@error('stock'){{ $message }}@enderror</span>
         </div>
         <div class="form-group">
             <button type="submit" class="btn btn-success">Update</button>
             <a href="{{ route('admin.products.index') }}" type="submit" class="btn btn-primary">Back</a>
         </div>
     </form>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
