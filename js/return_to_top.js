$(document).ready(function() {
    // ===== Scroll to Top ==== 
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return_to_top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return_to_top').fadeOut(200);   // Else fade out the arrow
        }
    });

    $('#return_to_top').click(function() {
        $('body,html').animate({
            scrollTop : 0                       // Scroll to top of body
        }, 500);
    });
});