pand.waiting = {
    color: 'text-primary',
    text: 'Aguarde...',
    background: 'rgba(0,0,0,0.9)',
    size: '4rem',
};

pand.waiting.show = function(){
    var container = '<div id="pandWaiting" style="display:none;z-index:99999;padding:0px;margin:0px;position:fixed;top:0;left:0;width:100%;height:100%;background-color: '+this.background+';"class="row align-items-center"><div class="text-center" style="position:relative;display:block;width:100%;"><div class="spinner-border '+this.color+'" role="status" style="width:'+this.size+';height:'+this.size+'"><span class="sr-only">'+this.text+'</span></div></div></div>';
    $('body').append(container);
    $('#pandWaiting').fadeIn();
}

pand.waiting.hide = function(){
    $('#pandWaiting').fadeOut('slow', function(){
        this.remove();
    });
};

$(document).ready(function(){
    $('a:not(.no-wait, .dropdown-toggle)').on('click', function(){
        pand.waiting.show();
    });
});
