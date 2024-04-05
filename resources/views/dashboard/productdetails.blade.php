@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-10">
            <form  action="{{route('searchdetails')}}" method="post">
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
        <div class="col-sm-8">
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add New Product Details
        </button>
  

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Add New Product Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('create_details')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label for="product" class="text-dark">Select Product</label>
                        <select class="form-select" name="product" id="product" name="product">
                            @foreach($products as $item)
                            <option class="text-dark" value="{{$item->id}}">{{$item->proudctname}}</option>
                            @endforeach
                        </select>
                       
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                <label for="pname" class="form-label text-dark ">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror "  id="pname" name="price">
                @error('price')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                @enderror
                <label for="pcolor" class="form-label text-dark">color</label>
                <input type="text" class="form-control @error('color') is-invalid @enderror "  id="pcolor" name="color">
                @error('color')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                @enderror
            </div>
            <div class="col">
                <label for="qty" class="form-label text-dark">Quantity</label>
                <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty">
                @error('qty')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                @enderror
                <label for="description" class="form-label text-dark">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                @error('description')
                    <span class="invalid-feedback" role="alert">{{$message}}</span>
                @enderror
            </div>
            </div>
                <button type="submit" class="btn btn-info mt-2" >Save</button>
                <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Cancel</button>
                <div>
            </form>
        </div>
        </div>
        
      </div>
    </div>
    
   
  </div>   
        </div>
        <!-- <div class="col-sm-4" >  <a href="{{route('showall')}}" class="text-center"><button class="btn btn-outline-danger mt-2" type="submit">Show All</button></a>
        </div> -->
    </div>

   

    <div class="row mt-3 text-dark">
        <div class="col">
            <div class="card">
                <div class="card-body bg-white">
                    <table class="table table-bordered text-center">
                        <thead >
                            <th>ID</th>
                            <th>Product Details ID</th>
                            <th>Product Name</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Descripition</th>
                            <th colspan="2">Actions</th>
                        </thead>
                        <tbody >
                          @foreach($productsdetails as $items)  
                            <tr>
                               <td>{{$items->id}}</td>
                               <td>{{$items->productid}}</td>
                               <td>{{$items->proudctname}}</td>
                               <td>{{$items->color}}</td>
                               <td>{{$items->price}} SAR</td>
                               <td>{{$items->qty}}</td>
                               <td>{{$items->description}}</td>
                               <td><a href="{{route('delpdetails',['id'=>$items->id])}}"> <i class="bi bi-trash text-danger" aria-hidden="true"></i></a></td>
                               <td><a href="{{route('EditProductdetails',['id'=>$items->id])}}" > <i class="bi bi-pencil-square text-primary"></i></a></td>
                               
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
