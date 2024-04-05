@extends('layouts.app')
@section('content')

<section class="py-5">
    <div class="container">
        <div class="card p-3 border border-secondary">
            <div class="card-body">
                <div class="row gx-5">
                    <aside class="col-lg-6">
                      <div class=" rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" >
                          <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"  src="/assets\images\{{$data->images}}" width="300" height="300" />
                        </a>
                      </div>
                     
                      <!-- thumbs-wrap.// -->
                      <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-lg-6">
                      <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{$data->description}}
                        </h4>
                        <div class="d-flex flex-row my-3">
                          <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                              4.5
                            </span>
                          </div>
                          <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                          <span class="text-success ms-2">In stock</span>
                        </div>
              
                        <div class="mb-3">
                          <span class="h5">{{$data->net}} SAR</span>
                          <span class="text-muted">/per box</span>
                        </div>
              
                       
              
                        <div class="row">
                          <dt class="col-3">Type:{{$data->proudctname}}</dt>
                          <dt class="col-3">Color: {{$data->color}}</dt>
                          <dt class="col-3">Brand:{{$data->proudctname}} </dt>
                         
                        </div>
              
                        <hr />
              
                       
                        <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                        <a href="{{route('add_to_cart',['id'=>$data->id])}}" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                      </div>
                      <div class="row m-3">                       
                        <a href="{{route('cartdetails',['id'=>$data->id])}}" class="btn btn-dark border border-secondary py-2 icon-hover px-3">  Show Cart <i class="bi bi-cart-fill text-dark"></i></a>
            
                      </div>
            
                    </main>
                  </div>
            </div>
        </div>
      
    </div>
  </section>
  <!-- content -->
  
  

@endsection