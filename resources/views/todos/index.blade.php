@extends('layouts.app')

@section('content')
<style>
.add {
    transition: 0.8s;
}

.add:hover {
    color: green;
    background-color: white
}
</style>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="col-12">
            <div class="text-center py-4">
                <a href="/create" class="btn btn-success  btn-sm  add">ADD TODO</a>
            </div>
            <div class="card shadow">
                <x-alert />
                <div class="card-header bg-success">
                    <h3 class="card-title">ALL TODOS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>COMPLITED</th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ACCIONS</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($todos as $todo)
                            <tr id="table_{{ $todo->id }}" class="todo_table">
                                <td> <span onClick="event.preventDefault();
                               document.getElementById({{$todo->id}}).
                               submit() " class="fas fa-check completar px-2" style="color:
                                    @if ($todo->completed =='NO COMPLETED')
                                    red @else green
                                    @endif">
                                        <form style="display:none" id="{{$todo->id}}" method="post"
                                            action="{{ route('todo.complete',$todo->id)}}">
                                            @csrf
                                            @method('put')
                                        </form> </td>
                                <td> {{$todo->title}}</td>
                                <td ><a href="#view" id="{{$todo->id}}" class="ver_todo text-center pl-4" data-toggle="modal"><i class="fas fa-eye " ></i></a></td>

                                <td>
                                    <a href="{{'/'.$todo->id.'/edit'}}"
                                        class="btn  btn-outline-success btn-xs edit_{{$todo->id}}"
                                        style="display:none">edit</a>
                                    <button class="btn  btn-outline-danger btn-xs delete_{{$todo->id}}" id="delete"
                                        style="display:none" data-id="{{$todo->id}}" cursor-pointer>delete</button>
                                </td>
                            </tr>
                            @empty
                            <div class="text-center">
                                <p>No Todos Added, Please Add One:)</p>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</div>
</div>
<!-- Modal to see the todo description -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
<div class="modal-dialog modal-notify modal-info" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header bg-success ">
         <p class="heading lead">DESCRIPTION</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p class="description"></p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a type="button" class="btn btn-outline-success waves-effect btn-xl" data-dismiss="modal">CLOSE</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
</div>

@endsection