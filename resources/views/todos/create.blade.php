@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!-- general form elements -->
        <div class="col-md-6">
            <x-alert />
            <div class="card card-success">

                <div class="card-header text-center">
                    <h3 class="card-title">CREATE NEW TODO</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="/todo/create">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                         <label>DESCRIPTION</label> 
                            <input type="text" class="form-control" id="text" name="title" placeholder="Enter Todo Name"><br> 
                            <label>DESCRIPTION</label> 
                            <textarea rows="10" cols="10" class="form-control" id="text" name="description" >
                            </textarea>
                            @livewire('step')  
                           
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer justify-content-between">
                        <button type="submit" value="Create" class="btn btn-primary" >ADD</button>
                        <a href="/todos" class="btn btn-secondary "><<</a>
                    </div>
                </form>
           
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection