<div class="search-popup search_modal search">
    @if(!Auth::check())
        <a href="{{route('login')}}">
            <i class="pe-7s-user"></i>
        </a>
    @else
        <a href="{{route('logout')}}">
            <i class="pe-7s-delete-user"></i>
        </a>
        @endif
        </a>
</div>

