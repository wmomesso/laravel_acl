<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Post $post)
    {
        $posts = $post->all(); // traz todos os registros
        //$posts = $post->where('user_id', auth()->user()->id)->get(); // traz todos os registros do usuário logado
        return view('home', compact('posts'));
    }

    public function update($id_post)
    {
        $post = Post::find($id_post);
        //$this->authorize('update-post', $post); // uma forma de verificar autorizacao

        if (Gate::denies('update', $post)) // outra forma de verificar
            abort(403, 'Usuário nao autorizado');

        return view('post-update',compact('post'));
    }

    public function rolesPermissions()
    {
        $user = auth()->user()->name;
        echo "<h1>{$user}</h1>";

        foreach (auth()->user()->roles as $role) {
            $name = $role->name;
            echo "<p><b>Role: {$name}</b></p>";
            $permissions = $role->permissions;
            foreach ($permissions as $permission) {
                echo "<p>Permissão: {$permission->name}</p>";
            }

        }
    }
}
