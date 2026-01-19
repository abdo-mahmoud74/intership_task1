@extends('layouts.app')

@section('content')
<div class="container p-0">

    <div class="row g-0">
         
 
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <div class="container-fluid p-4">
                
          
                
             
                
                <!-- Recent Users Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="stat-card">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="text-primary" style="color: #2c3e50; font-weight: 600; margin: 0;">
                                    <i class="fas fa-clock"></i> Last Users
                                </h4>
                                <a href="{{ route('admin.users') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none;">
                                   <i class="fas fa-arrow-left"></i> View All 
                                </a>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead style="background: #f8f9fa;">
                                        <tr>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>Joined</th>
                                            <th>Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Lastusers as $user)
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </div>
</div>

@endsection