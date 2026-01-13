<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow-sm min-vh-100">
    <div class="position-sticky pt-3">
        <h5 class="px-3 mb-3 text-muted">Admin Menu</h5>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'active fw-bold bg-white' : '' }}" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.categories.index') ? 'active fw-bold bg-white' : '' }}" href="{{ route('admin.categories.index') }}">
                    <i class="bi bi-tags"></i> Manage Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.users.index') ? 'active fw-bold bg-white' : '' }}" href="{{  Route('admin.users.index') }}">
                    <i class="bi bi-people"></i> Manage Users
                </a>
            </li>

             <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.jobs.index') ? 'active fw-bold bg-white' : '' }}" href="{{  Route('admin.jobs.index') }}">
                    <i class="bi bi-people"></i> Manage Jobs
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.applications.index') ? 'active fw-bold bg-white' : '' }}" href="{{  Route('admin.applications.index') }}">
                    <i class="bi bi-people"></i> Manage applications
                </a>
            </li>

        </ul>
    </div>
</div>