<?php

use Illuminate\Http\Request;
use App\Usuario;
use App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/users', function (Request $request) {
//    return $request->user();
//});

Route::get('/users', function (Request $request) {
    $users = Usuario::all();    
    return $users;
});


Route::delete('/deletar/{usuario}', function (Int $usuario) {   
    // dd($usuario);
    // print_r($usuario);
    $usuario = Usuario::find($usuario);    
    $user = User::find($usuario->user);
    $usuario->delete();
    $user->delete();

    return response('Contato deletado !', 200);
});

Route::post('/users', function (Request $request) {       

    // dd($request->nome);

    try {                          
        $user = new User;        
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = bcrypt($request->telefone);
        $user->save();
        
        $usuario = new Usuario;
        $usuario->nome = $request->nome;
        $usuario->sobrenome = $request->sobrenome;
        $usuario->user = $user->id;
        $usuario->telefone = $request->telefone;
        $usuario->save();

        return response('Contato cadastrado !', 201);
    }catch (Exception $e){
        return response('Erro ao cadastrar contato! '.$e, 400);
    }
    
    
});

// Route::prefix('agenda')->group(function(){
//     Route::get('/contatos', 'AgendaController@list');
//     Route::get('/formulario', 'AgendaController@formulario');
//     Route::post('/cadastrar', 'AgendaController@cadastrar');
//     Route::get('/formulario/{usuario}/editar', 'AgendaController@editar');
//     Route::post('/update/{usuario}', 'AgendaController@update');
//     Route::get('/deletar/{usuario}', 'AgendaController@deletar');
// });


