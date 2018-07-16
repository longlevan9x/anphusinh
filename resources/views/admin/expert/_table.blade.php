<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    {{--<td class="a-center "><input type="checkbox" name="table_records"></td>--}}
    <td class="vertical-middle col-md-1">{!! $model->showImage('image') !!}</td>
    <td class="vertical-middle">{{$model->title}}</td>
    <td class="vertical-middle">{{$model->getAuthorName()}}</td>
    <td class="vertical-middle col-lg-1 col-md-1 col-sm-1 col-xs-1 ">@component('admin.layouts.widget.labels.active'){{$model->is_active}} @endcomponent</td>
    <td class="vertical-middle">{{$model->post_time}}</td>
    <td class="vertical-middle">{{$model->created_at}}</td>
    <td class="vertical-middle">{{$model->getAuthorUpdatedName()}}</td>
    <td class="vertical-middle">{{$model->updated_at}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle">
        @include('admin.layouts.widget.button.button_link.action-text', ['url' => \App\Http\Controllers\Admin\ExpertController::getUrlAdmin($model->id),])
    </td>
</tr>