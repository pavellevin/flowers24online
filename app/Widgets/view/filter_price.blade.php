<div class="widget widget-filter-price">
    <div class="title-heading">
        <span>{{ __('messages.filter by price') }}</span>
    </div>
    <div class="widget-content">
        {{--<div class="slidecontainer">--}}
                {{--<input type="range" name="price" min="{{$minPrice}}" max="{{$maxPrice}}" value="{{$minPrice}}" class="slider"--}}
                       {{--id="myRange" onchange='document.querySelectorAll(".slidecontainer #min")[0].textContent = document.getElementById("myRange").value;'/>--}}
                {{--<p>₴<span id="min">{{ $minPrice }}</span> - ₴{{ $maxPrice }}</p>--}}
                {{--<button onclick="location.href='/catalog' + (catalog ? '/' + catalog : '') + '/filters=' + filters + document.getElementById('myRange').value + '&'" class="btn-outline btn-small btn-filter">Filter</button>--}}
        {{--</div>--}}
         <p>
             <i>{{ __('messages.price from') }},</i> {{ __('messages.uah') }}:
            <input type="text" id="amount1" readonly style="border:0; color:#80b43b; font-weight:bold;">
             <br/>
             <i>{{ __('messages.price to') }},</i> {{ __('messages.uah') }}:
            <input type="text" id="amount2" readonly style="border:0; color:#80b43b; font-weight:bold;">
        </p>
        <div id="slider-range"></div>
        <div class="mt-20">
        <button onclick="location.href='/catalog' + (catalog ? '/' + catalog : '') + '/filters=' + filters + document.getElementById('amount1').value + '&'+ document.getElementById('amount2').value+ '&'" class="btn-outline btn-small btn-filter">{{ __('messages.sort') }}</button>
        </div>
    </div>
</div>