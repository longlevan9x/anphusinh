@php /** @var App\Models\Traits\ModelTrait|\Illuminate\Database\Eloquent\Model|\App\Models\Order $model*/ @endphp
<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    {{--<td class="a-center "><input type="checkbox" name="table_records"></td>--}}
    <td class="vertical-middle">{{$model->name}}</td>
    <td class="vertical-middle">{{$model->phone}}</td>
    <td class="vertical-middle">{{$model->quantity}}</td>
    <td class="vertical-middle">{{$model->total_price}}</td>
    <td class="vertical-middle">{!! $model->getIsActiveLabel()  !!}</td>
    <td class="vertical-middle">{{$model->status}}</td>
    <td class="vertical-middle">{{$model->created_at}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">
        @include('admin.layouts.widget.button.button-confirm', ['url' =>  \App\Http\Controllers\Admin\OrderController::getConfigUrlAdmin('confirm', $model->id), 'text' => __('admin/order.confirm order'), 'btn_type' => 'success'])
        @include('admin.layouts.widget.button.button-confirm', ['url' =>  \App\Http\Controllers\Admin\OrderController::getConfigUrlAdmin('cancel', $model->id), 'text' => __('admin/order.confirm cancel order'), 'icon' => 'fa-minus-square-o'])
        @include('admin.layouts.widget.button.button_link.edit', ['url' =>  \App\Http\Controllers\Admin\OrderController::getEditUrlAdmin($model->id), 'text' => __('admin.edit')])
    </td>
</tr>