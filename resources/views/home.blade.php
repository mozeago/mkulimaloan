@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    <b>Roles</b></br></br></br>
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="formGroupExampleInput">Role Name</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" name="rolename" placeholder="Role Name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary my-1">Save</button>
                        </div>
                      </form>
                      <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Role Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                      @foreach ($all_roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td></td>
                            </tr>
                      @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Permissions</div>

                <div class="card-body">
                    <b>Permissions</b></br></br></br>
                    @if (session('permission'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('permission') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    <form method="POST" action="{{ route('permissions.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="permission_name">Permission Name</label>
                          <input type="text" class="form-control" id="permission_name" name="permissionname" placeholder="Permission Name">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary my-1">Save</button>
                        </div>
                      </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                      @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td></td>
                            </tr>
                      @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Permissions & Roles</div>

                <div class="card-body">
                    <b>Assign Role And Permission</b></br></br></br>
                    @if (session('permission_role'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('permission_role') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    <form method="POST" action="{{ route('rolepermissions.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                             <label for="role_permissions">Role</label>
                            <select class="custom-select" name="role_id" id="role_permissions" required>
                                @foreach ($all_roles as $role)
                                    <option value="{{ $role->id}}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                            </div>
                            <div class="col">
                             <label for="permissions">Permission</label>
                            <select class="custom-select" name="permission_id" id="permissions" required>
                                 @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                            <button type="submit" class="btn btn-primary my-1">Save</button>
                            </div>
                            </div>
                        </div>

                      </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Role</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                      @foreach ($permissions as $permission)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                      @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
