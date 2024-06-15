$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('#menu-toggle').click(function(){
        $('#wrapper').toggleClass('toggled');
    });
});
