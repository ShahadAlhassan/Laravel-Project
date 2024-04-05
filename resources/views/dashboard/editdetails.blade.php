@extends('layouts.base')
@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-body bg-white">
            <form action="{{route('updatedatails')}}" method="post">
                @csrf
                <div class="row mt-3 ">
                    
                    <div class="col">
                        <label for="pname" class="form-label text-dark ">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror "  id="pname" name="price" >
                       
                        <label for="pcolor" class="form-label text-dark">color</label>
                        <input type="text" class="form-control @error('color') is-invalid @enderror "  id="pcolor" name="color">
                       
                    </div>
                    <div class="col">
                        <label for="qty" class="form-label text-dark">Quantity</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty">
                       
                        <label for="description" class="form-label text-dark">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                      
                </div>
    
                <div class="row mt-3">
                    <div class="col text-center">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection