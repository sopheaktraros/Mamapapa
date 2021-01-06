<nav id="sidebar" class="dark">
    <a href="{{ route('dashboard') }}" id="brand">
        {{ setting('app_name') }}
    </a>

    <ul id="nav" class="nav scroller">
        <li>
            <p>Academic</p>
        </li>
        <li {{ Request::segment(1) == 'students' ? 'class=active' : ""}}>
            <a href="{{ route('students.index') }}">
                <i class="fal fa-graduation-cap"></i>
                <span>Students</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'teachers' ? 'class=active' : ""}}>
            <a href="{{ route('teachers.index') }}">
                <i class="fal fa-user-alt"></i>
                <span>Teachers</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'applicants' ? 'class=active' : ""}}>
            <a href="{{ route('applicants.index') }}">
                <i class="fal fa-users"></i>
                <span>Applicants</span>
            </a>
        </li>
        <li {{ request()->is('scores') || request()->is('scores/*') ? 'class=active' : ""}}>
            <a href="{{ route('scores.index') }}">
                <i class="fal fa-star"></i>
                <span>Scores</span>
            </a>
        </li>
        <li {{ request()->is('terms') ? 'class=active' : ""}}>
            <a href="{{ route('terms.index') }}">
                <i class="fal fa-bookmark"></i> <span>Terms</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'departments' ? 'class=active' : ""}}>
            <a href="{{ route('departments.index') }}">
                <i class="fal fa-language"></i>
                <span>Departments</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'programs' ? 'class=active' : ""}}>
            <a href="{{ route('programs.index') }}">
                <i class="fal fa-audio-description"></i>
                <span>Programs</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'levels' ? 'class=active' : ""}}>
            <a href="{{ route('levels.index') }}">
                <i class="fal fa-signal"></i>
                <span>Levels</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'classrooms' ? 'class=active' : ""}}>
            <a href="{{ route('classrooms.index') }}">
                <i class="fal fa-chalkboard-teacher"></i>
                <span>Classrooms</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'subjects' ? 'class=active' : ""}}>
            <a href="{{ route('subjects.index') }}">
                <i class="fal fa-book"></i>
                <span>Subjects</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'room-types' ? 'class=active' : ""}}>
            <a href="{{ route('room-types.index') }}">
                <i class="fal fa-list"></i>
                <span>Room Types</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'timetables' ? 'class=active' : ""}}>
            <a href="{{ route('timetables.index') }}">
                <i class="fa fa-calendar-alt"></i>
                <span>Timetable</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'other-payments' ? 'class=active' : ""}}>
            <a href="{{ route('other-payments.index') }}">
                <i class="fal fa-book"></i>
                <span>Other Payment</span>
            </a>
        </li>
        <li>
            <p>Report</p>
        </li>
        <li {{ Request::segment(1) == 'other-payment-reports' ? 'class=active' : ""}}>
            <a href="{{ route('other-payment-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Other Payment</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'suspend-student-reports' ? 'class=active' : ""}}>
            <a href="{{ route('suspended-student-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Suspend Student</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'dropped-student-reports' ? 'class=active' : ""}}>
            <a href="{{ route('dropped-student-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Dropped Student</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'student-payment-reports' ? 'class=active' : ""}}>
            <a href="{{ route('student-payment-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Student Payment</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'delete-payment-reports' ? 'class=active' : ""}}>
            <a href="{{ route('delete-payment-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Delete Payment</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'unpaid-student-reports' ? 'class=active' : ""}}>
            <a href="{{ route('unpaid-student-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Unpaid Student</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'student-registration-reports' ? 'class=active' : ""}}>
            <a href="{{ route('student-registration-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Student Register</span>
            </a>
        </li>

        <li {{ Request::segment(1) == 'study-fee-discount-reports' ? 'class=active' : ""}}>
            <a href="{{ route('study-fee-discount-reports.index') }}">
                <i class="fal fa-book"></i>
                <span>Study Discount</span>
            </a>
        </li>

        {{--Place this at the bottom--}}
        <li {{ Request::segment(2) == 'audit-trails' ? 'class=active' : ""}}>
            <a href="{{ route('audit-trail-reports.index') }}">
                <i class="fal fa-eye"></i>
                <span>Audit Trails</span>
            </a>
        </li>

        <li>
            <p>Security</p>
        </li>
        <li {{ Request::segment(1) == 'users' ? 'class=active' : ""}}>
            <a href="{{ route('users.index') }}">
                <i class="fal fa-users-cog"></i> <span>Users</span>
            </a>
        </li>
        <li {{ Request::segment(1) == 'roles' ? 'class=active' : ""}}>
            <a href="{{ route('roles.index') }}">
                <i class="fal fa-medal"></i> <span>Roles</span>
            </a>
        </li>

        <li>
            <p>Settings</p>
        </li>
        <li>
            <a href="{{ route('settings.index') }}">
                <i class="fal fa-cog"></i>
                General
            </a>
        </li>
        <li>
            <a href="{{ route('settings.academics') }}">
                <i class="fal fa-book"></i> <span>Academic</span>
            </a>
        </li>
        <li>
            <a href="{{ route('branches.index') }}">
                <i class="fal fa-school"></i> <span>Branches</span>
            </a>
        </li>
    </ul>
</nav>
