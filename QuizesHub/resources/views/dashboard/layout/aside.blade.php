<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <p class="navbar-brand">Quizzes Hub</p>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{ route('admin.home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>
            <h3 class="menu-title">Entities</h3><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Users</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="ui-buttons.html">All Users</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="ui-badges.html">Add user</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Courses</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{ route('admin.courses.index')}}">All Courses</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.courses.create')}}">Add Course</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.courses.archive')}}">Archive</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-paper-plane"></i>Feedbacks</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{ route('admin.feedbacks.index')}}">All Feedbacks</a></li>

                </ul>
            </li>

            {{-- Exams --}}
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Exams</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{route('admin.exams.index')}}">All Exams</a></li>
                    <li><i class="menu-icon fa fa-id-plus"></i><a href="{{route('admin.exams.create')}}">Add Exam</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Levels</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{ route('admin.levels.index')}}">All Levels</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.levels.create')}}">Add Level</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.levels.archive')}}">Archive</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Universities</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{ route('admin.universities.index')}}">All Universities</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.universities.create')}}">Add University</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.universities.archive')}}">Archive</a></li>
                    <i class="fa-solid fa-school"></i>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-desktop"></i>Faculties</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{ route('admin.faculties.index')}}">All Faculties</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.faculties.create')}}">Add Faculty</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.faculties.archive')}}">Archive</a></li>
                    <i class="fa-solid fa-school"></i>

                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Majors</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badg"></i><a href="{{ route('admin.majors.index')}}">All Majors</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.majors.create')}}">Add Major</a></li>
                    <li><i class="fa fa-id-plus"></i><a href="{{ route('admin.majors.archive')}}">Archive</a></li>
                    <i class="fa-solid fa-school"></i>

                </ul>
            </li>

            <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                    <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                    <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
