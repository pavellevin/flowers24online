<div class="other-menu-lang">
    <div class="dropdown-phone">
        <span>{{ mb_strtoupper(app()->getLocale()) }}</span>
        <i class="pe-7s-angle-down"></i>
        <div class="dropdown-content">
            <a href="{{route('locale', 'uk')}}"><p>UA</p></a>
            <a href="{{route('locale', 'ru')}}"><p>RU</p></a>
            <a href="{{route('locale', 'en')}}"><p>EN</p></a>
        </div>
    </div>
</div>