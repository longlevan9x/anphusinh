<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => __('admin/q-a.list q-a')])
            <div class="box-header with-border">
                <div style="float: left;">
                    @include('admin.layouts.widget.button.button_link.create', ['text' => __("admin/q-a.add q-a"), 'btn_size' => 'md', 'icon' => 'fa-plus', 'options' => ['data-style'=>"zoom-in", 'class' => 'ladda-button'], 'url' => route(\App\Http\Controllers\Admin\AnswerController::getAdminRouteName('create'))])
                </div>
                @include('admin.layouts.widget.button.bulk-delete', ['table' => \App\Models\Post::table(), 'classTable' => \App\Models\Post::class])
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table {{\App\Models\Post::table()}} table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            <th>@lang('admin.question')</th>
                            <th>@lang('admin/common.name')</th>
                            <th>@lang('admin/common.phone')</th>
                            <th>@lang('admin/q-a.content question')</th>
                            <th>@lang('admin/q-a.answer')</th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin/common.action')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.answer._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
