<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        // Formdan gelen verileri al
        $link = $request->input('link');

        // URL kontrol ediliyor
        if (!preg_match('/^https?:\/\/[\w\-]+(\.[\w\-]+)+([\w\-\.,@?^=%&:\/~\+#]*[\w\-\@?^=%&\/~\+#])?$/', $link)) {
            return "Hatalı url girilmiştir!!!";
        }

        // Short linki oluşturuyorum ve DB'de var mı diye kontrol ediyorum
        do{
            $short_link = Str::random(12);
            $check = Link::where('short_link', $short_link)->get();
        }while(!$check->isEmpty());

        // Verileri database'e ekle
        $linkDB = new Link();
        $linkDB->short_link = $short_link;
        $linkDB->link = $link;
        $linkDB->save();


        return "http://localhost:8000/link/" . $short_link;
    }
}