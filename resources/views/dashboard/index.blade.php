@extends('layouts.base')
@section('content')


<div class="container">
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-center"><h1><i class="bi bi-receipt-cutoff text-dark"></i></h1>
                    <h4 class="text-center text-dark" >Invoices</h3></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-center"><h1><i class="bi bi-people text-dark"></i></h1>
                    <h4 class="text-center text-dark" >Custumers</h3></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('products')}}" class="text-center"><h1><i class="bi bi-bag-fill text-dark"></i></h1>
                    <h4 class="text-center text-dark" >Products</h3></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
