<style type="text/css">
    #popup_bottom_left {
        position: fixed;
        left: 0;
        bottom: 0;
        z-index: 1000;
        outline: 0;
        width: 240px;
    }

    .popup_bottom_left_header {
        position: absolute;
        top: 0px;
        right: 2px;
        color: #fff;
        font-weight: normal;
    }
</style>

<div id="popup_bottom_left">
    <div class="">
        <div class="popup_bottom_left_header">
            <button type="button" class="close" onclick="closePopup()">
                <i class="fa fa-remove" style="font-size: 30px"></i></button>
        </div>
        <a href="{{$banner_bottom_left['url']}}" style="width: 100px;height: 100px;">
            <img style="width: 100%; height: 100%" src="{{$banner_bottom_left['image']}}">
        </a>
    </div>
</div>

@push('scriptString')
    <script type="text/javascript">
        function closePopup() {
            $("#popup_bottom_left").addClass("hidden");
        }
    </script>
@endpush