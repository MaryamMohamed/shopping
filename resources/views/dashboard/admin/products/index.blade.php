@extends('layouts.admin')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Products</h3>

              <div class="box-tools pull-right">
                  <a href="{{ route('admin.products.create') }}" type="button" class="btn btn-default btn-flat">
                    <i class="fa">Create</i>
                  </a>
              </div>
            </div>
            <div class="box-body">
              Start creating your amazing application!
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div>
            <!-- /.box-footer-->
          </div>
    </section>
@endsection
