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
    if(isset($imagePath) && !empty($imagePath)) {
        $imagePreview = $imagePath;
    }
    //else {
        //$imagePreview = \App\Commons\Facade\CFile::getImageUrl('www', '');
    //}
@endphp
<div class="form-group row">
    <label for="{{$id ?? 'image'}}" class="col-md-12 col-sm-12 col-xs-12">{{$label ?? __('admin/common.image')}}</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
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
                {caption: "{{$model->{$name ?? 'image'} ?? 'no_image.png'}}", url : '{{$urlDelete}}'}
            ]
        };
        let _imagePreview   = '{{$imagePreview}}';
        if (_imagePreview !== "") {
            configFileinput.dropZoneEnabled = true;
            configFileinput.initialPreview  = _imagePreview;
        }

        $("#{{$id ?? 'image'}}").fileinput(configFileinput);
        $("#{{$id ?? 'image'}}").on("filepredelete", function(jqXHR) {
            var abort = true;
            if (confirm("Are you sure you want to delete this image?")) {
                abort = false;
            }
            return abort; // you can also send any data/object that you can receive on `filecustomerror` event
        });
    </script>
@endpush