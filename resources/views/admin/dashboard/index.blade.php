@extends('admin.index')
@section('content')
    @php
        /** @var $itemQA \App\Models\Answer */
    @endphp
    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> @lang('admin.total post')</span>
            <div class="count">{{$totalPost}}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> @lang('admin.total new')</span>
            <div class="count">{{$totalNews}}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> @lang('admin.total order')</span>
            <div class="count green">{{$totalOrder}}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> @lang('admin.total store')</span>
            <div class="count">{{$totalStore}}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> @lang('admin.total answer')</span>
            <div class="count">{{$totalAnswer}}</div>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
            <div class="count">7,325</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
    </div>
    <!-- /top tiles -->

    <br />

    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('admin.recent question')</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="list-unstyled timeline widget">
                            @forelse($question_answer as $itemQA)
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>{{$itemQA->getQuestion()}}</a>
                                            </h2>
                                            <div class="byline">
                                                <span>{{get_time_line($itemQA->created_at)}}</span>
                                            </div>
                                            <p class="excerpt">{{$itemQA->getContentQuestion()}}…
                                                <a href="{{\App\Http\Controllers\Admin\AnswerController::getEditUrlAdmin($itemQA->id)}}">Read&nbsp;More</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Visitors location
                                <small>geo-presentation</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <div class="col-md-12 hidden-small">
                                    <h2 class="line_30">125.7k Views from 60 countries</h2>

                                    <table class="countries_list">
                                        <tbody>
                                        <tr>
                                            <td>United States</td>
                                            <td class="fs15 fw700 text-right">33%</td>
                                        </tr>
                                        <tr>
                                            <td>France</td>
                                            <td class="fs15 fw700 text-right">27%</td>
                                        </tr>
                                        <tr>
                                            <td>Germany</td>
                                            <td class="fs15 fw700 text-right">16%</td>
                                        </tr>
                                        <tr>
                                            <td>Spain</td>
                                            <td class="fs15 fw700 text-right">11%</td>
                                        </tr>
                                        <tr>
                                            <td>Britain</td>
                                            <td class="fs15 fw700 text-right">10%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="row">

                <!-- Start to do list -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>To Do List
                                <small>Sample tasks</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="">
                                <ul class="to_do">
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End to do list -->
            </div>
        </div>
    </div>
@endsection