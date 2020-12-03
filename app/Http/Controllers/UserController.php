<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // Get All User Information
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //Registraton form validation
        $validator = Validator::make($request->all(), [
            'firstname'     => 'required',
            'lastname'      => 'required',
            'address'       => 'required',
            'mobile_number' => 'required',
            // 'department_id' => 'required',
            'designation'   => 'required',
            'start_form'    => 'required',
            'image'         => 'mimes:jpeg,jpg,png',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => [
                'required',
                'string',
                'min:6', // must be at least 6 characters in length
                // 'regex:/[a-z]/', // must contain at least one lowercase letter
                // 'regex:/[A-Z]/', // must contain at least one uppercase letter
                // 'regex:/[0-9]/', // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            // 'role_id'       => 'required',
        ]);
        //Show validation Error Message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // Create User
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName(); // Get image original name
            $request->image->storeAs('profile', $image, 'public'); // store image
        } else {
            $image = 'avatar.png';
        }
        $data['name']     = $request->firstname . '' . $request->lastname;
        $data['image']    = $image;
        $data['password'] = bcrypt($request->password);
        User::create($data);
        return redirect()->route('users.index')->with('toast_success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // Find & Edit User Information
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //Registraton form validation
        $validator = Validator::make($request->all(), [
            'name'          => 'required',
            'address'       => 'required',
            'mobile_number' => 'required',
            'department_id' => 'required',
            'designation'   => 'required',
            'start_form'    => 'required',
            'email'         => 'required|string|email|max:255|unique:users,email,' . $id,
            'password'      => [
                'string',
                'min:6', // must be at least 6 characters in length
                // 'regex:/[a-z]/', // must contain at least one lowercase letter
                // 'regex:/[A-Z]/', // must contain at least one uppercase letter
                // 'regex:/[0-9]/', // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'role_id'       => 'required',
        ]);
        //Show validation Error Message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $data = $request->all();
        $user = User::find($id);

        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            Storage::delete('/public/profile/' . $user->image);
            $request->image->storeAs('profile', $image, 'public'); // store image
        } else {
            $image = $user->image;
        }
        if ($request->password) {
            $password = $request->password;
        } else {
            $password = $user->password;
        }

        $data['image']    = $image;
        $data['password'] = bcrypt($password);
        $user->update($data);
        return redirect()->route('users.index')->with('toast_success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        Storage::delete('/public/profile/' . $user->image);
        $user->delete();
        return back()->with('toast_success', 'User deleted successfully');
    }
}
