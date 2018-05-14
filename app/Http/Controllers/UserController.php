<?php

namespace App\Http\Controllers;

use App\User;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'username'=>'required',
            'password'=>'required|min:2|confirmed',
            ]);

        $user=User::create(
            [
                'name'=>$request["name"],
                'email'=>$request["email"],
                'password'=>bcrypt($request["password"]),
                ]);
        auth()->login($user);
        return redirect()->home();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }



    public function registerForm()
    {
        return view('register');
    }

    public function storeLogin()
    {
        if(!Auth::attempt(\request(['email','password'])))
        {
            return back()->withErrors(['message'=>'please check your login inputs']);
        }
        return redirect()->home();
        
    }
}
