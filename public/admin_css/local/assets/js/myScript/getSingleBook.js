$(document).ready(function () {
    $('#myBtnComplete').click(function () {
        $('.getSingleProduct').removeAttr("style");
    });
    $('#message_close').click(function () {
        $('.message').attr('style', 'display:none');
    });
});