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
        <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">General Information</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>From Date</label>
                        <input id="datepicker" name="from" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input id="datepicker1" name="to" class="form-control" required="">
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
                        <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary " type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</form>
@if (count($leaves)>0)
<table class="table table-bordered mt-5">
    <thead>
      <tr>
        <th scope="col">Sl No</th>
        <th scope="col">Form</th>
        <th scope="col">To</th>
        <th scope="col">Type</th>
        <th scope="col">Description</th>
        <th scope="col">Reply</th>
        <th scope="col">Status</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        {{-- Show all data form database --}}
        @foreach ($leaves as $key => $leave)
      <tr>
      <th scope="row">{{ $key+1 }}</th>
        <td>{{ $leave->from }} </td>
        <td>{{ $leave->to }}</td>
        <td>{{ $leave->type}}</td>
        <td>{{ $leave->desctiption}}</td>
        <td>{{ $leave->message}}</td>
        <td>
            @if ($leave->status == 0)
                <span class="badge badge-warning">Pending</span>
            @else  <span class="badge badge-success">Approved</span>   
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="{{route('leaves.edit',[$leave->id])}} " class="btn btn-info">
                <i class="fas fa-edit"></i>
            </a>
        </td>
        <td>
            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$leave->id}}">
                <i class="far fa-trash-alt"></i>
            </a>
            <!-- Modal Start -->
            <form action="{{route('leaves.destroy',[$leave->id])}}" method="POST">
                @csrf
            @method('DELETE')
            <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
             
                <div class="modal-content">
                    <div class="modal-header">
                        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Are you sure to delete?
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
           
                </div>
            
            </div>
        </form>
      <!------  Modal End ------->
        </td>
      </tr>                
      @endforeach
    </tbody>
  </table>
  @endif
</div>
    
@endsection
