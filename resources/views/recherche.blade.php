@extends('index')
@section('section')
    <h1>Résultat de la recherche</h1><br>

    @if(count($rech) == 0)
    Aucun résultat
    @else
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Resumé</th>
            <th scope="col">Prix</th>
          </tr>
        </thead>
        <tbody>
        @foreach($rech as $livre)
            <tr>
                <th scope="row">{{$livre->id}}</th>
                <td>{{$livre->titre}}</td>
                <td>{{$livre->resume}}</td>
                <td>{{$livre->prix}}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    @endif
@stop