<?php

namespace App\Http\Services;
use App\Models\Movie;

class MovieService {

    public function search($request){
        if ($request->input('title')){

            return Movie::where('title',$request->input('title'))->take(10)->skip(5)->get();
        } else {
            return Movie::take(10)->skip(5)->get();
        }
    }
}


?>
