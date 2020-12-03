@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{route('departments.update',[$data->id])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-header">{{ __('Update Department') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$data->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">description</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                            {{$data->description}}
                        </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        @if (isset(auth()->user()->role->permission['name']['department']['can-edit']))  
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
