<div class="products-top-wrap">
    <div class="box-left">
        <div class="display-mode display-mode-default">
            <button class="btn-grid" value="grid" name="display" type="submit"><i
                        class="icons-grid"></i></button>
            <button class="btn-list" value="list" name="display" type="submit"><i
                        class="icons-list"></i></button>
        </div>
        <span class="results">Показано
            @if($products->currentPage() ==1)
                {{ $products->currentPage() }}
            @else
                {{ $products->currentPage() * $products->perPage() + 1 }}
            @endif
            –{{ $products->currentPage() * $products->perPage()}} из {{ $products->total() }}
            результатов</span>
    </div>
    <div class="box-right">
        <div class="select-filter">
            <span>Сортировать по:</span>
            {{--<select name="selectpicker" class="selectpicker" onchange="location.href=(typeof catalog !== 'undefined' ? '/catalog/' + catalog : '/shop') + '/' + this.value">--}}
            <select name="selectpicker" class="selectpicker2" onchange="location.href=document.location.href.replace(/\&.*/, '&') + '/' + this.value">
                <option value="" @if(!$sortby) selected @endif>умолчанию</option>
                <option value="popularity" @if($sortby == 'popularity') selected @endif>популярности</option>
                <option value="lowerprice" @if($sortby == 'lowerprice') selected @endif>от низкой цены</option>
                <option value="highestprice" @if($sortby == 'highestprice') selected @endif> от высокой цены</option>
                <option value="newness" @if($sortby == 'newness') selected @endif>новинки</option>
            </select>
        </div>
    </div>
</div>