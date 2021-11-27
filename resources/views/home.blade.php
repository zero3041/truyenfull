@extends('layouts.app')

@section('content')

@include('layouts.nav')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý user</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tên</th>
                          <th scope="col">Email</th>
                          <th scope="col">Vai trò hiện tại</th>
                          <th scope="col">Quyền dựa vào vai trò</th>
                            <th scope="col">Assign/Role</th>
                           <th></th> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($user as $key => $u)
                        <tr>
                          <th scope="row">{{$key}}</th>
                          <td>{{$u->name}}</td>
                          <td>{{$u->email}}</td>
                          <td>
                              @foreach($u->roles as $role)
                                {{$role->name}}
                              @endforeach
                          </td>
                          <td>
                               @foreach($u->permissions as $per)
                                {{$per->name}}
                              @endforeach
                          </td>
                          <td><a href="{{url('/assignRole/'.$u->id)}}">Phân quyền</a></td>
                          <td><a href="{{url('/impersonate/user/'.$u->id)}}">Impersonate</a></td>
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
