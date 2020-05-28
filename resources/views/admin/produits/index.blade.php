@extends('adminlte::page')

@section('content')
    {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="12">
                    Table des produits
                </th>
            </tr>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Etat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $item)
                <tr>
                <td>{{$item->id}}</td>
                <td><img src="{{asset('storage/'.$item->image)}}" alt=""></td>
                <td>{{$item->nom}}</td>
                <td>{{$item->prix}}€</td>
                <td>{{$item->etat}}</td>
                <td>
                <a href="{{route('produit.show',$item)}}" class="btn btn-primary">Show</a>
                <a href="{{route('produit.edit',$item)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('produit.destroy',$item)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <div class="row">
        @foreach ($produits as $item)
            
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-light">
                <div class="inner">
                <small>{{$item->etat}}</small>
                    <h3>{{$item->nom}}</h3>
                    
                <p>{{$item->prix}} €</p>
                </div>
                <div class="icon">
                <img src="{{asset('storage/'.$item->image)}}" alt="">
                </div>

                <div class="small-box-footer bg-dark text-center">
                <a href="{{route('produit.edit',$item)}}" class="mx-3"><i class="fas fa-pen text-warning"></i></a>
                <form action="{{route('produit.destroy',$item)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"><i class="fas fa-trash text-danger"></i></button>
                </form>
                </div>
            <a href="{{route('produit.show',$item)}}" class="small-box-footer bg-info text-white">
                    Show <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
    
    @section('css')
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection