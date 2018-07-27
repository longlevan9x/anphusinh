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
                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">@lang('admin/news.title')
                            <span class="required">*</span></label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('title', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'title']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class=" col-md-12 col-sm-12 col-xs-12" for="overview">@lang('admin/common.description')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('overview', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'overview']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 col-sm-1 col-xs-12" for="toLinkOut">@lang('admin/common.type link'):</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <label for="toPost">
                                @lang('admin/slide.to post'):
                                {{ Form::radio('type_link', $value = "to_post", isset($model) ? ($model->type_link == "to_post" ? ['checked'] : '') : '' , ['class' => "flat", 'id' => "toPost"]) }}&nbsp;&nbsp;&nbsp;
                            </label>
                            <label for="toLinkOut">
                                @lang('admin/slide.to link out'):
                                {{ Form::radio('type_link', $value = "to_link_out", isset($model) ? ($model->type_link == "to_link_out" ? ['checked'] : '') : '' , ['class' => "flat", 'id' => "toLinkOut"]) }}&nbsp;&nbsp;&nbsp;
                            </label>
                            <label for="noLink">
                                @lang('admin.no'):
                                {{ Form::radio('type_link', $value = "no_link", isset($model) ? ($model->type_link == "no_link" ? ['checked'] : '') : ['checked'] , ['class' => "flat", 'id' => "noLink"]) }}&nbsp;&nbsp;&nbsp;
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group hidden" id="js-post">
                        <label class=" col-md-1 col-sm-1 col-xs-12" for="parent_id">@lang('admin/menu.post')</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('parent_id', \App\Models\Post::where('type', '<>', \App\Models\Post::TYPE_SLIDE)->pluck('title', 'id'), $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'parent_id']) !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group hidden" id="js-select-image">
                        <label class="col-md-1 col-sm-1 col-xs-12" for="select_image">@lang('admin/common.select image'):</label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <label for="select_image_from_post">
                                @lang('admin/slide.from post'):
                                {{ Form::radio('select_image', $value = "from_post", isset($model) ? ($model->select_image == "from_post" ? ['checked'] : '') : '' , ['class' => "flat", 'id' => "select_image_from_post"]) }}&nbsp;&nbsp;&nbsp;
                            </label>
                            <label for="select_image_up_new">
                                @lang('admin/slide.up new image'):
                                {{ Form::radio('select_image', $value = "up_new", isset($model) ? ($model->select_image == "up_new" ? ['checked'] : '') : ['checked'] , ['class' => "flat", 'id' => "select_image_up_new"]) }}
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="" id="js-image">
                        @include('admin.layouts.widget.form.image-full', ['model' => $model ?? null])
                    </div>

                    <div class="form-group hidden" id="js-link">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="link">@lang('admin/common.link')</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::text('link', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'link']) !!}
                        </div>
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

                    <div class="form-group">
                        <label class="col-md-12 col-sm-12 col-xs-12" for="post_time"> {{__('admin/news.publish date')}}</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <div class="col-md-12" style="padding-right: 0">
                                {!! Form::text('post_time', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'default' => '', 'id' => 'post_time']) !!}
                            </div>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

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
@push('scriptString')
    <script type="text/javascript">
        $(function () {
            const _class_hidden = "hidden";
            $(window).load(() => {
                if ($("input[name=\"select_image\"]:checked").val() === "from_post") {
                    $('#js-image').addClass(_class_hidden);
                }
                else {
                    $('#js-image').removeClass(_class_hidden);
                }

                let type_link = $("input[name=\"type_link\"]:checked").val();
                if (type_link === "to_link_out") {
                    $("#js-link").removeClass(_class_hidden);
                }
                else if (type_link === "to_post") {
                    $("#js-post").removeClass(_class_hidden);
                    $("#js-select-image").removeClass(_class_hidden);
                }
            });

            $("input[name=\"type_link\"]").on("ifChecked", function () {
                //console.log($(this));
                if ($(this).val() === "to_post") {
                    $("#js-post").removeClass(_class_hidden);
                    $("#js-select-image").removeClass(_class_hidden);
                }
                else {
                    $("#js-post").addClass(_class_hidden);
                    $("#js-select-image").addClass(_class_hidden);
                    $("#js-image").removeClass(_class_hidden);
                }

                if ($(this).val() === "to_link_out") {
                    $("#js-link").removeClass(_class_hidden);
                }
                else {
                    $("#js-link").addClass(_class_hidden);
                }
            });

            $("input[name=\"select_image\"]").on("ifChecked", function () {
                //console.log($(this));
                if ($(this).val() === "from_post") {
                    $("#js-image").addClass(_class_hidden);
                }
                else {
                    $("#js-image").removeClass(_class_hidden);
                }
            });
        });
    </script>
@endpush
