
@extends('Layout/app')
@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h3 class="text-white text-capitalize ps-3">Usuarios</h3>
                </center>
                <div class="float-end">  
                    {{-- Button del modal --}}                
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus-circle"></i>
                      </button>
                  </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <div class="container">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">  
        <div class="modal-header-center">
          <br>
          <h5 class="modal-title text-center" id="exampleModalLabel">Ingresa Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button>
        </div>
        <div class="modal-body">
          <div class="container">
          <div class="row">
            <form action="{{ route('user.store') }}" method="POST">
              {{ csrf_field() }} 
                <label class= "col" for="">Usuario:</label>
                <input class="col from-control" type="text" name="name" placeholder="Nombre">
      </div>
          <center>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
</center>
        <!-- </div> -->
      </form>
    </div>
  </div>
      </div>
    </div>
  </div>
      <div class="row">
                <table class="table align-items-center mb-0">
            <thead>
                <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Clave</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opciones</th>
                </tr>  
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    <div class="d-flex">
                        <button type='button' class="btn btn-primary"><i class="far fa-eye"></i></button>
                        <a type="button" href="" class="btn  btn-success" 
                          data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="fas fa-pen-square"></i></a>
                        <form action="{{ route('user.destroy', $user) }}" method="POST">
                          @method('DELETE')
                          @csrf
                        <button type='submit' class="btn btn-danger"                  
                        onClick="return confirm('estas seguro  a eliminar el registro?')">
                        <i class="far fa-trash-alt"></i>
                      </button>           
                    </form>
                  </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <!-- render paginate -->
        {{$users->links()}}
    </div>
</div>
@endsection