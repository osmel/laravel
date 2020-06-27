<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


//aqui adentro pongo todas las rutas
Route::group(['middleware' => ['idiomas']], function () {

    Route::get('lang/{lang}', function ($lang) {
        session(['lang' => $lang]);
        return \Redirect::back();
    })->where([ //Limito el valor del parámetro {lang} solo a «en» o «es» para evitar que se asigne a la variable de sesión un idioma que no exista.
        'lang' => 'en|es'  //
    ]);



    
    Route::get('/', 'InicioController@dashboard')
    ->name('inicio');


    Route::get('/usuarios', 'InicioController@index')
    ->name('users.index');

       //nuevo
    Route::get('/usuarios/nuevo', 'InicioController@create') //crear nuevo usuario
        ->name('users.create');
    Route::POST('/usuarios/crear', 'InicioController@store') //validacion creacion de nuevo usuario
        ->name('users.crear');

        //editar
    Route::get('/usuarios/{user}/editar', 'InicioController@edit') //editar usuario
        ->name('users.edit');
    Route::put('/usuarios/{user}', 'InicioController@update'); //validacion edicion de usuario

       //eliminar    
    Route::get('/eliminar_usuario/{user}', 'InicioController@eliminar_usuario');
    //Route::delete('/usuarios/{user}', 'InicioController@destroy')->name('users.destroy');
        

    //Autenticacion
    Auth::routes();

    //resultados para la tabla
    //https://yajrabox.com/docs/laravel-datatables/master/engine-eloquent 
    Route::get('api/midatatable', function () {
        $data = request()->all();


      return datatables()
            ->eloquent(App\User::query())
            ->filter(function ($query) {
                $cadena = request('search')['value'];                
                if ($cadena!='') {
                    $query->where('name', 'like', "%" . request('search')['value'] . "%");
                    $query->orWhere('email', 'like', "%" . request('search')['value'] . "%");
                }
                

            })
            ->toJson();
    });


    //use Illuminate\Support\Facades\Storage;


    //resultados para idioma de aplicacion
    Route::POST('idioma', function () {
        //$url = Storage::disk('local');

        //$url = "https://raw.githubusercontent.com/jpatokal/openflights/master/data/airports.dat";

        //$data = file_get_contents( resource_path('views/inicio.blade.php') );

        $data = file_get_contents( resource_path('lang/es/aplicacion.json') );
        
        $data=str_replace('=>',":",$data);

        $data=str_replace('<?php return',"",$data);

        $data=str_replace(']',"}",$data);
        $data=str_replace('[',"{",$data);
        $data=str_replace(';',"",$data);
        $data=str_replace('n',"",$data);
        
        $url = '{"a":1,"b":2,"c":3,"d":4,"e":5}';


        //dd(  json_encode( $data,true )  ) ;
        //resources/lang/es
        //$url = "https://raw.githubusercontent.com/jpatokal/openflights/master/data/airports.dat";
        //$url = Storage::files(  asset('storage/') );
        

        //
        //$products = json_decode($data, true);
        return $data;
        return  json_encode( (string)$url,true);  
      //return datatables()->eloquent(App\User::query())->toJson();
    })->where([ 
        'lang' => 'en|es'  //
    ]);



});  

/*
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/