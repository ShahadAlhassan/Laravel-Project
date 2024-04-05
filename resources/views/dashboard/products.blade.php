@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-10">
            <form  action="{{route('search')}}" method="post">
                @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control">
                <div class="input-group-append">
                <button  class="btn btn-primary m-1" type="submit" >Search</button>
                </div>
              </div>
            </form>

        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-9">
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
         Add New Product
        </button>
  

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Add New Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('creatproducts')}}" method="post">
                @csrf
                <label for="exampleFormControlInput1" class="form-label text-dark">Product Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="proudctname">
                <button type="submit" class="btn btn-info mt-2" >Save</button>
                <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Cancel</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>   
        </div>
        <div class="col-sm-3" >  
            <a href="{{route('showall')}}" class="text-center"><button class="btn btn-outline-danger mt-2" type="submit">Show All</button></a>
        </div>
    </div>

   

    <div class="row mt-3 text-dark">
        <div class="col">
            <div class="card">
                <div class="card-body bg-white">
                    <span class="text-danger text-center"> {{Session::get('data')}}</span>
                    <table class="table table-bordered text-center">
                       
                    <thead >
                            <th>ID</th>
                            <th>Product Name</th>
                            <th colspan="2">Actions</th>
                        </thead>
                        <tbody >
                          @foreach($products as $items)  
                            <tr>
                                <td>{{$items->id}}</td>
                                <td>{{$items->proudctname}}</td>
                                <td><a href="{{route('del',['id'=>$items['id']])}}"> <i class="bi bi-trash text-danger" aria-hidden="true"></i></a></td>
                                <td><a href="{{route('edit',['id'=>$items['id']])}}"> <i class="bi bi-pencil-square text-primary"></i></a></td>

                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
