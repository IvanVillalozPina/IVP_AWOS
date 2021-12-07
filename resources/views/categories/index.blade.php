@extends('Layout/app')
@section('content')
<div class="panel-body">
      @if (session('message'))
      <div class="alert alert-success alert-dismissible text-white" role="alert">
      <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>. {{ session('message') }}.</span>
      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>       
      @endif
      @if (session('alert'))
      <div class="alert alert-danger alert-dismissible text-white" role="alert">
      <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>. {{ session('alert') }}.</span>
      <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>       
      @endif
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h3 class="text-white text-capitalize ps-3">Categorias</h3>
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
          <h5 class="modal-title text-center" id="exampleModalLabel">Ingresa Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button>
        </div>
        <div class="modal-body">
          <div class="container">
          <div class="row">
            <form action="{{ route('category.store') }}" method="POST">
              {{ csrf_field() }} 
                <label class= "col" for="">Categoria:</label>
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
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opciones</th>
                </tr>  
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                      <td>
                      <div class="d-flex">
                        <button type='button' class="btn btn-primary"><i class="far fa-eye"></i></button>
                        <a type="button" href="{{route('category.edit',$category->id) }}" class="btn btn-success" 
                          data-bs-toggle="modal" data-bs-target="#modalUpdate"><i class="fas fa-pen-square"></i></a>
                        <form action="{{ route('category.destroy', $category) }}" method="POST">
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
          {{$categories->links()}}
          <!-- Modal ADD  STAR-->
          <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">  
                <div class="modal-header-center">
                  <br>
                  <center>
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria  </h5>
                  </center>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label=""></button>
                </div>
                <div class="modal-body">
                  <div class="container">
                  <div class="row">
                    <form action="{{ route('category.store') }}" method="POST">
                    {{-- generar el token para el envio de dato csrf --}}
                      {{ csrf_field() }} 
                        <label class= "col" for="">Categoria:</label>
                        <input class="col from-control" type="text" name="name" placeholder="Nombre">
              </div>
                  <center>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </center>
              </form>
            </div>
          </div>
              </div>
            </div>
          </div>
                      <!-- Modal ADD  END  -->
      </div>
  </div> 
    @endsection