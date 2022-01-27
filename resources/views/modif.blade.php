@extends('index')

@section('section')
    <h1>Formulaire pour modifier un livre</h1><br>
    
    <form action="modifier" method="get" >
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du livre</label>
            <input type="text" class="form-control" id="titre" name="titre" ariadescribedby="titre" value='{{$livre->titre}}'>
        </div>
        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select id="categorie" name="categorie" class="form-control">
                @foreach($categories as $c)
                    @if($livre->libelle == $c->libelle)
                        <option value="{{$c->id}}" selected>{{$c->libelle}}</option>
                    @else
                        <option value="{{$c->id}}">{{$c->libelle}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resumé</label>
            <input type="text" class="form-control" id="resume" name="resume" value='{{$livre->resume}}'>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix du livre</label>
            <input type="text" class="form-control" id="prix" name="prix" value='{{$livre->prix}}'>
        </div>
        <input type="text" name="id" value="{{$livre->id}}">
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
@stop