<!-- Navbar -->
<style>
    .notifyLi{
        padding: 10px;
        border-bottom: 1px solid #d2d2d2;
    }
    .not-p{
        font-size: 12px;
    }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"
                ><i class="fas fa-bars"></i
            ></a>
        </li>

    </ul>
    <a id="downloadButton" style="display: none" class="button">
        Download
    </a>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"><i class="fa fa-bell-o" style="color: #7571f9"></i> Notifications</span>
            </a>
            <ul id="notify" class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-height: 100px">

            </ul>
        </li>

        <li class="nav-item dropdown user user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                @if (Auth::user()->employee)
                @else
                    <img src="/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2 alt="User Image">
                @endif
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    @if (Auth::user()->employee)
                        <img src="/storage/employee_photos/{{ Auth::user()->employee->photo }}" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    @endif

                    <p>
                        {{ Auth::user()->name }}
                        @if ( Auth::user()->employee )
                            - {{ Auth::user()->employee->desg }}, {{ Auth::user()->employee->department->name }}
                        @endif
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body text-center">
                    @if ( Auth::user()->employee )
                        <small>Member since {{ Auth::user()->employee->join_date->format('d M, Y') }}</small>
                @endif
                <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="pull-left">
                        @if ( Auth::user()->employee )
                            <a href="{{ route('employee.profile') }}" class="btn btn-default btn-flat">Profile</a>
                        @else
                            <a href="{{ route('admin.reset-password') }}" class="btn btn-default btn-flat">Change Password</a>
                        @endif
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}"
                           class="btn btn-default btn-flat"
                           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                        >Sign out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">--}}
{{--                <i class="fas fa-th-large"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>

<script>


        $.ajax({
            type: "GET",
            url: "{{route('notifications',['id' => Auth::id()])}}",
        }).done(function(o) {
            console.log(o.response);
            var body="";
            if(o.response){
                $.each(o.response, function( index, value ) {
                    body+="<li class='notifyLi'><a href='"+value.body+"'><p class='not-p'><i class='fa fa-bell-o'></i> "+value.subject+"</p></a></li>";
                });
                $("#notify").html(body);
            }else{

            }

        });
</script>
