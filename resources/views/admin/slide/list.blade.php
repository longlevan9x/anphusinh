<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/menu.list slide')])
            <div class="box-header with-border">
                <div style="float: left;">
                    @include('admin.layouts.widget.button.button_link.create', ['text' => __('admin/menu.add slide'), 'btn_size' => 'md', 'icon' => 'fa-plus', 'options' => ['data-style'=>"zoom-in", 'class' => 'ladda-button'], 'url' => route(\App\Http\Controllers\Admin\SlideController::getAdminRouteName('create'))])
                </div>
                <div style="float: left;">
                    @include('admin.layouts.widget.button.button_link.button', ['text' => __('admin/common.sort'), 'btn_size' => 'md',  'icon' => 'fa-arrows', 'btn_type' => 'default', 'url' => \App\Http\Controllers\Admin\SlideController::getResourceName('sort-order')])
                </div>
                <div style="float: left;">
                    @include('admin.layouts.widget.button.bulk-delete', ['table' => \App\Models\Slide::table(), 'classTable' => \App\Models\Slide::class])
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table {{\App\Models\Slide::table()}} table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th class="vertical-middle col-lg-1 col-md-1 col-sm-1 col-xs-1 ">
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            <th>@lang('admin/common.image')</th>
                            <th>@lang('admin/common.name')</th>
                            <th>@lang('Url')</th>
                            <th>@lang('admin/common.description')</th>
                            <th>@lang('admin/common.sort')</th>
                            <th>@lang('admin/common.is_active')</th>
                            <th>@lang('admin/news.author')</th>
                            <th>@lang('admin/common.created date')</th>
                            <th>@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.slide._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
