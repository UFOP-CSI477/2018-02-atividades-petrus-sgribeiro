<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paginasController extends Controller
{
    
    public function index() {
    	return view('welcome');

    }

    public function about() {

    }

    public function listar() {
    	$alunos = ['Ana', 'Brígida', 'Hugo', 'Pedro'];
		return view('lista')->with('alunos', $alunos);

    }
}
