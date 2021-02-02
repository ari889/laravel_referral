<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id){
        if(Auth::user()){
            return redirect() -> route('home');
        }else{
            $data = User::find($id);
            if(isset($data)){
                $data -> visit = $data -> visit + 1;
                $data -> update();
            }
            return view('frontend.packages', [
                'user_id' => $id
            ]);
        }
    }

    public function create(Request $request){
        $request -> session() -> put('package_name', $request -> package_name);
        $request -> session() -> put('referral_id', $request -> referral_id);

        return route('register');
    }

    /**
     * @param Request $request
     * @return int
     */
    public function allUsers(Request $request){
        return User::all() -> count();
    }
}
