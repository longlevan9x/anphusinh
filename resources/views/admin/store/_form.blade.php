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
            @include('admin.layouts.title_form', ['title' => __('admin/menu.add store')])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\StoreController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => action_method_push_post($model)
                ]) }}
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_area"> {{__('admin.area')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('id_area', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_AREA), $value = null,['data-selector_change' => '#city_id', 'data-url' => url_admin('category/get-category'), 'data-type' => \App\Models\Category::TYPE_CITY, 'class' => 'form-control col-md-7 col-xs-12 get-category', 'id' => 'id_area']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_id"> {{__('admin.city')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('city_id', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_CITY), $value = null,['data-selector_change' => '#district_id', 'data-url' => url_admin('category/get-category'), 'data-type' => \App\Models\Category::TYPE_DISTRICT, 'class' => 'form-control col-md-7 col-xs-12 get-category', 'id' => 'city_id']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_id"> {{__('admin.district')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('district_id', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_DISTRICT), $value = null,['data-selector_change' => '#street', 'data-url' => url_admin('category/get-category'), 'data-type' => \App\Models\Category::TYPE_STREET, 'class' => 'form-control col-md-7 col-xs-12 get-category', 'id' => 'district_id']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="street"> {{__('admin.street')}}</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::select('street', \App\Models\Category::pluckWithType('name', 'id', \App\Models\Category::TYPE_STREET), $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'street']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('admin/common.name')<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('name', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('admin/common.is_active')</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="">
                            <label>
                                {!! Form::hidden('is_active', $value = 0) !!}
                                {!! Form::checkbox('is_active', $value = 1,$value = null, ['class' => 'js-switch']) !!}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">@lang('admin/common.phone')</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('phone', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'phone']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">@lang('admin/common.address')</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('address', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'address']) !!}
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        @include('admin.layouts.widget.button.button-action-form', ['url' => url_admin('store')])
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
