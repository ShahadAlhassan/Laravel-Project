@extends('layouts.app')
@section('content')


<section class="py-5">
    <div class="row">
        <div class="col">
            @foreach($data as $items)
            <div class="card m-5 p-3 border border-secondary">
                <div class="card-body">
                    <div class="container">
                        <div class="row gx-5">
                          <aside class="col-lg-6">
                            <div class=" rounded-4 mb-3 d-flex justify-content-center">
                              <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" >
                                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"  src="/assets\images\{{$items->images}}" width="300" height="250"/>

                            </a>
                            </div>
                           
                            <!-- thumbs-wrap.// -->
                            <!-- gallery-wrap .end// -->
                          </aside>
                          <main class="col-lg-6">
                            <div class="ps-lg-3">
                              <h4 class="title text-dark">
                                {{$items->description}}
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
                                <span class="h5">{{$items->net}} SAR</span>
                                <span class="text-muted">/per box</span>
                              </div>
                    
                             
                    
                              <div class="row">
                                <dt class="col-3">Type:{{$items->proudctname}}</dt>
                                <dt class="col-3">Color: {{$items->color}}</dt>
                                <dt class="col-3">Brand:{{$items->proudctname}} </dt>
                               
                               
                              </div>
                    
                              <hr />
                    
                             
                              <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                              <a href="#" class="btn btn-danger border  py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Delete </a>
                            </div>
                          </main>
                        </div>
                      </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
  
  </section>
@endsection
