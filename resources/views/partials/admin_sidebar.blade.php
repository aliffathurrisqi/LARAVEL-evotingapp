<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark h-100">
    <a href="/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi pe-none me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="/admin" class="nav-link {{ $title === 'Dashboard' ? 'active' : 'text-white' }}">
                <i class="bi bi-pie-chart-fill me-1"></i> Dashboard
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/candidate" class="nav-link {{ $title === 'Kandidat' ? 'active' : 'text-white' }}">
                <i class="bi bi-person-circle me-1"></i> Kandidat
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/admin/user" class="nav-link {{ $title === 'User' ? 'active' : 'text-white' }}">
                <i class="bi bi-person-fill me-1"></i> User
            </a>
        </li>
    </ul>
</div>
