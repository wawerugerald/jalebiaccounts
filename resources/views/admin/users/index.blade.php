@extends('layouts.adminpanel')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users Table</h4>                  
                  <div class="table-responsive">           
                    <table class="table">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Tools</th>
                          <th>Last login</th>
                        </tr>
                      </thead>                     
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td><label class="badge badge-danger">Pending</label></td>
                            <td>
                                <a href="#" class="btn btn-primary">edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            <td>{{ $user->last_logged_in ? $user->last_logged_in->format('Y-m-d H:i:s') : 'N/A' }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>                   
                  </div>
                </div>
              </div>
        </div>
@endsection
@section('scripts')
@endsection