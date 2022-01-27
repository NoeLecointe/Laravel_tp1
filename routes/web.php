<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Categorie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/accueil', function () {
    return view('accueil');
});

Route::get('/liste', function (Request $request) {

    //SQL
        // $livres = DB::select('SELECT * FROM ltp1livre', []);
        // $livreId = DB::select('SELECT * FROM ltp1livre WHERE id=1', []);
        // $livreTom = DB::select('SELECT titre, prix FROM ltp1livre WHERE titre LIKE "%Tom%"', []);
    //Query builder
        // $livres = DB::table('livre')->get();
        // $livreId = DB::table('livre')->where('id', 1)->get();
        // $livreTom = DB::table('livre')->select('titre', 'prix')->where('titre','like','%Tom%')->get();
    //ORM Eloquent
        $livres = Livre::join('categories','categories.id', '=', 'livre.categorie_id')->select('livre.id', 'livre.titre', 'livre.resume', 'livre.prix', 'categories.libelle')->get();
        // $livreId = Livre::find(1);
        // $livreTom = Livre::select('titre', 'prix')->where('titre','like','%Tom%')->get();

    return view('liste_livres', ['livres'=>$livres]);
});

Route::get('/meslivres', function () {
    // $livres = Livre::where('user_id', '=', Auth::user()->id)->get();
    // $categorie = Categorie::get();

    $livres = Livre::join('categories','categories.id', '=', 'livre.categorie_id')->select('livre.id', 'livre.titre', 'livre.resume', 'livre.prix', 'categories.libelle')->where('user_id', '=', Auth::user()->id)->get();

    return view('meslivres', ['livres'=>$livres], // ['categories'=>$categorie]
                );
});

Route::get('/supp', function (Request $request) {
    $supp = Livre::find($request->input('id'));
    $supp->delete();

    $livres = Livre::get();
    return view('meslivres', ['livres'=>$livres], ['message'=>'livre bien supprimé']);
});

Route::get('/modif', function(Request $request) {
    $id = $request->input('id');
    dump($id);
    $categorie = Categorie::get();
    $livre = Livre::join('categories','categories.id', '=', 'livre.categorie_id')->select('livre.id', 'livre.titre', 'livre.resume', 'livre.prix', 'livre.categorie_id', 'categories.libelle')->find( $id);
    dump($livre);

    return view('modif', ['livre'=>$livre], ['categories'=>$categorie]);
});

Route::get('/modifier', function(Request $request) {
    $livre = Livre::find($request->input('id'));
    $livre->titre = $request->input('titre');
    $livre->resume = $request->input('resume');
    $livre->prix = $request->input('prix');
    $livre->categorie_id = $request->input('categorie');
    $livre->save();



    $livres = Livre::join('categories','categories.id', '=', 'livre.categorie_id')->select('livre.id', 'livre.titre', 'livre.resume', 'livre.prix', 'categories.libelle')->where('user_id', '=', Auth::user()->id)->get();

    return view('meslivres', ['livres'=>$livres], ['message'=>'livre bien modifié']);
});


Route::get('/ajouter', function () {
    $id_user = Auth::user()->id;
    $categorie = Categorie::get();
    return view('ajouter', ['id_user'=>$id_user], ['categories'=>$categorie]);
});


Route::get('/ajout', function (Request $request) {

    $livre = new Livre();
    $livre->titre = $request->input('titre');
    $livre->resume = $request->input('resume');
    $livre->prix = $request->input('prix');
    $livre->user_id = $request->input('user_id');
    $livre->categorie_id = $request->input('categorie');
    $livre->save();

    $livres = Livre::get();
    return view('liste_livres', ['livres'=>$livres], ['message'=>'Livre ajouté']);
});

Route::get('/recherche', function (Request $request) {
    // dump($request);
    $search = Livre::where('titre','like','%'.$request->input('search').'%')->get();
    // dump($search);
    return view('recherche', ['rech'=>$search]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

