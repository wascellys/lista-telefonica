<?php
use App\User;
use App\Usuario;
use App\Http\Controllers\AgendaController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('users/', function () {        
//     return User::all();
// });


// Route::get('usuario_user/', function () {        
//     $usuario = Usuario::find(2);
//     return $usuario;
// });



// Route::get('cadastro/', function () {    
//     $user = User::find(1);    

//     $user->usuario()->create([
//         'nome' => 'Edy Ferreira',
//         "telefone" => '997046899'        
//     ]);        

//     return $user;
// });



// Route::get('consulta/', function () {           
//     $user = User::find(1);
//     return $user->usuario;

//     // $usuario = Usuario::find(6);
//     // return $usuario->user;

// });


Route::prefix('agenda')->group(function(){
    Route::get('/contatos', 'AgendaController@list');
    Route::get('/formulario', 'AgendaController@formulario');
    Route::post('/cadastrar', 'AgendaController@cadastrar');
    Route::get('/formulario/{usuario}/editar', 'AgendaController@editar');
    Route::post('/update/{usuario}', 'AgendaController@update');
    Route::get('/deletar/{usuario}', 'AgendaController@deletar');
});