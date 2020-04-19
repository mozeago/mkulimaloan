@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <b>You are logged in! as {}</b></br></br></br>
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    @endif
                    <form method="POST" action="{{ route('addrole') }}">
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
                                <th scope="col">Guard Name</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                      @foreach ($all_roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>{{ $role->created_at }}</td>
                                <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a><a href="#" class="btn btn-success"><i class="fa fa-trash"></i></a></td>
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
