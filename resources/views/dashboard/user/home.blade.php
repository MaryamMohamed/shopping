@extends('layouts.app')
@section('content')


<div class="container">
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
      </div>
      <div class="box-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $key => $product)
              @php
                  $images = $product->getMedia();
              @endphp
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td>{{ $product->title }}</td>
                  <td>{{ $product->description }}</td>
                  <td>
                      @foreach ($images as $image)
                      <img src="{{url( $image->getUrl())  }}" width="100" height="100" class="" alt="">
                      @endforeach
                   </td>
                   @if($product->stock !=0)
                  <td>
                        <div class="btn">
                          <a href="{{ route('user.cart.add', $product->id) }}" class="btn btn-success">Add To Cart</a>
                        </div>
                  </td>
                  @else
                  <td>Out Of Stock</td>
                  @endif
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
</div>
@endsection
