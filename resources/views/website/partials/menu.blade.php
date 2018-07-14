<!--Header-->
<header>
    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav" style="top: 40px;">
        <div class="container">
            {{--<div class="search_btn btn_common"><i class="icon-icons185"></i></div>--}}
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset_website('images/logo.png')}}" alt="logo" class="logo logo-display">
                    <img src="{{asset_website('images/logo.png')}}" class="logo logo-scrolled" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOut">
                    @foreach($menus as $menu)
                        <li class="{{isset($menu['children']) && !empty($menu['children']) ? 'dropdown' : ''}}">
                            <a href="{{$menu['url']}}" class="dropdown-toggle" data-toggle="dropdown">{{$menu['text']}}</a>
                            @if(isset($menu['children']) && !empty($menu['children']))
                                <ul class="dropdown-menu">
                                    @foreach($menu['children'] as $child)
                                        <li><a href="{{$child['url']}}">{{$child['text']}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</header>

{{--<!--Search-->--}}
{{--<div id="search">--}}
    {{--<button type="button" class="close">×</button>--}}
    {{--<form>--}}
        {{--<input type="search" value="" placeholder="Search here...." required />--}}
        {{--<button type="submit" class="btn btn_common blue">Search</button>--}}
    {{--</form>--}}
{{--</div>--}}

