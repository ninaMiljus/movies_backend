<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){

        return Movie::all();
    }

    public function show($id){

        return Movie::find($id);
    }

    public function store(MovieRequest $request){
        return Movie::create($request->all());
    }

    public function destroy($id){
        $movie = Movie::find($id);
        $movie->delete();

        return $movie;
    }
}
