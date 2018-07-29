$('.btn-remove-cart').on('click',function () {
    window.location=laroute.route('delete_shopping_cart',{id:$(this).data('id')});
});

if($('#contact-form').length > 0) {
    $('#contact-form').parsley();

    $('#contact-form').submit( function(e) {
        e.preventDefault();

        if( !$(this).parsley('isValid') )
            return;

        $theForm = $(this);
        $btn = $(this).find('#submit-button');
        $btnText = $btn.text();
        $(this).parent().find('.alert').remove();
        $(this).parent().append('<div class="alert"></div>');
        $alert = $(this).parent().find('.alert');

        $btn.find('.loading-icon').addClass('fa-spinner fa-spin ');
        $btn.prop('disabled', true).find('span').text("در حال ارسال ...");

        $url = laroute.route('send_contact_message');

        $attr = $(this).attr('action');
        if (typeof $attr !== typeof undefined && $attr !== false) {
            if($(this).attr('action') != '') $url = $(this).attr('action');
        }

        $.post($url, $(this).serialize(), function(data){

            $message = data.msg;

            if( data.status == "success" ){
                $theForm.slideUp('medium', function() {
                    $alert.removeClass('alert-danger');
                    $alert.addClass('alert-success').html($message).slideDown('medium');
                });
            }else {


                $alert.addClass('alert-danger').html($message).slideDown('medium');
        }

            $btn.find('.loading-icon').removeClass('fa-spinner fa-spin ');
            $btn.prop('disabled', false).find('span').text($btnText);

        })
            .fail(function() { console.log('AJAX Error'); });
    });
}
