<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function show($id)
    {
        
        $check = Link::where('short_link', $id)->get();
        
        if($check->isEmpty()){
            return "Böyle bir link bulunmamaktadır!!!";
        }

        return redirect($check[0]->link);
    }
}
