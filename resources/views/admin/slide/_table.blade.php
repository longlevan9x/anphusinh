@php /** @var App\Models\Slide $model*/ @endphp
<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    {{--<td class="a-center "><input type="checkbox" name="table_records"></td>--}}
    <td class="vertical-middle col-md-1">{!! $model->showImage('image') !!}</td>
    <td class="vertical-middle">{!! $model->name !!}</td>
    <td class="vertical-middle">{!! $model->url !!}</td>
    <td class="vertical-middle">{!! $model->description !!}</td>
    <td class="vertical-middle">{!! $model->sort_order !!}</td>
    <td class="vertical-middle col-lg-1 col-md-1 col-sm-1 col-xs-1 ">{!! $model->getIsActiveLabel() !!}</td>
    <td class="vertical-middle">{{$model->getAuthorName()}}</td>
    <td class="vertical-middle">{{$model->created_at}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle">
        @include('admin.layouts.widget.button.button_link.action-text', ['url' => \App\Http\Controllers\Admin\SlideController::getUrlAdmin($model->id),])
    </td>
</tr>