$(function() {
    $('.uk-cover-container a').click(function() {
        $('.image-zoom img').attr('src', $(this).find('img').attr('src'));
        $('.image-zoom').show();
        $('.uk-cover-container').css('display','none');
        return false;
    });
    
    $('.image-zoom').mousemove(function(e){
        var h = $(this).find('img').height();
        var vptHeight = $(document).height();
        var y = -((h - vptHeight)/vptHeight) * e.pageY;
        
        $('div img').css('top', y + "px");
    });
    
    $('.image-zoom').click(function(){
      $('.uk-cover-container img').css('top', "50%");
        $('.image-zoom').hide();
         $('.uk-cover-container').css('display','block');
    });
});