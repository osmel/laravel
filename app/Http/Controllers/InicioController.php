<?php

namespace App\Http\Controllers;

use App\User; //modelo User del ORM eloquent
use Illuminate\Support\Facades\DB;  //para usar DB, para consultas nativas y constructor laravel

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //cuando trata de entrar en esta clase sino esta logueado lo redirecciona a login
        $this->middleware('auth');  
    }

   
   

    public function dashboard() { //index
        return view('inicio'); 
    }

    //////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////Gestion de usuarios//////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////

    //listado de tabla usuarios
    public function index() { //index
        //dd( session('lang') );
        $users= User::all()->take(10); 
        return view('usuarios.usuarios',['title'=>'Listado de usuarios','users'=>$users]); 
    }

  
    //Crear un nuevo usuario
    public function create() { //motrar el formulario
        return view('usuarios.create');
    }

    
    //validacion creacion de nuevo usuario
    public function store() { //procesar el formulario

        //metodo validate para las reglas de validación
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El campo email es unico'
        ]);
        
        User::create([  //creando o insertando un registro en user
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return redirect()->route('users.index'); //redirigiendo a 
    }


    //editar usuario
    public function edit(User $user) {
        return view('usuarios.edit', ['user' => $user]);
    }

    //validacion de edicion de usuarios
    public function update(User $user){
        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,'.$user->id ],
            'password' => '', //aqui no lo validamos
        ]);

        //pero luego de no haberlo validado, si viene con valor, lo tenemos en cuenta para el modelo
        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {  //em casp contrario, no lo tenemos en cuenta para la actualizacion del modelo
            unset($data['password']);
        }

        $user->update($data);
        return redirect('/usuarios');  //return redirect()->route('users.index', ['user' => $user]);
    }

  
    function eliminar_usuario(User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }




}
