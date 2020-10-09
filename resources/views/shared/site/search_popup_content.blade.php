<div id="mymodal" class="modal mymodal" role="dialog">
    <button type="button" class="close" data-dismiss="modal"><span class="pe-7s-close"></span></button>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" class="searchform" action="{{ route('search') }}">
                {{ csrf_field() }}
                <div class="pbr-search input-group">
                    <input name="search" maxlength="40" class="form-control input-large input-search" size="20"
                           placeholder="{{ __('messages.search') }}..." type="text">
                    <span class="input-group-addon input-large btn-search">
                            <input value="" type="submit">
                        </span>
                </div>
            </form>
        </div>
    </div>
</div>
