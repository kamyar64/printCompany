$('.select-user').on('change', function(){
    window.location=laroute.route('pagination',{pq:$(this).val()});

});
$(document).ready(function() {
    $(".date_picker").pDatepicker({
        initialValue: false,
        format: 'YYYY/MM/DD',
        autoClose: true
    });
});
