<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MainModel;

class Main extends Controller
{
    public function index(Request $request)
    {
   
    	if ($request->isMethod('post')) {
    		$request->validate([
			    'word' => 'required|max:100|string',
			]);
			$name = ucfirst(strtolower($request->input('word')));
			$data['result_n'] = MainModel::where('english_word', $name)->where('part_of_speech', "n")->get();
			$data['result_a'] = MainModel::where('english_word', $name)->where('part_of_speech', "a")->get();
			$data['result_adv'] = MainModel::where('english_word', $name)->where('part_of_speech', "adv")->get();
			return view('welcome',$data);
		} else 	
			return view('welcome');
    }
}
