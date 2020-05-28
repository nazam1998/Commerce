@extends('adminlte::page')

@section('content')
<div class="card card-solid">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3 class="d-inline-block d-sm-none">{{$produit->nom}}</h3>
          <div class="col-12">
          <img src="{{asset('storage/'.$produit->image)}}" class="product-image" alt="Product Image">
          </div>
          
        </div>
        <div class="col-12 col-sm-6">
         <h1>{{$produit->nom}}</h1>
          <div class="bg-gray py-2 px-3 mt-4">
            <h2 class="mb-0">
                Prix :
              {{$produit->prix}} €
            </h2>
            
          </div>

          <div class="mt-4 product-share">
              <h2>Catégories</h2>
            @foreach ($produit->categories as $item)
            {{$item->nom}} 
            @if (!$loop->last)
            ,
            @endif
                    
            @endforeach
          </div>

        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

  @endsection
  @section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
  @endsection