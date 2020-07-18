$(document).ready(function(){
    stickyFooter();
});

$(window).on('resize', function(){
    stickyFooter();
});

function stickyFooter(){
    var alto = $('#footer_ppal').outerHeight() + 20;
    $('body').css('margin-bottom', alto+'px')
}
