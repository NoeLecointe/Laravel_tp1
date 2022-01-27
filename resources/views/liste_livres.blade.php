@extends('index')
@section('section')
    <H1>Liste de tous les livres</H1><br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Resumé</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix</th>
          </tr>
        </thead>
        <tbody>
        @foreach($livres as $livre)
            <tr>
                <th scope="row">{{$livre->id}}</th>
                <td>{{$livre->titre}}</td>
                <td>{{$livre->resume}}</td>
                <td>{{$livre->libelle}}</td>
                <td>{{$livre->prix}}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
@stop