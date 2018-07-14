@push('scriptFile')
    <script src="{{asset_app_js('jquery-2.2.3.js')}}"></script>
    <script src="{{asset_app_js('bootstrap.min.js')}}"></script>
    <script src="{{asset_app_js('bootsnav.js')}}"></script>
    <script src="{{asset_app_js('jquery.appear.js')}}"></script>
    <script src="{{asset_app_js('jquery-countTo.js')}}"></script>
    <script src="{{asset_app_js('jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{asset_app_js('owl.carousel.min.js')}}"></script>
    <script src="{{asset_app_js('jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{asset_app_js('jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset_app_js('jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset_app_js('revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset_app_js('revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset_app_js('revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset_app_js('revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset_app_js('revolution.extension.video.min.js')}}"></script>
    <script src="{{asset_app_js('wow.min.js')}}"></script>
    <script src="{{asset_app_js('functions.js')}}"></script>
    <script type="text/javascript">
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
                            $(this).addClass('active');
                        }

                        // return false;
                    });
                }
            });
        });
    </script>
@endpush