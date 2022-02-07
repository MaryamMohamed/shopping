@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Products</h1>
    </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List Of Products</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn btn-success">Create New Product</a>
        </div>
      </div>
      <div class="box-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">In Stock</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $key => $product)
              @php
                  $images = $product->getMedia();
                  //dd($image[0])
              @endphp
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->description }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                      @foreach ($images as $image)
                      <img src="{{url( $image->getUrl())  }}" width="100" height="100" class="" alt=""></td>
                      @endforeach
                  <td>
                        <div class="btn">
                          <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                        <form class="btn" method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
