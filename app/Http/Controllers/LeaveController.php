<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // get all from database
        $leaves = Leave::latest()->get();
        return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // get authinticate user data from database
        $leaves = Leave::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.leave.create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate input field
        $validator = Validator::make($request->all(), [
            'from'        => 'required',
            'to'          => 'required',
            'type'        => 'required',
            'description' => 'required',
        ]);
        // Show validation error message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        // Store into Database
        $data            = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status']  = 0;

        Leave::create($data);
        return redirect()->route('leaves.create')->with('toast_success', 'Request has been submitted');
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
        // get data by id
        $leave = Leave::find($id);
        return view('admin.leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // validate input field
        $validator = Validator::make($request->all(), [
            'from'        => 'required',
            'to'          => 'required',
            'type'        => 'required',
            'description' => 'required',
        ]);
        // Show validation error message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $data            = $request->all();
        $leave           = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['message'] = '';
        $data['status']  = 0;
        // Store into Database
        $leave->update($data);
        return redirect()->route('leaves.create')->with('toast_success', 'Request has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // get data by id
        $data = Leave::find($id);
        $data->delete();
        return redirect()->route('leaves.create')->with('toast_success', 'Request has been deleted');
    }

    public function acceptStatus(Request $request, $id) {
        $status  = $request->status;
        $message = $request->message;
        $leave   = Leave::find($id);
        $leave->update([
            'status'  => $status,
            'message' => $message,
        ]);
        return redirect()->route('leaves.index')->with('toast_success', 'Status has been updated');
    }
}
