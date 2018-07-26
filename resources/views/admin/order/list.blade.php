<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/order.list order')])
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table {{\App\Models\Post::table()}} table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            <th class="vertical-middle text-center">@lang('admin/common.name')</th>
                            <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">@lang('admin/common.phone number')</th>
                            <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">@lang('admin/common.quantity')</th>
                            <th class="vertical-middle text-center">@lang('admin/common.total_money')</th>
                            <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">@lang('admin/common.is_active')</th>
                            <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">@lang('admin/order.status order')</th>
                            <th class="vertical-middle text-center">@lang('admin/order.shipping address')</th>
                            <th class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">@lang('admin/order.ngay dat hang')</th>
                            <th class="vertical-middle text-center">@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.order._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
