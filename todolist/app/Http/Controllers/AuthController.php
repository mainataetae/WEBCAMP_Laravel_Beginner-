<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;

class Authcontroller extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login(LoginPostRequest $request)
    {
        //validate済

        //データの取得
        $dautum = $request -> validated();

        //
        var_dump($dautum); exit;
    }
}
