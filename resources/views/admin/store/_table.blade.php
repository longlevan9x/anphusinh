<tr>
    <td class="a-center vertical-middle ">
        <input type="checkbox" class="check-one" name="table_records">
    </td>
    {{--<td class="a-center "><input type="checkbox" name="table_records"></td>--}}
{{--    <td class="vertical-middle">{{$model->getParentName(\App\Models\Category::TYPE_AREA)}}</td>--}}
    <td class="vertical-middle">{{$model->name}}</td>
    <td class="vertical-middle">{{$model->getAreaName()}}</td>
    <td class="vertical-middle">{{$model->getStreetName()}}</td>
    <td class="vertical-middle">{{$model->phone}}</td>
    <td class="vertical-middle col-lg-1 col-md-1 col-sm-1 col-xs-1 ">@component('admin.layouts.widget.labels.active'){{$model->is_active}} @endcomponent</td>
    <td class="vertical-middle">{{$model->address}}</td>
    <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 vertical-middle">
        @include('admin.layouts.widget.button.button_link.action', ['url' => \App\Http\Controllers\Admin\StoreController::getUrlAdmin($model->id),])
    </td>
</tr>