<div class="products-top-wrap">
    <div class="box-left">
        <div class="display-mode display-mode-default hidden-xs">
            <button class="btn-grid" value="grid" name="display" type="submit"><i
                        class="icons-grid"></i></button>
            <button class="btn-list" value="list" name="display" type="submit"><i
                        class="icons-list"></i></button>
        </div>
        <span class="results">{{ __('messages.shown') }}

            @if($products->currentPage() ==1)
                {{ $products->currentPage() }}
            @else
                {{ $products->currentPage() * $products->perPage() + 1 }}
            @endif
            –{{ $products->currentPage() * $products->perPage()}} {{ __('messages.from') }} {{ $products->total() }}
            {{ __('messages.results') }}</span>
    </div>
    <div class="box-right">
        <div class="display-mode display-mode-filter hidden-lg hidden-md">
            <button data-toggle="collapse" data-target="#collapse" class="tp_btn_search"><i class="pe-7s-filter"></i>
            </button>
        </div>
        <div class="select-filter">
            <span>{{ __('messages.sort by') }}:</span>
            {{--<select name="selectpicker" class="selectpicker" onchange="location.href=(typeof catalog !== 'undefined' ? '/catalog/' + catalog : '/shop') + '/' + this.value">--}}
            <select id="sortby-section" name="selectpicker" class="selectpicker2" onchange="setSortby()">
                <option value="default" @if(isset($_COOKIE['sortBy']) && $_COOKIE['sortBy'] == 'popularity') selected @endif>{{ __('messages.default') }}</option>
                <option value="popularity"
                        @if(isset($_COOKIE['sortBy']) && $_COOKIE['sortBy'] == 'popularity') selected @endif>{{ __('messages.popularity') }}</option>
                <option value="lowerprice"
                        @if(isset($_COOKIE['sortBy']) && $_COOKIE['sortBy'] == 'lowerprice') selected @endif>{{ __('messages.from low price') }}</option>
                <option value="highestprice"
                        @if(isset($_COOKIE['sortBy']) && $_COOKIE['sortBy'] == 'highestprice') selected @endif> {{ __('messages.from high price') }}</option>
                <option value="newness"
                        @if(isset($_COOKIE['sortBy']) && $_COOKIE['sortBy'] == 'newness') selected @endif>{{ __('messages.new items') }}</option>
            </select>
        </div>
    </div>
</div>
    <div class="box-filter">
        <div id="collapse" aria-labelledby="heading" class="collapse" style="height: 0px;" aria-expanded="false">
            @isset($catalog)
                @widget('filter_flower', ['slug' => $catalog->slug, 'filters' => $filters])
            @endisset
        </div>
    </div>
