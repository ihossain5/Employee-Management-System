<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // get all notices from database
        $notices = Notice::latest()->get();
        return view('admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.notice.create');
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
            'title'       => 'required',
            'description' => 'required',
            'date'        => 'required',
            'name'        => 'required',
        ]);
        // Show validation error message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        // Store into Database
        $data = $request->all();
        Notice::create($data);
        return redirect()->route('notices.index')->with('toast_success', 'Notice has been created');
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
        $notice = Notice::find($id);
        return view('admin.notice.edit', compact('notice'));
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
            'title'       => 'required',
            'description' => 'required',
            'date'        => 'required',
            'name'        => 'required',
        ]);
        // Show validation error message
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        // find id
        $notice = Notice::find($id);
        // Store into Database
        $data = $request->all();
        $notice->update($data);
        return redirect()->route('notices.index')->with('toast_success', 'Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // delete data by id
        $data = Notice::find($id);
        $data->delete();
        return redirect()->route('notices.index')->with('toast_success', 'Record has been deleted');
    }
}
