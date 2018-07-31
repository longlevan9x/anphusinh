PNotify.defaults.styling = 'bootstrap3'; // Bootstrap version 3
PNotify.defaults.icons = 'bootstrap3'; // glyphicons
PNotify.defaults.icons = 'fontawesome4'; // Font Awesome 4

/**
 * @param {string} $text
 * @param {string} $title
 * @constructor
 */
function PNotifyAlert($title, $text) {
    PNotify.alert({
        text:  $text,
        title: $title
    });
}

function PNotifySuccess($title, $text) {
    PNotify.success({
        text:  $text,
        title: $title
    });
}
