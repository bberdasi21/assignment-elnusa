<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use response;
use Illuminate\Support\Facedes\input;
use App\http\Requests;
class BackendController extends Controller
{
    public function view_login(Request $req){
        $value = $req->session()->get('username');
        if($value==""){
            return view('login');
        }else{
            return redirect('/profile');
        }
    }
    public function view_register(Request $req){
        $value = $req->session()->get('username');
        if($value==""){
            return view('register');
        }else{
            return redirect('/profile');
        }
    }
    public function view_profile(Request $req){
        $value = $req->session()->get('username');
        if($value==""){
            return redirect('/');
        }else{
            return view('profile');
        }
    }
    public function register(Request $req){
        $username = $req->username;
        $pass = $req->password;
        $email = $req->email;
        $nama = $req->nama;

        $user = array();
        $file = file('user.txt');
        foreach ($file as $i => $line) {
            $splitLine = explode('|',trim($line));
            array_push($user,$splitLine);
        }

        foreach ($user as $u) {
            if($u[0]==$username){
                return 0;
            }
        }

        $context = stream_context_create(array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" .
                    "Cookie: foo=bar\r\n"
        )
        ));

        $file = file_get_contents('user.txt', false, $context);

        $userfile = fopen("user.txt", 'w+');
        
        fwrite($userfile, $file."\r\n".$username."|".$nama."|".$email."|".$pass);
        fclose($userfile);
        return 1;
    }
    public function login(Request $req){
        $validator = Validator::make($req->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
        if(!$validator->fails()){
            $username = $req->username;
            $pass = $req->password;

            $user = array();
            $file = file('user.txt');
            foreach ($file as $i => $line) {
                $splitLine = explode('|',trim($line));
                array_push($user,$splitLine);
            }

            foreach ($user as $u) {
                if($u[0]==$username && $u[3]==$pass){
                    session(['username' => $u[0]]);
                    session(['nama' => $u[1]]);
                    session(['email' => $u[2]]);
                    return response()->json(1);
                }
            }
            // return response()->json($post);
        }
    }
    public function logout(){
        session()->forget('username');
        session()->forget('nama');
        session()->forget('email');
        session()->flush();
        return 1;
    }
}
