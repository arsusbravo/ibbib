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
    <li {!! strpos(\Request::path(), 'admin/role/') !== false ? 'class="active open"': '' !!}>
        <a href="#" title="Users" data-filter-tags="users">
            <i class="fal fa-users"></i>
            <span class="nav-link-text">Users</span>
        </a>
        <ul>
            <li>
                <a href="{{ url('admin/role/customers') }}" title="Agencies" data-filter-tags="users agencies">
                    <span class="nav-link-text">Agencies</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/role/crews') }}" title="Translators" data-filter-tags="users translators">
                    <span class="nav-link-text">Translators</span>
                </a>
            </li>
            <li>
                <a href="{{ url('admin/role/admin') }}" title="Management" data-filter-tags="users admin">
                    <span class="nav-link-text">Management</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! \Request::path() == 'admin/messages' ? 'class="active"': '' !!}>
        <a href="{{ url('admin/messages') }}" title="Communications" data-filter-tags="communications messages">
            <i class="fal fa-comments"></i>
            <span class="nav-link-text">Communications</span>
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
            \Request::path() == 'admin/languages' ||
            \Request::path() == 'admin/contents' ||
            \Request::path() == 'admin/categories' ||
            \Request::path() == 'admin/roles' ||
            \Request::path() == 'admin/users' ? 'class="open active"': '' !!}>
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
            <li {!! \Request::path() == 'admin/languages' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/languages') }}" title="Languages" data-filter-tags="languages settings dashboard">
                    <span class="nav-link-text">Languages</span>
                </a>
            </li>
            <li {!! \Request::path() == 'admin/contents' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/contents') }}" title="Content" data-filter-tags="content settings dashboard">
                    <span class="nav-link-text">Content text</span>
                </a>
            </li>
            <li {!! \Request::path() == 'admin/categories' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/categories') }}" title="Categories" data-filter-tags="categories settings dashboard">
                    <span class="nav-link-text">Categories</span>
                </a>
            </li>
            <li {!! \Request::path() == 'admin/roles' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/roles') }}" title="Roles" data-filter-tags="users roles settings dashboard">
                    <span class="nav-link-text">Roles</span>
                </a>
            </li>
            <li {!! \Request::path() == 'admin/users' ? 'class="active"': '' !!}>
                <a href="{{ url('admin/users') }}" title="Roles" data-filter-tags="users settings dashboard">
                    <span class="nav-link-text">Users</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
<div class="filter-message js-filter-message bg-success-600"></div>