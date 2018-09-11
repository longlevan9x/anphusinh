$(function () {
    $("#btnSubscribe,#btnSubscribeModal").click(function () {
        let _form = $("#form-subscribe");

        if ($(this).attr("id") === "btnSubscribeModal") {
            _form = $("#form-subscribe-modal");
        }
        _form.submit(function (event) {
            event.preventDefault();
        });
        let _data = _form.serializeArray();
        let _url  = _form.attr("action");

        let xhr = postAjax(_url, _data);

        xhr.success(function (result) {
            if (result.message === "success") {
                alert(result.result);
                window.location.reload(true);
                return false;
            }
            alert(result.result);
            return false;
        });

        xhr.error(function (error) {
            alert("Có lỗi xảy ra");
            console.log(error.responseText);
        });
    });

    $("#btn_submit_contact").click(function (e) {
        let _form = $("#contact-form");
        _form.submit(function (event) {
            event.preventDefault();
        });
        let _data = _form.serializeArray();
        let _url  = _form.attr("action");

        let xhr = postAjax(_url, _data);

        xhr.success(function (result) {
            if (result.message === "success") {
                alert(result.result);
                window.location.reload(true);
                return false;
            }
            alert(result.result);
            return false;
        });

        xhr.error(function (error) {
            alert("Có lỗi xảy ra");
            console.log(error.responseText);
        });
    });
});

/**
 * @param $url
 * @param $data
 * @returns {*|boolean}
 */
function postAjax($url, $data) {
    return ajax($url, $data, "post");
}

/**
 * @param $url
 * @param $data
 * @param $type
 * @returns {*|boolean}
 */
function ajax($url, $data, $type = "get") {
    return $.ajax({
        url:  $url,
        type: $type,
        data: $data
    });
}