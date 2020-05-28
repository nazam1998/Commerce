@extends('adminlte::page')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('produit.update',$produit)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @error('nom')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{old('nom',$produit->nom)}}">
            </div>
            @error('prix')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="">Prix</label>
                <input step="0.01" type="number" name="prix" class="form-control" value="{{old('prix',$produit->prix)}}">
            </div>
            @error('image')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            @error('etat')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
            <div class="form-group">
                <label>Select</label>
                <select class="form-control" name="etat">
                    
                  <option @if(old('etat',$produit->etat)=='Normal')selected @endif value="Normal">Normal</option>
                  <option @if(old('etat',$produit->etat)=='Nouveau')selected @endif value="Nouveau">Nouveau</option>
                  <option @if(old('etat',$produit->etat)=='Promo')selected @endif value="Promo">Promo</option>
                </select>
              </div>
            <label for="">Catégories</label>
            @error('categorie')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
            <div class="form-group row container">

                @foreach ($categories as $item)

                <div class="form-check col-lg-2">
                    <input @if($produit->categories->contains($item->id)) checked @endif class="form-check-input" name="categorie[]" type="checkbox" value="{{$item->id}}">
                    <label class="form-check-label">{{$item->nom}}</label>
                </div>

                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection
