@php /** @var \App\Models\Product $model */ @endphp
@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @include('admin.layouts.title_form', ['title' => __('admin/post.add post'), 'small_title' => isset($model->slug) && !empty($model->slug) ? "Xem trên website: " . link_to(url('san-pham'), url('san-pham'), ['style' => "text-decoration:underline;"]) : ''])
                <div class="x_content">
                    {{ Form::model(isset($model) ? $model : null, [
                        'url' => \App\Http\Controllers\Admin\ProductController::getUrlAdmin('detail'),
                        'files' => true,
                        'class' => 'form-horizontal form-label-left',
                        'id' => 'demo-form2',
                        'data-parsley-validate',
                        'method' => 'post'
                    ]) }}

                    @method('post')
                    <div class="col-md-9 row">
                        <div class="form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="name">@lang('admin/product.name product')
                                <span class="required">*</span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::text('name', $value = null,['required' => "required", 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'name']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" col-md-12 col-sm-12 col-xs-12" for="editor">@lang('admin/product.thanh phan san pham')</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::textarea('element', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'editor']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" col-md-12 col-sm-12 col-xs-12" for="editor1">@lang('admin/product.co che tac dong')</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::textarea('content', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'editor1']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class=" col-md-12 col-sm-12 col-xs-12" for="overview">@lang('admin/product.overview')</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::textarea('overview', $value = null,['rows' => 4, 'class' => 'form-control col-md-7 col-xs-12', 'id' => 'overview']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 col-sm-12 col-xs-12" for="slug">@lang('admin/category.slug')</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::text('slug', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'slug']) !!}
                                <p class="help-block">@lang('admin/category.will be automatically generated from your title, if left empty.')</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        {{--<div class="form-group">--}}
                        {{--<label class="col-md-3 col-sm-3 col-xs-12">@lang('admin/common.is_active')</label>--}}
                        {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                        {{--<div class="">--}}
                        {{--<label>--}}
                        {{--{!! Form::hidden('is_active', $value = 0) !!}--}}
                        {{--{!! Form::checkbox('is_active', $value = 1,$value = null, ['class' => 'js-switch']) !!}--}}
                        {{--</label>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--<label class="col-md-12 col-sm-12 col-xs-12" for="post_time"> {{__('admin/news.publish date')}}</label>--}}
                        {{--<div class='input-group date' id='datetimepicker1'>--}}
                        {{--<div class="col-md-12" style="padding-right: 0">--}}
                        {{--{!! Form::text('post_time', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'default' => '', 'id' => 'post_time']) !!}--}}
                        {{--</div>--}}
                        {{--<span class="input-group-addon">--}}
                        {{--<span class="glyphicon glyphicon-calendar"></span>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label class=" col-md-12 col-sm-12 col-xs-12" for="price">@lang('admin/product.price')</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                {!! Form::number('price', $value = null,['class' => 'form-control col-md-7 col-xs-12', 'id' => 'price']) !!}
                            </div>
                        </div>

                        @include('admin.layouts.widget.form.image-full', ['model' => $model ?? null])
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