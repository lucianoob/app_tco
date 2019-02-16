<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('users.edit')->with('user', $user);
    }

    public function update(User $user)
    { 
        if(Auth::user()->email == request('email')) {
        
	    	$this->validate(request(), [
	            'name' => 'required',
	            'password' => 'required|min:6|confirmed'
	        ]);

	        $user->name = request('name');
	        $user->username = request('username');
	        $user->email = request('email');
	        $user->password = bcrypt(request('password'));

	        $user->save();

	        return view('users.edit')->with('user', $user)->with('status', 'Os dados do usuário foram salvos com sucesso.'); 
	    }
	    else
	    {
	        
	    	$this->validate(request(), [
	            'name' => 'required',
	            'password' => 'required|min:6|confirmed'
	        ]);

	        $user->name = request('name');
	        $user->email = request('email');
	        $user->password = bcrypt(request('password'));

	        $user->save();

	        return view('users.edit')->with('user', $user)->with('status', 'Os dados do usuário foram salvos com sucesso.');
	    }
    }
}