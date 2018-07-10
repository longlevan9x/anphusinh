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
            @include('admin.layouts.title_form', ['title' => __('admin/menu.add area')])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\AreaController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => isset($model) ? 'put' : 'post'
                ]) }}
                {{--<div class="form-group">--}}
                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="parent_id"> {{__('Parent')}}</label>--}}
                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                        {{--{!! Form::select('parent_id', \App\Models\Category::pluckWithArea('name', 'id'), $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'parent_id']) !!}--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('admin/common.name')<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('name', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slug">@lang('admin/category.slug')</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        {!! Form::text('slug', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'slug']) !!}
                        <p class="help-block">@lang('admin/category.will be automatically generated from your title, if left empty.')</p>
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
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        @include('admin.layouts.widget.button.button-action-form', ['url' => url_admin('area')])
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
