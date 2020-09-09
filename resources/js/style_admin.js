$(document).ready(function(){
    var maxField = 10;
    var x = 1;
    var fieldHTML = $('.item-create').html();
    $('#add-new-item').click(function () {
        if (x < maxField) {
            x++;
            var id = "remove-new-item-" + x;
            var minus =
                `<p>San pham ${x}</p>
                 <a href="javascript:" id="${x}" class="btn btn-danger">
                 <i class="fa fa-minus"></i></a>`;
            var htmlApp = minus + fieldHTML;
            $('.show-new-item').append(htmlApp);
        }
    });
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
