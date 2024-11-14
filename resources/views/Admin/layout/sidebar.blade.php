<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('Admin.dashboard')}}" class="brand-link">
        <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('Admin.profile.show', Auth::id()) }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('Admin.dashboard')}}" class="nav-link {{request()->routeIs('Admin.dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">CATEGORIES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.category.*') ? 'active' : ''}}">
                        <i class="bi bi-tags-fill"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.category.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">AUTHORS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.author.*') ? 'active' : ''}}">
                        <i class="fa-solid fa-feather"></i>
                        <p>
                            Authors
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.author.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Authors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.author.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Author</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">ARTICLES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.article.*') ? 'active' : ''}}">
                        <i class="fa-solid fa-newspaper"></i>
                        <p>
                            Articles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.article.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.article.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Article</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">COMMENTS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.comment.*') ? 'active' : ''}}">
                        <i class="fa-solid fa-comments"></i>
                        <p>
                            Comments
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.comment.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Comments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.comment.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Comment</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">USERS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.user.*') ? 'active' : ''}}">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.user.index')}}" class="nav-link">
                                <i class="bi bi-people-fill"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.user.create')}}" class="nav-link">
                                <i class="bi bi-person-fill-add"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">ADMINS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.admin.*') ? 'active' : ''}}">
                        <i class="bi bi-people-fill"></i>
                        <p>
                            Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.admin.index')}}" class="nav-link">
                                <i class="bi bi-people-fill"></i>
                                <p>All Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Admin.admin.create')}}" class="nav-link">
                                <i class="bi bi-person-fill-add"></i>
                                <p>Create Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">PAGES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{request()->routeIs('Admin.contact') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Admin.contact')}}" class="nav-link">
                                <i class="bi bi-chat-dots-fill"></i>
                                <p>All Messages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Admin.profile.show', Auth::id()) }}" class="nav-link">
                                <i class="bi bi-person-circle"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">AUTH</li>
                <li class="nav-item">
                    <a href="{{route('Admin.logout')}}" class="nav-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>