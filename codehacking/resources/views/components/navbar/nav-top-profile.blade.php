<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user fa-fw dropdown-item"></i> User Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw dropdown-item"></i> Settings</a>
            </li>
            <li class="divider"></li>
            
            <li style="padding-left: 2rem">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><i class="fa fa-sign-out fa-fw dropdown-item"></i> Logout</button>
                </form>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
