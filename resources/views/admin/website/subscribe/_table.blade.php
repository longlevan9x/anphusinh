@php /** @var App\Models\Traits\ModelTrait|\Illuminate\Database\Eloquent\Model|\App\Models\Post $model*/ @endphp
<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    <td class="vertical-middle">{{$model->content}}</td>
    <td class="vertical-middle">{{$model->overview}}</td>
    <td class="vertical-middle col-lg-1 col-md-1 col-sm-1 col-xs-1 ">{!! $model->getIsActiveLabel()  !!}</td>
    <td class="vertical-middle">{{$model->created_at}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle">
        @include('admin.layouts.widget.button.delete', ['', 'url' => \App\Http\Controllers\Admin\WebsiteController::getConfigUrlAdmin('subscribe', $model->id)])
    </td>
</tr>