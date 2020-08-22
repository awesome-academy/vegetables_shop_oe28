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

//upload image
$(function () {
    var imagesPreview = function imagesPreview(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    var file = event.target;

                    $(`<span class="pip">
                        <i class="fa fa-times-circle delete-image"></i>
                        <img class="image_products" src="${event.target.result}"
                        /> </span>`).insertAfter("#gallery-photo-add");
                    $(".delete-image").click(function () {
                        $(this).parent(".pip").remove();
                    });
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#gallery-photo-add').on('change', function () {
        imagesPreview(this, 'div.gallery');
    });
});
