<ul id="js-nav-menu" class="nav-menu">
    <li {!! \Request::path() == 'admin' ? 'class="active"': '' !!}>
        <a href="{{ url('admin') }}" title="Home" data-filter-tags="Home">
            <i class="fal fa-desktop"></i>
            <span class="nav-link-text">Home</span>
        </a>
    </li>
    <li {!! \Request::path() == 'admin/projects' ? 'class="active"': '' !!}>
        <a href="{{ url('admin/projects') }}" title="Projects" data-filter-tags="Projects">
            <i class="fal fa-wrench"></i>
            <span class="nav-link-text">Projects</span>
        </a>
    </li>
    <li {!! strpos(\Request::path(), 'admin/user') !== false ? 'class="active open"': '' !!}>
        <a href="#" title="Users" data-filter-tags="users">
            <i class="fal fa-users"></i>
            <span class="nav-link-text">Users</span>
        </a>
        <ul>
            <li {!! \Request::path() == 'admin/users/customer' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/users/customer') }}" title="Agencies" data-filter-tags="users agencies">
                    <span class="nav-link-text">Agencies</span>
                </a>
            </li>
            <li {!! \Request::path() == 'admin/users/crew' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/users/crew') }}" title="Translators" data-filter-tags="users translators">
                    <span class="nav-link-text">Translators</span>
                </a>
            </li>
            <li {!! \Request::path() == 'admin/users/admin' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/users/admin') }}" title="Management" data-filter-tags="users admin">
                    <span class="nav-link-text">Management</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! \Request::path() == 'admin/messages' ? 'class="active"': '' !!}>
        <a href="{{ url('admin/messages') }}" title="Communications" data-filter-tags="communications messages">
            <i class="fal fa-comments"></i>
            <span class="nav-link-text">Messages</span>
        </a>
    </li>
    <li {!! \Request::path() == 'admin/skills' ? 'class="active"': '' !!}>
        <a href="{{ url('admin/skills') }}" title="Language Skills" data-filter-tags="language skills">
            <i class="fal fa-language"></i>
            <span class="nav-link-text">Language Skills</span>
        </a>
    </li>
    <li {!! \Request::path() == 'admin/prices' ? 'class="active"': '' !!}>
        <a href="{{ url('admin/prices') }}" title="Prices" data-filter-tags="prices">
            <i class="fal fa-money-bill"></i>
            <span class="nav-link-text">Prices</span>
        </a>
    </li>
    <li {!! strpos(\Request::path(), 'admin/countries') !== false ||
            strpos(\Request::path(), 'admin/language') !== false ||
            strpos(\Request::path(), 'admin/content') !== false ||
            strpos(\Request::path(), 'admin/categories') !== false ||
            strpos(\Request::path(), 'admin/degree') !== false ||
            strpos(\Request::path(), 'admin/roles') !== false ? 'class="open active"': '' !!}>
        <a href="#" title="Settings" data-filter-tags="settings">
            <i class="fal fa-cogs"></i>
            <span class="nav-link-text">Settings</span>
        </a>
        <ul>
            <li {!! strpos(\Request::path(), 'admin/countries') !== false ? 'class="active"': '' !!}>
                <a href="{{ url('admin/countries') }}" title="Countries" data-filter-tags="countries settings dashboard">
                    <span class="nav-link-text">Countries</span>
                </a>
            </li>
            <li {!! strpos(\Request::path(), 'admin/languages') !== false ? 'class="active"': '' !!}>
                <a href="{{ url('admin/languages') }}" title="Languages" data-filter-tags="languages settings dashboard">
                    <span class="nav-link-text">Languages</span>
                </a>
            </li>
            <li {!! strpos(\Request::path(), 'admin/contents') !== false ? 'class="active"': '' !!}>
                <a href="{{ url('admin/contents') }}" title="Content" data-filter-tags="content settings dashboard">
                    <span class="nav-link-text">Content text</span>
                </a>
            </li>
            <li {!! strpos(\Request::path(), 'admin/categories') !== false ? 'class="active"': '' !!}>
                <a href="{{ url('admin/categories') }}" title="Categories" data-filter-tags="categories settings dashboard">
                    <span class="nav-link-text">Categories</span>
                </a>
            </li>
            <li {!! strpos(\Request::path(), 'admin/degrees') !== false ? 'class="active"': '' !!}>
                <a href="{{ url('admin/degrees') }}" title="Degrees" data-filter-tags="degrees settings dashboard">
                    <span class="nav-link-text">Degrees</span>
                </a>
            </li>
            <li {!! strpos(\Request::path(), 'admin/roles') !== false ? 'class="active"': '' !!}>
                <a href="{{ url('admin/roles') }}" title="Roles" data-filter-tags="users roles settings dashboard">
                    <span class="nav-link-text">Roles</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
<div class="filter-message js-filter-message bg-success-600"></div>