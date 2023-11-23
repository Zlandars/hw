<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShortLinkController extends Controller
{
    function index (Request $request) {
        if ($request->input('link')) {
            $addr = DB::table('link')->select('oldLink')->where('shortLink',$request->input('link'))->first();
            return redirect($addr->oldLink);
        }
        return view('link', ['name'=>'WORLD']);
    }
    function createLink (Request $request) {
        if (!DB::table('link')->where('oldLink',$request->input('link'))->exists()) {
            $randomizeString = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $result = '';
            for ($i = 1; $i <= 10; $i++) {
                $result .= $randomizeString[rand(0,61)];
            }
            $DBQuery = DB::table('link')->insert([
                'oldLink' => $request->input('link'),
                'shortLink' => $result
            ]);
            return $result;
        }
        $result = DB::table('link')->select('shortLink')->where('oldLink',$request->input('link'))->first();
        return '/'.$result->shortLink;
    }
    function deleteLink (Request $request) {
        $url = $request->input('link');
        $DBQuery = DB::table('link')->where('oldLink',$url)->delete();
        return $DBQuery == 0 ? 'Ссылка не существует' : 'Удалено';
    }
}
