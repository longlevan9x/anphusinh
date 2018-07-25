@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.layouts.title_form', ['title' => __('admin/news.setting banner')])
                <div class="x_content">
                    {{ Form::model(isset($model) ? $model : null, [
                        'url' => \App\Http\Controllers\Admin\NewsController::getUrlAdmin('banner'),
                        'files' => true,
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'demo-form2',
                        'data-parsley-validate',
                        'method' => 'post'
                    ]) }}
                    @method('post')
                    <div class="col-md-9 row">
                        <div class="form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="post_id">@lang('admin/common.link')
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::select('post_id', \App\Models\Post::pluckWithType('title', 'id', \App\Models\Post::TYPE_NEWS), $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'post_id']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="editor">@lang('admin/news.content-banner')</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::textarea('content',  $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'editor', 'height' => 150]) !!}
                            </div>
                        </div>

                        @include('admin.layouts.widget.form.image-full', ['name' => 'value', 'imagePath' => isset($model) ? $model->getImagePath(\App\Models\PostMeta::table(), 'value') : ''])
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-success">@lang('admin.submitButton')</button>
                                <button class="btn btn-primary" type="reset">@lang('admin.resetButton')</button>
                            </div>
                        </div>

                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection