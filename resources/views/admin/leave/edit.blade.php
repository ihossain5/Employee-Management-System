@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    Leave Form
                </li>
              </ol>
            </nav>
        <form action="{{route('leaves.update',[$leave->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Information</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>From Date</label>
                    <input id="datepicker" name="from" class="form-control" required="" value="{{$leave->from}}">
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input id="datepicker1" name="to" class="form-control" required="" value="{{$leave->to}}">
                    </div>
                    <div class="form-group">
                        <label>Type of Leave</label>
                        <select name="type" class="form-control" id="">
                            <option value="annual">Annual</option>
                            <option value="sick">Sick</option>
                            <option value="parental">Parental</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="10">
                           {{$leave->desctiption}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</form>

</div>
    
@endsection
