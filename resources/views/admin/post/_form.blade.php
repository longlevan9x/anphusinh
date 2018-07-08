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
            @include('admin.layouts.title_form', ['title' => "Form Depertment"])
            <div class="x_content">
                {{ Form::model(isset($model) ? $model : null, [
                    'url' => \App\Http\Controllers\Admin\PostController::getUrlAdmin(isset($model) ? $model->id : ''),
                    'files' => true,
                    'class' => 'form-horizontal form-label-left',
                    'id' => 'demo-form2',
                    'data-parsley-validate',
                    'method' => isset($model) ? 'put' : 'post'
                ]) }}

                <div class="col-md-9 row">
                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Title<span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('title', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'title']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="editor">Content</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('content', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'editor1']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="overview">Overview</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::textarea('overview', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'overview']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="slug">@lang('admin/category.slug')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('slug', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'slug']) !!}
                            <p class="help-block">Will be automatically generated from your title, if left empty.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12">Is active</label>
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
                        <label class="col-md-12 col-sm-12 col-xs-12" for="category_id"> {{__('Category')}}</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::select('category_id', \App\Models\Category::pluckWithCategory('name', 'id'), $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'category_id']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="post_time"> {{__('Publish')}}</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <div class="col-md-12" style="padding-right: 0">
                                {!! Form::text('post_time', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'default' => '', 'id' => 'post_time']) !!}
                            </div>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-md-12 col-sm-12 col-xs-12">{{__('Image')}}</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::file('image', ['id' => 'image', 'accept' => 'image/*', 'class' => '', 'aria-describedby'=>"fileHelp"]) !!}
                        </div>
                    </div>

                    @push('scriptString')
                        <script>
                            let configFileinput = {
                                dropZoneEnabled:      false,
                                showUpload:           false,
                                initialPreviewAsData: true,
                                initialPreviewConfig: [
                                    {caption: "logo.png"}
                                ]
                            };
                            let segment         = `{{request()->segment(3)}}`;
                            if (!isNaN(segment)) {
                                configFileinput.dropZoneEnabled = true;
                                configFileinput.initialPreview = "{{isset($model) ?  $model->getImagePath() : ""}}";
                            }
                            console.log(configFileinput);
                            $("#image").fileinput(configFileinput);

                        </script>
                    @endpush
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
