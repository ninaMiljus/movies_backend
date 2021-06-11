<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use  App\Http\Services\MovieService;

class MovieController extends Controller
{
    public function __construct(MovieService $movieService){
        $this->movieService = $movieService;
    }

    public function index(Request $request){

        return  $this->movieService->search($request);
    }

    public function show($id){

        return Movie::find($id);
    }

    public function store(MovieRequest $request){
        $data = $request->validated();

        return Movie::create($data);
    }

    public function update(Request $request, $id)
    {
        return Movie::find($id)->update($request->all());
    }

    public function destroy($id){
        $movie = Movie::find($id);
        $movie->delete();

        return $movie;
    }
}
