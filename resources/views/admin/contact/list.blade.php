<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/menu.list slide')])
            <div class="box-header with-border">
                <div style="float: left;">
                    @include('admin.layouts.widget.button.bulk-delete', ['table' => \App\Models\Contact::table(), 'classTable' => \App\Models\Contact::class])
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table {{\App\Models\Contact::table()}} table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th class="vertical-middle col-lg-1 col-md-1 col-sm-1 col-xs-1 ">
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            <th>@lang('admin/common.name')</th>
                            <th>@lang('admin/common.phone')</th>
{{--                            <th>@lang('admin/common.email')</th>--}}
                            <th>@lang('admin/common.content')</th>
                            <th>@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.contact._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
