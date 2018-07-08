<tr>
    <td class="a-center vertical-middle ">
        <input type="checkbox" class="check-one" name="table_records">
    </td>
    <td class="vertical-middle">{{$model->title}}</td>
    <td class="vertical-middle">{{$model->getAuthorName()}}</td>
    <td class="vertical-middle">{{$model->overview}}</td>
    <td class="vertical-middle">{{$model->showIsActiveLable()}}</td>
    <td class="col-lg-2 col-md-2 col-sm-2 col-xs-2 vertical-middle">
        @include('admin.layouts.widget.button.button_link.action', ['url' => \App\Http\Controllers\Admin\AdviceController::getUrlAdmin($model->id)])
    </td>
</tr>