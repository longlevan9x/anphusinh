@extends('admin.index')
@section('content')
    @php
        /** @var \App\Models\Traits\ModelUploadTrait $model */
    @endphp
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.layouts.title_form', ['title' => __('admin/common.sort') . " Slide"])
                <div class="x_content">
                    <ul id="sortable">
                        @include('admin.layouts.widget.button.button_link.button', ['url' => url_admin('slide'), 'icon' => 'fa-arrow-left', 'text' => __('admin/menu.list')])
                        @forelse($models as $model)
                            <li id="items-{{$model->id}}" style="padding: 10px;list-style: none;cursor: move;" class="ui-state-default">

                                <span style="float: left" class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                                <span>{{$model->name}}</span>

                                <div style="width: 80px;">{!! $model->showImage('image') !!}</div>
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
                            url:     "{{url_admin('slide/sort-order')}}",
                            success: function (response) {
                                if (response.message === "success") {
                                    PNotifySuccess("Thông báo", "Thứ tự đã được thay đổi.");
                                }
                            }
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection