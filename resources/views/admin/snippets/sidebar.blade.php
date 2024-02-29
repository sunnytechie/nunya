<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">Nunya</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'dashboard') active @endif">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'events.index') active @endif">
                <a class="sidebar-link" href="{{ route('events.index') }}">
                    <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Events</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'posts.index') active @endif">
                <a class="sidebar-link" href="{{ route('posts.index') }}">
                    <i class="align-middle" data-feather="file"></i> <span class="align-middle">News</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'slides.index') active @endif">
                <a class="sidebar-link" href="{{ route('slides.index') }}">
                    <i class="align-middle" data-feather="camera"></i> <span class="align-middle">Slides</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'projects.index') active @endif">
                <a class="sidebar-link" href="{{ route('projects.index') }}">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Projects</span>
                </a>
            </li>



            <li class="sidebar-header">
                Others
            </li>
            <li class="sidebar-item @if (Route::currentRouteName() == 'agegroup.index') active @endif">
                <a class="sidebar-link" href="{{ route('agegroup.index') }}">
                    <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Age Group</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'members.index') active @endif">
                <a class="sidebar-link" href="{{ route('members.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span
                        class="align-middle">Members</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'members.index') active @endif">
                <a class="sidebar-link" href="{{ route('members.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span
                        class="align-middle">Subscribers</span>
                </a>
            </li>

            <li class="sidebar-header">
                Settings
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'about.index') active @endif">
                <a class="sidebar-link" href="{{ route('about.index') }}">
                    <i class="align-middle" data-feather="alert-triangle"></i> <span
                        class="align-middle">About us</span>
                </a>
            </li>

            <li class="sidebar-item @if (Route::currentRouteName() == 'settings') active @endif">
                <a class="sidebar-link" href="{{ route('settings') }}">
                    <i class="align-middle" data-feather="settings"></i> <span
                        class="align-middle">Settings</span>
                </a>
            </li>

        </ul>


    </div>
</nav>
