$("document").ready(function(){
    setTimeout(function(){
        $("div.alert").fadeOut();
    }, 5000);
});

$(".delete-sup").on("submit", function() {
    return confirm("Are you sure?");
});
// back to top
jQuery(document).ready(function($) {
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        $back_to_top = $('.back-top');
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });
    $back_to_top.on('click', function(event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            },
            scroll_top_duration
        );
    });
});
