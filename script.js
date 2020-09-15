$(document).ready(function(e){
    var filename
    var page_url = 'download.php';
    var btnStartTxt = '<span class="button__text button__text--download">Download <svg class="icon button__icon--cloud-download"><use xlink:href="#icon-cloud-download"></use></svg></span>';
    var btnProgressTxt = '<span class="button__text button__text--progress">0<sub>%</sub></span>';
    var btnEndTxt = '<span class="button__text button__text--complete"><svg class="icon button__icon--checkmark"><use xlink:href="#icon-checkmark"></use></svg></span>';
  
    var isActive = false;
    
    var stageStep = function( $el, delay, returnFunction ) {
        var delay = ( typeof delay !== 'undifined' ) ? delay : 0;
        setTimeout(function(){
            $el.addClass('is_animated');
        },10);
        if (typeof returnFunction === 'function') {
            setTimeout(function(){ 
                returnFunction();
            }, delay);
        }
    };
  
    var initCounter = function($el, returnFunction) {
        var wrapper = $el.parent('div');
        var counter = 0;
        var circle = (252 / 100);
        var req = new XMLHttpRequest();
        req.open("POST", page_url, true);
        req.addEventListener("progress", function (evt) {
            if(evt.lengthComputable) {
                counter = Math.floor((evt.loaded / evt.total)*100);
                $('.button__text--progress', wrapper).html(counter+'<sub>%</sub>');
                $('.pie-loader circle', wrapper).css('stroke-dasharray', (counter * circle) + ' 252');
                if (counter === 100 || counter > 100 ) {
                    $('.pie-loader', wrapper).addClass('is_hidden');
                    returnFunction();
                }
            }
        }, false);

        req.responseType = "blob";
        req.onreadystatechange = function () {
            if (req.readyState === 4 && req.status === 200) {
                console.log('ok')
                if (typeof window.chrome !== 'undefined') {
                    // Chrome version
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(req.response);
                    link.download = filename;
                    link.click();
                } else if (typeof window.navigator.msSaveBlob !== 'undefined') {
                    // IE version
                    var blob = new Blob([req.response], { type: 'application/force-download' });
                    window.navigator.msSaveBlob(blob, filename);
                } else {
                    // Firefox version
                    var file = new File([req.response], filename, { type: 'application/force-download' });
                    window.open(URL.createObjectURL(file));
                }
            }
        };
        req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        req.send(`file=${filename}`);
    }; 
   
    function reset() {
        isActive = false;
        $('.button').html( btnStartTxt );
        $('.pie-loader').removeClass('is_hidden')
            .find('circle').removeAttr('style')
            .parents('.button-wrapper').removeClass('is_fixed_size');
    }
  
    $('.reset').click(reset);
    $('.button').click(function(){
        filename=$(this).data('filename')
        if (isActive) return
        isActive = true;
        var btn = $(this);    
        stageStep( btn.find('.button__text--download'), 500, function(){
            btn.html(btnProgressTxt);
            btn.parent('div').addClass('is_fixed_size');
            stageStep( btn.find('.button__text--progress'), 500, function(){
                initCounter(btn, function(){
                    btn.append(btnEndTxt);
                    stageStep( btn.find('.button__text--complete'));
                    btn.find('.button__text--progress').remove();
                });
            });
        });
    });
})