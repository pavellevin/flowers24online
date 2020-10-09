<div class="widget widget-filter-color">
    <div class="title-heading">
        <span>ФИЛЬТР ПО ЦВЕТУ</span>
    </div>
    <div class="widget-content">
        <ul>
            @foreach($colors as $color)
            <li><a href="/catalog/{{$slug}}/filters={{$filters}}{{ mb_strtolower($color->name) }}&">{{ $color->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>