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
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\ContactController::getUrlAdminWithModel($model),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => action_method_push_post($model),
                ]) }}

                <div class="col-md-9 row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="name">@lang('admin/common.name')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::text('name', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12 col-sm-12 col-xs-12" for="enail">@lang('admin/common.email')</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    {!! Form::text('email', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'email']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="title">@lang('admin/common.title')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('title', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'title']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="content">@lang('admin/common.content')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('content', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'content']) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                            <button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i>&nbsp;@lang('admin.resetButton')</button>
                            @include('admin.layouts.widget.button.button_link.button', ['text' => __('admin.backButton'), 'icon' => 'fa-mail-reply', 'btn_type' => 'default', 'url' => url('slide'), 'btn_size' => 'md'])
                        </div>
                    </div>

                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
