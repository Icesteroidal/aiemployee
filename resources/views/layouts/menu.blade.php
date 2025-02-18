
<li class="nav-item">
    <a href="{{ route('aIEmployees.index') }}" class="nav-link {{ Request::is('aIEmployees*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>A I Employees</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('aITasks.index') }}" class="nav-link {{ Request::is('aITasks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>A I Tasks</p>
    </a>
</li>
