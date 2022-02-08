@extends('layouts.app')
@section('content')

<div class="container">
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
    @if($cart)
    <div class="box-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 0
                @endphp
              @foreach ($cart->items as $product)
                <tr>
                  <th scope="row">{{ ++$i }}</th>
                  <td>{{ $product['title'] }}</td>
                  <td>
                    <form  action="{{ route('user.cart.update', $product['id']) }}" method="POST">
                        <input type="number" name="quantity" id="quantity" value="{{ $product['quantity'] }}">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-primary btn-sm">Change</button>
                      </form>
                      <span class="text-danger">@error('quantity'){{ $message }}@enderror</span>
                  </td>
                  <td>
                      <form action="{{ route('user.cart.remove', $product['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm ">remove</button>
                      </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <form action="{{ route('user.cart.empty') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Empty The Cart</button>
            </form>
          </table>
      </div>
    @else
    <p>The cart is empty</p>
    @endif
    <a class="btn btn-success" href="{{ route('user.home') }}">Back</a>
</div>
@endsection
