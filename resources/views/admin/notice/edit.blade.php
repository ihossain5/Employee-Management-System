@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{route('notices.update',[$notice->id])}}" method="POST">
            @csrf @method('PATCH')
            <div class="card">
                <div class="card-header">{{ __('Update Notice') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $notice->title }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">description</label>
                        <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                            {{ $notice->description }}
                        </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>Form Date</label>
                        <input id="datepicker" name="date" class="form-control" value="{{ $notice->date }}" required="">
                    </div>
                    <div class="form-group">
                        <label>Created By</label>
                    <input name="name" class="form-control" value="{{$notice->name}}" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
