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
    <div class="col-10">
        <div class="col-12">
            <div class="card shadow">
                <x-alert />
                <div class="card-header bg-secundary text-center">
                    <h3 class="card-title">CUENTANOS SOBRE SU EXPERENCIA</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover" style = "font-size:12px; font-family:ariel">
                        <thead>
                            <tr>
                                <th></th>
                                <th>BAJO</th>
                                <th>MEDIO</th>
                                <th>ALTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form method="post" action="{{route('encuesta.create')}}">
                                @csrf

                                <tr>
                                    <td>DISEÑO </td>
                                    <td><input type="radio" id="deseño1" name="diseño" value="1"></td>
                                    <td><input type="radio" id="diseño2" name="diseño" value="2"></td>
                                    <td><input type="radio" id="diseño3" name="diseño" value="3"></td>
                                </tr>
                                <tr>
                                    <td>DESARROLLO </td>
                                    <td><input type="radio" id="desarrollo1" name="desarrollo" value="1"></td>
                                    <td><input type="radio" id="desarrollo2" name="desarrollo" value="2"></td>
                                    <td><input type="radio" id="desarrollo3" name="desarrollo" value="3"></td>
                                </tr>
                                <tr>
                                    <td>VELOCIDAD </td>
                                    <td><input type="radio" id="funcion1" name="funcionamiento" value="1"></td>
                                    <td><input type="radio" id="funcion2" name="funcionamiento" value="2"></td>
                                    <td><input type="radio" id="funcion3" name="funcionamiento" value="3"></td>
                                </tr>
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div><br><br>
            <!-- /.card -->
            <div class="text-center">
                <button class="btn btn-outline-info waves-effect" type="submit">GUARDAR</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
</div>

@endsection