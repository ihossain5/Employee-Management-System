<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller {
    public function create() {
        return view('admin.mail.create');
    }

    public function store(Request $request) {
        // validate input field
        $validator = Validator::make($request->all(), [
            'body' => 'required',
            'file' => 'mimes:docx,doc,pdf,jpeg,jpg,png',
        ]);
        // Show validation error message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $file    = $request->file('file');
        $details = [
            'body' => $request->body,
            'file' => $file,
        ];
        if ($request->department) {
            $users = User::where('department_id', $request->department)->get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMail($details));
            }
        } elseif ($request->person) {
            $user      = User::where('id', $request->person)->first();
            $userEmail = $user->email;
            Mail::to($user->email)->send(new SendMail($details));
        } else {
            $users = User::get();
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMail($details));
            }
        }
        return redirect()->route('leaves.create')->with('toast_success', 'Email has been sent');
    }
}
