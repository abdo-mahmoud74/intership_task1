<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <!-- زرار التحكم -->
    <button class="sidebar-toggle-btn mt-5" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <div class="sidebar-content">
        <div class="sidebar-header">
            <h4><i class="fas fa-list"></i> Dashboard</h4>
        </div>
        
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span>Main</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
           
          
        </ul>
        {{-- logout --}}
         <div class="sidebar-logout">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>