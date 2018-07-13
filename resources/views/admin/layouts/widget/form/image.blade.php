@php
    $imagePreview = '';
    $urlDelete = $urlDelete ?? '';
    if (isset($model)) {
        if (method_exists($model, 'getImagePathWithoutDefault')) {
            $imagePreview = $model->getImagePathWithoutDefault();
        }

        if (empty($urlDelete)) {
            $urlDelete = isset($model) ? $model->getUrlDeleteImage($name ?? 'image') : '';
        }
    }
    elseif(isset($imagePath) && !empty($imagePath)) {
        $imagePreview = $imagePath;
    }
    else {
        //$imagePreview = \App\Commons\Facade\CFile::getImageUrl('www', '');
    }
@endphp
<div class="form-group row">
    <label for="{{$id ?? 'image'}}" class="col-xs-2 col-form-label">{{$label ?? __('admin/common.image')}}</label>
    <div class="col-xs-10">
        <input id="{{$id ?? 'image'}}" data-language="vi" type="file" accept="{{$accept ?? 'image/*'}}" name="{{$name ?? ($id ?? 'image') }}" value="" class="file dropify form-control-file" aria-describedby="fileHelp">
    </div>
</div>
@push('scriptString')
    <script>
        let configFileinput = {
            dropZoneEnabled:      false,
            showUpload:           false,
            initialPreviewAsData: true,
            initialPreviewConfig: [
                {caption: "logo.png", url: '{{$urlDelete}}'}
            ]
        };
        let _imagePreview   = '{{$imagePreview}}';
        if (_imagePreview !== "") {
            configFileinput.dropZoneEnabled = true;
            configFileinput.initialPreview  = _imagePreview;
        }

        $("#{{$id ?? 'image'}}").fileinput(configFileinput);
    </script>
@endpush