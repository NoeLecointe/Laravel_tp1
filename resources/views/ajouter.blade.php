@extends('index')
@section('section')
    <h1>Formulaire pour l'ajout d'un nouveau livre</h1><br>
    <form action="ajout" method="get" >
        <div class="mb-3">
            <label for="titre" class="form-label">Titre du livre</label>
            <input type="text" class="form-control" id="titre" name="titre" ariadescribedby="titre">
        </div>
        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select id="categorie" name="categorie" class="form-control">
                @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->libelle}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="resume" class="form-label">Resumé</label>
            <input type="text" class="form-control" id="resume" name="resume">
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix du livre</label>
            <input type="text" class="form-control" id="prix" name="prix">
        </div>
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$id_user}}">
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
@stop