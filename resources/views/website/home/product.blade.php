@extends('website.index')
@section('content')
    <style>
        .product_nav_tab .nav-link.active {
            background: #306fbe !important;
            color: #fff !important;
            border: 1px solid #306fbe;
        }

        .product_nav_tab li {
            width: 50%;
            text-align: center;
        }

        .product_nav_tab .nav-link {
            background: #4587d9;
            color: #fff;
            border-radius: 0;
            margin-right: 0 !important;
        }

        .product_tab {
            padding-top: 20px;
        }
    </style>
    <div role="tabpanel">
        <ul class="nav nav-tabs product_nav_tab" role="tablist">
            <li class="active" role="presentation">
                <a class="nav-link text-uppercase font-weight-bold active" aria-controls="tab" data-toggle="tab" href="#tab1" role="tab">
                    @lang('admin/product.co che tac dong')
                </a>
            </li>
            <li class="" role="presentation">
                <a class="nav-link text-uppercase font-weight-bold" aria-controls="tab" data-toggle="tab" href="#tab2" role="tab">
                    @lang('admin/product.element')
                </a>
            </li>
        </ul>
        <div class="tab-content rounded-bottom rounded-right product_tab">
            <div class="tab-pane active" id="tab1" role="tabpanel" aria-expanded="true">
                {!! $model->content  !!}
            </div>
            <div class="tab-pane" id="tab2" role="tabpanel" aria-expanded="false">
                {!! $model->productMetaByKey('_element')->first()->value !!}
            </div>
        </div>
    </div>
@endsection