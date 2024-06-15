$(document).ready(function(){
    $("select option").each(function() {
        $(this).siblings('[value="'+ this.value +'"]').remove();
    
    });

    window.addEventListener('make-admin', function(){
        $('#makeAdmin .close-modal').click();
      });

      $('#add_trigger').on('click', function(){
        $('input.add_image').click();
      });

});