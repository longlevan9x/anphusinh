@if($slot == '1')
    @include('admin.layouts.widget.labels.info', ['text' => $text_active ?? __('admin/common.active')])
@elseif($slot == '0')
    @include('admin.layouts.widget.labels.warning', ['text' => $text_inactive ?? __('admin/common.inactive')])
@else
    @include('admin.layouts.widget.labels.default', ['text' => $text_other ?? __('admin/common.empty')])
@endif