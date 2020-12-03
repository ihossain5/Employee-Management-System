@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">All Notices</li>
                </ol>
              </nav>
              @if(count($notices)>0)  <!-- count if there is data or not --> 
              @foreach ($notices as $notice)  <!-- Start foreach --> 
            <div class="card alert alert-info">
                <div class="card-header alert-success" style="color: black;">
                    {{ $notice->title }} 
                </div>

                <div class="card-body">
                    <p>{{ $notice->description }}</p>
                    <p class="badge badge-success">Date : {{ $notice->date }}</p>
                    <p class="badge badge-warning">created by : {{ $notice->name }}</p>
                </div>
                <div class="card-footer">
                   <span class="float-left">
                    @if (isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                    <a href="{{route('notices.edit',[$notice->id])}} " class="btn btn-info">
                        <i class="fas fa-edit"></i>
                    </a> @endif    
                   </span>
                   <span class="float-right">
                    @if (isset(auth()->user()->role->permission['name']['notice']['can-delete']))
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$notice->id}}">
                        <i class="far fa-trash-alt"></i>
                    </a> @endif 
                    <!-- Modal Start -->
                    <form action="{{route('notices.destroy',[$notice->id])}}" method="POST">
                        @csrf
                    @method('DELETE')
                    <div class="modal fade" id="exampleModal{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                   </span>
                </div>
            </div>
            @endforeach  <!-- End foreach --> 
           
            @else <!--  if there is no data, then show this message--> 
            <p class="alert alert-warning">No notices created</p>
            @endif
        </div>
    </div>
</div>
@endsection
