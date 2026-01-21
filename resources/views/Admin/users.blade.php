@extends('layouts.app')
@section('content')
@include('components.sidebar')
<div class="container p-0">
    <div class="row">
        <div class="userHead d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-center py-3 text-primary" style="color: #2c3e50; font-weight: 600;">  <i class="fas fa-users me-2"></i>User Management({{$users->count()}})</h2>
            <a class="btn btn-primary p-2 rounded" href={{route('admin.users.create')}}><i class=" fa fa-plus"></i> Add User</a>
        </div>
        @if(session("success"))
            <div class="alert alert-success text-center">
                {{session("success")}}
            </div>
        @endif

        <div class="col-md-12">
             <div class="stat-card">
                            
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead style="background: #f8f9fa;">
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Joined</th>
                                            <th>Role</th>
                                            <th>status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div style="width: 45px; height: 45px; border-radius: 50%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                    <strong>{{ $user->name }}</strong>
                                                </div>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->locale('En')->diffForHumans() }}</td>
                                            <td>
                                                @if($user->role=='user')
                                                    <span class="badge" style="background: #43e97b; color: white;">User</span>
                                                @else
                                                    <span class="badge" style="background: #feca57; color: white;">Admin</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->status=='active')
                                                    <span class="badge" style="background: #43e97b; color: white;">Active</span>
                                                @else
                                                    <span class="badge" style="background: #ff0000; color: white;">Blocked</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href={{route('admin.users.edit',$user->id)}} class="btn btn-sm btn-primary mb-sm-2 mb-lg-0"><i class="fa fa-pen"></i> </a>
                                                <a href={{route('admin.users.delete', $user->id)}} class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        successAlert.style.transition = 'opacity 0.5s';
        successAlert.style.opacity = '0';
        setTimeout(() => successAlert.remove(), 500);
    }
}, 5000);
</script>
@endsection