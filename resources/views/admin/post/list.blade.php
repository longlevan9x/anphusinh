<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="x_panel">
            @include('admin.layouts.title_table', ['text' => 'List department'])
            @include('admin.layouts.widget.button.button_link.create', ['text' => __("Add Posts"), 'btn_size' => 'md', 'icon' => 'fa-plus', 'options' => ['data-style'=>"zoom-in", 'class' => 'ladda-button'], 'url' => route(\App\Http\Controllers\Admin\PostController::getAdminRouteName('create'))])
            <div class="x_content">
                <div class="table-responsive">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="check-all" class="">
                            </th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Is Active</th>
                            <th>Publish Date</th>
                            <th>Created Date</th>
                            <th>Author Update</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('admin.post._table', $models, 'model', 'admin.layouts.widget.list-empty')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
