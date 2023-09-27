<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->authorize('viewAny', User::all());
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', User::class);
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->authorize('create', User::class);
        $validated = $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'confirmed'
        ]);
        $input = $request->all();


        User::create($input);
        return redirect('users')->with('flash_message', 'User Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$this->authorize('view', User::class);
        $user = User::find($id);
        return view('users.show')->with('users', $user); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$this->authorize('update', User::class);
        $user = User::find($id);
        return view('users.edit')->with('users', $user); 
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
        //$this->authorize('update', User::class);
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required',Rule::excludeIf($request->get('email') === User::find($id)->email),'unique:users,email',
            'password' => 'required|confirmed'
        ];
        
        // Conditionally add password validation rule if the password field is filled

        $user = User::find($id);
        $validated = $request->validate($rules);
        $input = $request->all();
        $user->update($input);
        return redirect('users')->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$this->authorize('delete', User::class);
        User::destroy($id);
        return redirect('users')->with('flash_message', 'User Deleted!');
    }
}
