<?php

namespace App\Http\Controllers;
use App\Usuario;
use App\User;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function list() {
        $contatos = Usuario::paginate(5);        
        return view('contatos', compact('contatos'));
    }


    public function formulario() {        
        return view('formulario');
    }


    public function editar($usuario) {        
        $usuario = Usuario::find($usuario);
        $user = User::find($usuario->user);
        return view('detalhe', compact('usuario','user'));
    }

    public function update(Request $request, $usuario) {    
        
        
        $request->validate([
            'nome'=>'required',
            'email'=>'required',
            'telefone' => 'required | max:9'
        ]); 

        $usuario = Usuario::find($usuario);
        $user = User::find($usuario->user); 
        
        // dd($user);
        
        $user->email = $request->input('email');
        $user->save();

        $usuario->nome = $request->input('nome');
        $usuario->sobrenome = $request->input('sobrenome');         
        $usuario->telefone = $request->input('telefone');
        $usuario->save();        
        
        return redirect('/agenda/contatos');
    }


    public function cadastrar(Request $request) {                
        $request->validate([
            'nome'=>['required'],
            'email'=>['required'],
            'telefone' => ['required','max:9']
        ]); 
      
        

        $user = new User;        
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('telefone'));
        $user->save();
        
        $usuario = new Usuario;
        $usuario->nome = $request->input('nome');
        $usuario->sobrenome = $request->input('sobrenome');
        $usuario->user = $user->id;
        $usuario->telefone = $request->input('telefone');
        $usuario->save();

        return redirect('/agenda/contatos');
                
    }

    public function deletar($usuario){
        $usuario = Usuario::find($usuario);
        $user = User::find($usuario->user);
        $usuario->delete();
        $user->delete();

        return redirect('/agenda/contatos');
    }
}
