<div class="widget widget-filter-price">
    <div class="title-heading">
        <span>ФИЛЬТР ПО ЦЕНЕ</span>
    </div>
    <div class="widget-content">
        <div class="slidecontainer">
            {{--<form action="{{ route('shop') }}" method="post">--}}
                {{--{{ csrf_field() }}--}}
                <input type="range" name="price" min="{{$minPrice}}" max="{{$maxPrice}}" value="{{$minPrice}}" class="slider"
                       id="myRange" onchange='document.querySelectorAll(".slidecontainer #min")[0].textContent = document.getElementById("myRange").value;'/>
                <p>₴<span id="min">{{ $minPrice }}</span> - ₴{{ $maxPrice }}</p>
                {{--<span class="btn-outline btn-small btn-filter"><a href="/catalog/{{$slug}}?filters/minprice={{ mb_strtolower($color->name) }}&">Filter</a></span>--}}
                <button onclick="location.href='/catalog' + (catalog ? '/' + catalog : '') + '/filters=' + filters + document.getElementById('myRange').value + '&'" class="btn-outline btn-small btn-filter">Filter</button>
            {{--</form>--}}
        </div>
    </div>
</div>