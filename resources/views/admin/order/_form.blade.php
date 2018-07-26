<?php
/**
 * Created by PhpStorm.
 * User: LongPC
 * Date: 5/7/2018
 * Time: 10:56 PM
 */
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.layouts.title_form', ['title' => __('admin/order.update order')])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\OrderController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => isset($model) ? 'put' : 'post'
                ]) }}

                <div class="col-md-6 row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="name">@lang('admin/common.name')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::text('name', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="phone">@lang('admin/common.phone number')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::text('phone', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'phone']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="address">@lang('admin/order.shipping address')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('address', $value = null,[ 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'address']) !!}
                        </div>
                    </div>
                    @include('admin.layouts.widget.form.editor', ['name' => "note", 'label' => __('admin/order.note'), 'height' => 200])
                </div>

                <div class="col-md-6 row">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="quantity">@lang('admin/common.quantity')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::number('quantity', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'quantity']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="price">@lang('admin/product.price')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12 input-group">
                                    <span class="input-group-addon" id="basic-addon1">VND</span>
                                    {!! Form::number('price', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'price', 'readonly' => true]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="total_price">@lang('admin/common.total_money')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12 input-group">
                                    <span class="input-group-addon" id="basic-addon1">VND</span>
                                    {!! Form::text('total_price', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'total_price', 'readonly' => true]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="is_active">@lang('admin/common.is_active')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {{ Form::select('is_active', [0 => __('admin/order.not order'), 1 => __('admin/order.ordered'), 2 => __('admin/order.cancelled order')], $value = null, ['class' => 'form-control col-md-7 col-xs-12'])}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="status">@lang('admin/order.status order')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {{ Form::select('status', ['new' => __('admin/order.new order'), 'shipping' => __('admin/order.shipping'), 'shipped' => __('admin/order.shipped')], $value = null, ['class' => 'form-control col-md-7 col-xs-12'])}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            @include('admin.layouts.widget.button.button', ['icon' => 'fa-check', 'text' => __('admin/order.update order'), 'btn_type' => 'success', 'btn_size' => 'md'])
                            @include('admin.layouts.widget.button.button_link.button', ['icon' => 'fa-reply', 'text' => __('admin.backButton'), 'btn_size' => 'md', 'url' => url_admin('order')])
                            @include('admin.layouts.widget.button.button_link.button', ['text' => __('admin.backButton'), 'icon' => 'fa-mail-reply', 'btn_type' => 'default', 'url' => url('order'), 'btn_size' => 'md'])
                        </div>
                    </div>

                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@push('scriptString')
    <script type="text/javascript">
        $(function () {
            $('#quantity').blur(function (e) {
                let $quantity = $(this).val();
                if ($quantity < 1) {
                    $quantity = 1;
                    $(this).val(1);
                }
                let $price = $('#price').val();

                let $total = $price * $quantity;
                $('#total_price').val(($total.toLocaleString('en-US')));
            });
        });
    </script>
@endpush