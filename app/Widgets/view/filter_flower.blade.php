<div class="widget widget-filter-color">
    <div class="title-heading">
        <span>{{ __('messages.filter') }}</span>
    </div>
    <div id="accordion">
        @foreach($attributes as $attribute)
            <div class="card">
            <div class="card-header" id="heading{{$attribute->id}}">
                <h4 class="mb-mt-0">
                    <button class="btn btn-link-filter" data-toggle="collapse" data-target="#collapse{{$attribute->id}}" aria-expanded="true" aria-controls="collapse{{$attribute->id}}">
                        {{$attribute->getValueGroupName($attribute)}}
                    </button>
                </h4>
            </div>

            <div id="collapse{{$attribute->id}}" class="collapse" aria-labelledby="heading{{$attribute->id}}" data-parent="#accordion">
                @foreach($attribute->attributes as $attr)
                <div class="card card-body">
                    <i class="triangle-topleft" style="border-top: 20px solid {{$attr->color_style}};"></i>
                    <li><a href="/catalog/{{$slug}}/filters={{$filters}}{{ mb_strtolower($attr->name_en) }}&">{{ $attr->getValueAttributeName($attr) }}</a></li>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    {{--@foreach($colors as $color)--}}
    {{--<div class="widget-content">--}}
        {{--<h4>{{$color->name}}</h4>--}}
        {{--<ul>--}}
            {{--@foreach($color->attributes as $attribute)--}}
            {{--<li><a href="/catalog/{{$slug}}/filters={{$filters}}{{ mb_strtolower($attribute->name) }}&">{{ $attribute->name }}</a></li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
     {{--@endforeach--}}
</div>