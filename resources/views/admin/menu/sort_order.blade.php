@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.layouts.title_form', ['title' => __('admin/menu.sort_order_menu')])
                <div class="x_content">
                    <ul id="sortable">
                        @forelse($models as $model)
                            <li id="items-{{$model->id}}" style="padding: 10px;list-style: none;cursor: move;" class="ui-state-default">
                                <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$model->title}}
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
                            data: data,
                            type: "POST",
                            url:  "{{url_admin('menu/sort-order')}}"
                        });
                    }
                });
            });
        </script>
    @endpush
@endsection