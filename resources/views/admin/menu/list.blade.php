<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/menu.list menu')])
            <div class="box-header with-border">
                <div style="float: left;">
                    @include('admin.layouts.widget.button.button_link.create', ['text' => __("admin/menu.add menu"), 'btn_size' => 'md', 'icon' => 'fa-plus', 'options' => ['data-style'=>"zoom-in", 'class' => 'ladda-button'], 'url' => route(\App\Http\Controllers\Admin\MenuController::getAdminRouteName('create'))])
                </div>
                <div style="float: left;">
                    @include('admin.layouts.widget.button.bulk-delete', ['table' => \App\Models\Menu::table(), 'classTable' => \App\Models\Menu::class])
                </div>
                @include('admin.layouts.widget.button.button_link.button', ['url' => \App\Http\Controllers\Admin\MenuController::getResourceName('sort-order'), 'text' => "Sắp xếp thứ tự menu", 'btn_size' => "md", 'icon' => 'fa-arrows', 'btn_type' => "default"])
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table {{\App\Models\Menu::table()}} table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th class="col-md-1 col-sm-1 col-xs-1 col-lg-1">
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            {{--<th>Parent</th>--}}
                            <th>@lang('admin/common.title')</th>
                            <th>@lang('admin/common.sort_order')</th>
                            <th>@lang('admin/common.is_active')</th>
                            <th>@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.menu._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
