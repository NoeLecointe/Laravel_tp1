@extends('index')
@section('section')
    <br>
    <H1>Liste de tous les livres</H1><br>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Resumé</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
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
                <td class="d-flex">
                    <form action="modif" method="get" class="mx-3">
                        <input type="text" name="id" value="{{$livre->id}}">
                        <input type="submit" class="btn btn-warning" value="Modifier">
                    </form>
                    <form action="supp" method="get" class="mx-3">
                        <input type="hidden" name="id" value="{{$livre->id}}">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>
@stop