@include('app.layouts.header')
<body>
  <div class="wrapper">
    <header class="navbar navbar-fixed">
          <div class="navbar--header">
              <a href="{{ url('admin/dashboard') }}" class="logo">
                <img src="{{url('app/img/logo-menu.png')}}" alt="Logo" style="width: 90%;">
              </a>
          </div>
          <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
              <i class="fa fa-bars"></i>
          </a>
          <div class="navbar--nav ml-auto">
              <ul class="nav">
                  <li class="nav-item dropdown nav--user">
                      <a href="#" class="nav-link" data-toggle="dropdown">
                          <img src="{{ url('app/img/user.png') }}" alt="" class="rounded-circle">
                          <span>{{ auth()->user()->name }}</span>
                          <i class="fa fa-angle-down"></i>
                      </a>

                      <ul class="dropdown-menu">
                          <li><a href="{{url('admin/logout')}}"><i class="fa fa-power-off"></i>Logout</a></li>
                      </ul>
                  </li>
              </ul>
          </div>
      </header>
      <aside class="sidebar" data-trigger="scrollbar">
        <div class="sidebar--nav">
          @include('app.layouts.menu')
        </div>
    </aside>
    @include('app.layouts.footer')
