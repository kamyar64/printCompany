$('.select-user').on('change', function(){
    window.location=laroute.route('pagination',{pq:$(this).val()});

});
$(document).ready(function() {
    $(".date_picker").pDatepicker({
        initialValue: false,
        format: 'YYYY/MM/DD',
        autoClose: true
    });
    $('.ISBN').mask('999-99-999-9999-9');

});
$('.menu_id').on('change',function () {
    if($(this).val()!=0)
    window.location=laroute.route('create_menu_text',{id:$(this).val()});
})
/*$('.social-icons-bordered').on('click',function (e) {
    alert(e.removeClass());
});*/
$(".social-icons-bordered li").click(function() {
    $('#icon').val($(this).find( "i" ).attr('class'));

});