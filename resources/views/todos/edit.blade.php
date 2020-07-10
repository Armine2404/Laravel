@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <!-- general form elements -->
        <div class="col-md-8">
            <x-alert />
            <div class="card card-success">

                <div class="card-header text-center">
                    <h3 class="card-title">Update TODO {{$todo->title}}</h3>

                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('todo.update',$todo->id)}}">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">

                            <input type="text" class="form-control" id="text" name="title" value="{{$todo->title}}"><br>
                            <textarea class="form-control" name="description">{{$todo->description}}</textarea>
                        </div>
                    @livewire('edit-step', ['steps' => $todo->steps])
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" value="Create" class="btn btn-primary">Update</button>
                        <a href="/todos" class="btn btn-secondary ">Back</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection