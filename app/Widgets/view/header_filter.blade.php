<header id="main-header-filter" class="header-filter visible-md">
    <div class="container-fluid">
        <div class="inner row">
            @foreach($attributes as $attribute)
            <div class="col-lg-3 col-md-3 col-xs-3 text-center">
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenu{{$attribute->id}}"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$attribute->getValueGroupName($attribute)}}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenu{{$attribute->id}}">
                        <ul class="header-filter">
                        @foreach($attribute->attributes as $attr)
                        <li><a class="dropdown-item" href="/catalog/{{$slug}}/filters={{$filters}}{{ mb_strtolower($attr->name_en) }}&">{{ $attr->getValueAttributeName($attr) }}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
    </div>
</header>
