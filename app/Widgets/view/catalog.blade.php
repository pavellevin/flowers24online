<div class="widget widget-category">
    <div class="title-heading">
        <span>КАТАЛОГ</span>
    </div>
    <div class="widget-content">
        <ul>
            @foreach($catalog as $cat)
                <li><a href="/catalog/{{ $cat->slug }}">{{ $cat->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>