$(function() {
    if($('.scroll-container').length) {
        let scrollbar = new PerfectScrollbar('.scroll-container');
    }

    $('.choices').on('click', function() {
        $('#choice').html($(this).html());
        if($(this).prop('id') == "choice-local") {
            $('#form-container').html($('#file-form').html());
        } else {
            $('#form-container').html($('#link-form').html());
            $('#link').val('.').css('color', '#ffffff').one('focus', function() {
                $(this).val('').css('color', '#333333');
            });
        }
    });
});