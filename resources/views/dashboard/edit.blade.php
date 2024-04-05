@extends('layouts.base')
@section('content')

<div class="container">
   <div class="card mt-5">
    <div class="card-body bg-white">
        <form action="{{route('updateproduct')}}" method="post">
            @csrf
            <div class="row mt-3 ">
                <input type="hidden" name="id" value="{{$products['id']}}">
                
                <div class="col">
                    <label for="prname" class="text-dark " >Product Name </label>
                    <input type="text" name="proudctname" class="form-control p-1" id="prname" value="{{$products['proudctname']}}">
                </div>
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
