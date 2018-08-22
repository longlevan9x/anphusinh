@push('scriptFile')
    <script src="{{asset_website_js('jquery-2.2.3.js')}}"></script>
    <script src="{{asset_website_js('bootstrap.min.js')}}"></script>
    <script src="{{asset_website_js('bootsnav.js')}}"></script>
    <script src="{{asset_website_js('jquery.appear.js')}}"></script>
    <script src="{{asset_website_js('jquery-countTo.js')}}"></script>
    <script src="{{asset_website_js('jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset_website_js('owl.carousel.min.js')}}"></script>
    <script src="{{asset_website_js('jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{asset_website_js('jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset_website_js('jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset_website_js('revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset_website_js('revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset_website_js('revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset_website_js('revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset_website_js('revolution.extension.video.min.js')}}"></script>
    <script src="{{asset_website_js('wow.min.js')}}"></script>
    <script src="{{asset_website_js('functions.js')}}"></script>
    <script src="{{asset_website_js('website.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $("meta[name=\"csrf-token\"]").attr("content")
            }
        });
        // set tab page product
        $(document).ready(function () {
            //scroll button
            $("a").each(function () {
                let href = $(this).attr("href");
                if (href && href.charAt(0) === "#" && href !== "#") {
                    $(this).on("click", function () {
                        if ($(this).parent("li")) {
                            $("li").removeClass("active");
                            $("li a").removeClass("active");
                            $(this).addClass("active");
                        }

                        // return false;
                    });
                }
            });

            let $debug = true;
            if  (window.location.hostname !== 'localhost') {
                $debug = false;
            }
            $(document).keydown(function (event) {
                if ((event.which === 123) && !$debug) {
                    alert("Chúc bạn một ngày vui vẻ. Chức năng này đã dừng hoạt động.");
                    return false;
                }
            });
            $(document).mousedown(function (event) {
                if (event.which === 3 && !$debug) {
                    $(".modal-index").modal("show");
                }
            });
            if (!$debug) {
                $(document).contextmenu(function () {
                    return false;
                });
            }
            $(".modal-header #back").click(function () {
                window.history.back();
            });

            $(".modal-header #forward").click(function () {
                window.history.forward();
            });

            $(".modal-header #refresh").click(function () {
                window.location.reload(true);
            });
        });
    </script>
@endpush