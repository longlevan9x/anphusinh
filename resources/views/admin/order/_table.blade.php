@php /** @var App\Models\Traits\ModelTrait|\Illuminate\Database\Eloquent\Model|\App\Models\Order $model*/ @endphp
<tr>
    <td class="a-center vertical-middle ">
        @include('admin.layouts.widget.table.input-check-one')
    </td>
    {{--<td class="a-center "><input type="checkbox" name="table_records"></td>--}}
    <td class="vertical-middle text-center">{{$model->name}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">{{$model->phone}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">{{$model->quantity}}</td>
    <td class="vertical-middle text-center">{{$model->total_price}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">{!! $model->getIsActiveLabel()  !!}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">{!! $model->showLabelStatus()  !!}</td>
    <td class="vertical-middle text-center">{{$model->address}}</td>
    <td class="vertical-middle text-center">{{$model->created_at}}</td>
    <td class="col-lg-1 col-md-1 col-sm-1 col-xs-1 vertical-middle text-center">
        @if($model->is_active == 1)
            @include('admin.layouts.widget.button.button-confirm', ['url' =>  \App\Http\Controllers\Admin\OrderController::getConfigUrlAdmin('cancel', $model->id), 'text' => __('admin/order.confirm cancel order'), 'icon' => 'fa-minus-square-o'])
        @elseif($model->is_active == 2)
            @include('admin.layouts.widget.button.button-confirm', ['url' =>  \App\Http\Controllers\Admin\OrderController::getConfigUrlAdmin('confirm', $model->id), 'text' => __('admin/order.confirm order'), 'btn_type' => 'success'])
        @else
            @include('admin.layouts.widget.button.button-confirm', ['url' =>  \App\Http\Controllers\Admin\OrderController::getConfigUrlAdmin('confirm', $model->id), 'text' => __('admin/order.confirm order'), 'btn_type' => 'success'])
            @include('admin.layouts.widget.button.button-confirm', ['url' =>  \App\Http\Controllers\Admin\OrderController::getConfigUrlAdmin('cancel', $model->id), 'text' => __('admin/order.confirm cancel order'), 'icon' => 'fa-minus-square-o'])
        @endif
        @include('admin.layouts.widget.button.button_link.edit', ['url' =>  \App\Http\Controllers\Admin\OrderController::getEditUrlAdmin($model->id), 'text' => __('admin.update')])
    </td>
</tr>