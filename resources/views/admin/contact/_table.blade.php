@php /** @var App\Models\Contact $model*/ @endphp
<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    {{--<td class="a-center "><input type="checkbox" name="table_records"></td>--}}
    <td class="vertical-middle">{!! $model->name !!}</td>
    {{--<td class="vertical-middle">{!! $model->email !!}</td>--}}
    <td class="vertical-middle">{!! $model->phone !!}</td>
    <td class="vertical-middle">{!! $model->content !!}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle">
        @include('admin.layouts.widget.button.button_link.action-text', ['url' => \App\Http\Controllers\Admin\ContactController::getUrlAdmin($model->id), 'showEdit' => false])
    </td>
</tr>