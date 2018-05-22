$('.select-user').on('change', function(){
    window.location=laroute.route('pagination',{pq:$(this).val()});

});
