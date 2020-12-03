@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Permission') }}</div>
            <form action="{{route('permissions.store')}}" method="POST">@csrf 
                <div class="card-body">
                    <select name="role_id" class="form-control">
                        <option value="">Select Role</option>
                        @foreach (App\Models\Role::all() as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <table class="table table-dark mt-3">
                        <thead>
                          <tr>
                            <th scope="col">Permissions</th>
                            <th scope="col">can-add</th>                           
                            <th scope="col">can-edit</th>
                            <th scope="col">can-delete</th>
                            <th scope="col">can-view</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Department</td>
                            <td>
                                <input type="checkbox" name="name[department][can-add]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[department][can-edit]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[department][can-delete]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[department][can-view]" value="1">
                            </td>
                          </tr>
                          <tr>
                            <td>Role</td>
                            <td>
                                <input type="checkbox" name="name[role][can-add]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[role][can-edit]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[role][can-delete]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[role][can-view]" value="1">
                            </td>
                          </tr>
                          <tr>
                            <td>Permissions</td>
                            <td>
                                <input type="checkbox" name="name[permission][can-add]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[permission][can-edit]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[permission][can-delete]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[permission][can-view]" value="1">
                            </td>
                          </tr>
                          <tr>
                            <td>User</td>
                            <td>
                                <input type="checkbox" name="name[user][can-add]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[user][can-edit]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[user][can-delete]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[user][can-view]" value="1">
                            </td>
                          </tr>
                          <tr>
                            <td>Notice</td>
                            <td>
                                <input type="checkbox" name="name[notice][can-add]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[notice][can-edit]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[notice][can-delete]" value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="name[notice][can-view]" value="1">
                            </td>
                          </tr>
                          <tr>
                            <td>Leave</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="checkbox" name="name[leave][can-view]" value="1">
                            </td>
                          </tr>
                          <tr>
                            <td>Mail</td>
                            <td>
                                <input type="checkbox" name="name[mail][can-add]" value="1">
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                          </tr>
                        </tbody>
                      </table>
                      <div class="text-center">
                          <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
