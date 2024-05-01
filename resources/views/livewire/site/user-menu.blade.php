<div>
    <div class="nav-item dropdown">
        <span class="nav-link"  data-toggle="dropdown">{{auth()->user()->name}}</span>
        <div class="dropdown-menu text-center">
            <a href="{{route('clint.profile')}}" class="dropdown-item"><i class="fa-solid fa-user"></i> {{__('t.profile')}}</a>
            <a href="" class="dropdown-item"
               href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"
            ><i class="fa fa-power-off"></i> {{__('t.signout')}}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
