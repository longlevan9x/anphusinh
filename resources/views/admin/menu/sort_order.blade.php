@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.layouts.title_form', ['title' => __('admin/menu.sort_order_menu')])
                <div class="x_content">
                    <ul id="sortable">
                        @include('admin.layouts.widget.button.button_link.button', ['url' => url_admin('menu'), 'icon' => 'fa-arrow-left', 'text' => __("Trở về danh sách menu")])
                        @forelse($models as $model)
                            <li id="items-{{$model->id}}" style="padding: 10px;list-style: none;cursor: move;" class="ui-state-default">
                                <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$model->name}}
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @push('scriptString')
        <script>
            $(function () {
                $("#sortable").sortable({
                    axis:   "y",
                    update: function (event, ui) {
                        var data = $(this).sortable("serialize");
                        // POST to server using $.post or $.ajax
                        $.ajax({
                            data:    data,
                            type:    "POST",
                            url:     "{{url_admin('menu/sort-order')}}",
                            success: function (response) {
                                if (response.message === 'success') {
                                    PNotifySuccess('Thông báo', 'Thứ tự đã được thay đổi.');
                                }
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection