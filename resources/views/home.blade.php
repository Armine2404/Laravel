@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card shadow ">
            <!-- los mensajes session estan en flash.blade.php -->
            <!-- @include('layouts.flash') -->
            <x-alert/>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <form action = "/upload" method = "post" enctype="multipart/form-data">
              @csrf
           
             <input type="file" name="image">
             <input type="submit" name="upload">
           

              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </div>
</div>
@endsection
