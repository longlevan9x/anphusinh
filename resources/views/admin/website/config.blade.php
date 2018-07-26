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
                @include('admin.layouts.title_form', ['title' => __('admin/setting.setting website')])
                <div class="x_content">
                    {{ Form::model(isset($model) ? $model : null, [
                        'url' => \App\Http\Controllers\Admin\WebsiteController::getUrlAdmin('config'),
                        'files' => true,
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'demo-form2',
                        'data-parsley-validate',
                    ]) }}
                    @method('post')
                    <div class="col-md-8 row">
                        <div class="row">
                            {{--Name && description--}}
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_name">@lang('admin/setting.website_name'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::text('website_name', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_name']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_description">@lang('admin/setting.website_description'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::text('website_description', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_description']) !!}
                                    </div>
                                </div>
                            </div>

                            {{--Phone--}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_description">@lang('admin/common.phone'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::number('website_phone', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_phone']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_description">@lang('admin.fax'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::number('website_hotline', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_hotline']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_description">@lang('admin.hotline'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::number('website_fax', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_fax']) !!}
                                    </div>
                                </div>
                            </div>
                            {{--Phone--}}

                            {{--Address && copyright--}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_address">@lang('admin/common.address'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::text('website_address', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_address']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="website_copyright">@lang('admin/common.copyright'):</label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        {!! Form::text('website_copyright', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'website_copyright']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                @include('admin.layouts.widget.form.image-full', ['name' => 'logo', 'imagePath' => isset($model) ? $model->getImagePathWithoutDefault('', 'logo') : '', 'label' => __('admin/setting.logo')])
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 row">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                            </div>
                        </div>
                        <br>
                        {{--Seo--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">@lang('SEO')</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="seo_keyword">@lang('admin/setting.seo_keyword'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('seo_keyword', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'seo_keyword']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="seo_description">@lang('admin/setting.seo_description'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::textarea('seo_description', $value = null,['rows' => 5, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'seo_description']) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{--Seo--}}
                        {{--Social--}}

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">@lang('admin.social')</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_social_facebook">@lang('Facebook'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_social_facebook', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_social_facebook']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_social_youtube">@lang('Youtube'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_social_youtube', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_social_youtube']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_social_whatsapp">@lang('Whatsapp'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_social_whatsapp', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_social_whatsapp']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_social_twitter">@lang('Twitter'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_social_twitter', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_social_twitter']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_social_instagram">@lang('Instagram'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_social_instagram', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_social_instagram']) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{--Social--}}
                        {{--Scripts--}}

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">@lang('Scripts')</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_google_adwords_id">@lang('Google AdWords ID'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_google_adwords_id', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_google_adwords_id']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_google_adwords_src">@lang('Google Adwords Src'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_google_adwords_src', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_google_adwords_src']) !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_google_analytics_id">@lang('Google Analytics ID'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_google_analytics_id', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_google_analytics_id']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_vchat_hash">@lang('Vchat Hash'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_vchat_hash', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_vchat_hash']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="_vchat_data">@lang('Vchat Data'):</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            {!! Form::text('_vchat_data', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => '_vchat_data']) !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Scripts--}}

                    <div class="clearfix"></div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('admin.saveButton')</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection