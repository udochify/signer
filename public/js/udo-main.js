$(function() {
    if($('.scroll-container').length) {
        let scrollbar = new PerfectScrollbar('.scroll-container');
    }

    $('.choices').on('click', function() {
        $('#choice').html($(this).html());
        if($(this).prop('id') == "choice-local") {
            $('#input-container').html($('#file-input-clone').html());
        } else {
            $('#input-container').html($('#link-input-clone').html());
            $('#link-input').val('.').css('color', '#ffffff').one('focus', function() {
                $(this).val('').css('color', '#333333');
            });
        }
    });

    $('#input-container .file-input').on('change', function() {
        if(this.files[0].size > 3*1024*1024) {
            $('#clones .error-ul li').html("file size should not exceed 3MB");
            $(this).parent().append($('#clones .error-ul').clone());
        } else {
            var i = $(this).parent().find('.error-ul').remove();
        }
    });

    $('#file-form').on('submit', function() {
        if($('#input-container .error-ul').length) {
            return false
        }
    });
});