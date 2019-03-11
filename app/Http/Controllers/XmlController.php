<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class XmlController extends Controller
{

    public function index()
    {
    	return view('index');
    }

    public function show(Request $request)
    {
    	if (!empty($request->caminho)) {
			$caminho = $request->caminho;
			if (!file_exists($request->caminho)) {
				$arquivos = false;
			} else {
				$arquivos = scandir($request->caminho);
			}
    	} else {
    		$arquivos = false;
    	}
    	return view('AcharXmls', [
    		'arquivos' => $arquivos,
    		'caminho' => $caminho
    	]);
    }

}
