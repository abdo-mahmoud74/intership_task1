document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    if (!sidebar || !sidebarToggle || !sidebarOverlay) {
        console.error('Sidebar elements not found!');
        return;
    }
    
    // فتح/إغلاق السايدبار
    sidebarToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleSidebar();
    });
    
    // إغلاق عند الضغط على الـ Overlay
    sidebarOverlay.addEventListener('click', function() {
        closeSidebar();
    });
    
    // إغلاق عند الضغط على أي لينك (للموبايل)
    const sidebarLinks = sidebar.querySelectorAll('.sidebar-menu a');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                setTimeout(closeSidebar, 300);
            }
        });
    });
    
    // Functions
    function toggleSidebar() {
        sidebar.classList.toggle('open');
        sidebarOverlay.classList.toggle('show');
    }
    
    function closeSidebar() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('show');
    }
    
    // إغلاق عند الضغط على ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && sidebar.classList.contains('open')) {
            closeSidebar();
        }
    });
});