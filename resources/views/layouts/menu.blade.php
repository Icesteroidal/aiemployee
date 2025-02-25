
<li class="nav-item">
    <a href="{{ route('a-i-employees.index') }}" class="nav-link {{ Request::is('aIEmployees*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>A I Employees</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('a-i-tasks.index') }}" class="nav-link {{ Request::is('aITasks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>A I Tasks</p>
    </a>
</li>
