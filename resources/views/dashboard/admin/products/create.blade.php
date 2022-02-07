@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>New Product</h1>
    </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <form action="{{ route('admin.products.store') }}" method="post"  enctype="multipart/form-data">
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf
         <div class="form-group">
             <label for="title">title</label>
             <input type="text" class="form-control" name="title" placeholder="" value="{{ old('title') }}">
             <span class="text-danger">@error('title'){{ $message }}@enderror</span>
         </div>
         <div class="form-group">
             <label for="description">description</label>
             <input type="text" class="form-control" name="description" placeholder="" value="{{ old('description') }}">
             <span class="text-danger">@error('description'){{ $message }}@enderror</span>
         </div>
         <div class="form-group">
             <label for="stock">stock</label>
             <input type="number" class="form-control" name="stock" placeholder="" value="{{ old('stock') }}">
             <span class="text-danger">@error('stock'){{ $message }}@enderror</span>
         </div>
         <div class="form-group">
            <input type="file" name="image" class="form-control">
         </div>
         <div class="form-group">
             <button type="submit" class="btn btn-success">create</button>
             <a href="{{ route('admin.products.index') }}" type="submit" class="btn btn-primary">Back</a>
         </div>
     </form>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
