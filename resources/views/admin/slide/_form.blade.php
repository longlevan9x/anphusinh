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
            @include('admin.layouts.title_form', ['title' => __('admin/menu.add slide')])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\SlideController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => action_method_push_post($model)
                ]) }}

                <div class="col-md-9 row">
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="name">@lang('admin/common.name')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('name', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="description">@lang('admin/common.description')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('description', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'description']) !!}
                        </div>
                    </div>
                    <div class="form-group" id="js-link">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="url">@lang('Url')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('url', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'url']) !!}
                            <p class="help-block">@lang('Liên kết tới trang khác.')</p>
                        </div>
                    </div>
                    <div class="" id="js-image">
                        @include('admin.layouts.widget.form.image-full', ['model' => $model ?? null])
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">@lang('admin/common.is_active')</label>
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
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                            <button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i>&nbsp;@lang('admin.resetButton')</button>
                            @include('admin.layouts.widget.button.button_link.button', ['text' => __('admin.backButton'), 'icon' => 'fa-mail-reply', 'btn_type' => 'default', 'url' => url_admin('slide'), 'btn_size' => 'md'])
                        </div>
                    </div>

                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
