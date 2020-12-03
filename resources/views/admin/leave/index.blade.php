@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   All Leave Request    
                </li>
              </ol>
            </nav>
    <div class="row justify-content-center">
        @if (count($leaves)>0)
        <table class="table table-bordered mt-5">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Form</th>
                <th scope="col">To</th>
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Reply</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
                {{-- Show all data form database --}}
                @foreach ($leaves as $key => $leave)
              <tr>
              <th scope="row">{{ $leave->user->name}}</th>
                <td>{{ $leave->from }} </td>
                <td>{{ $leave->to }}</td>
                <td>{{ $leave->type}}</td>
                <td>{{ $leave->description}}</td>
                <td>{{ $leave->message}}</td>
                <td>
                    @if ($leave->status == 0)
                        <span class="btn btn-warning">Pending</span>
                    @else  <span class="btn btn-success">Approved</span>   
                    @endif
                </td>
                <td>
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$leave->id}}">
                        Action
                    </a>
                    <!-- Modal Start -->
                    <form action="{{route('accept.status',[$leave->id])}}" method="POST">
                        @csrf
                    <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                     
                        <div class="modal-content">
                            <div class="modal-header">
                                
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control"  name="status" id="" required=''>
                                        <option value="0">Pending</option>
                                        <option value="1">Accept</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea name="message" class="form-control" required='' ></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-dark">Update</button>
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


</div>
    
@endsection
