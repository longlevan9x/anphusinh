@extends('admin.index')
@section('content')
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
                @include('admin.layouts.title_form', ['title' => __('admin/menu.information expert')])
                <div class="x_content">
                    {{ Form::model(isset($model) ? $model : null, [
                        'url' => \App\Http\Controllers\Admin\WebsiteController::getUrlAdmin('info-expert'),
                        'files' => true,
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'demo-form2',
                        'data-parsley-validate',
                    ]) }}
                    @method('post')
                    <div class="col-md-8 row">
                        <div class="row">
                            {{--Name && description--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="_expert_name">@lang('admin/setting._expert_name'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::text('_expert_name', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_expert_name']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="_expert_phone">@lang('admin/setting._expert_phone'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::number('_expert_phone', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_expert_phone']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="_expert_workplace">@lang('admin/setting._expert_workplace'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::text('_expert_workplace', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_expert_workplace']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12"></div>
                            @include('admin.layouts.widget.form.editor', ['name' => '_expert_quote', 'label' => __('admin/setting._expert_quote'), 'height' => 200])

                            {{--Logo && Image--}}
                            <div class="col-md-6">
                                @include('admin.layouts.widget.form.image-full', ['name' => '_expert_image', 'imagePath' => isset($model) ? $model->getImagePathWithoutDefault('', '_expert_image') : '', 'label' => __('admin/setting._expert_image')])
                            </div>
                            <div class="col-md-6">
                                @include('admin.layouts.widget.form.image-full', ['name' => '_expert_thumbnail', 'imagePath' => isset($model) ? $model->getImagePathWithoutDefault('', '_expert_thumbnail') : '', 'label' => __('admin/setting._expert_thumbnail')])
                            </div>
                            {{--Logo && Image--}}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection