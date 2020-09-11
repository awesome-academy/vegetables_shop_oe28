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
// comment
$(document).ready(function () {
    $('.send-review').click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var productId = $('#product_id').val();
        var numberRate = $('#number-rate').val();
        var rating = $('input[name="rating"]:checked').val();
        var content = $('#comment').val();
        $.ajax({
            type: 'POST',
            url: '/rate',
            data: {
                product_id: productId,
                rating: rating,
                content: content,
            },
            success: function (data) {
                var star = '';
                for (var i = 0; i < data.rating; i++) {
                    star += '<i class="fa fa-star"></i>';
                }
                var content = $(
                    `<div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"></i>${data.name}</div>
                                    <time class="comment-date">
                                        <i class="fa fa-clock">${data.date}</i>
                                    </time>
                                </header>
                                <div class='rating-stars text-center row'>
                                    <div class="rate product__details__rating">
                                        ${star}
                                    </div>
                                </div>
                                <div class="comment-post">
                                    <p>${data.content}</p>
                                </div>
                            </div>
                        </div>
                    </div>`
                );
                $('#comment-container').append(content);
                $('#comment').val('');
                alertify.success('Rate success');
            }
        });
    });
    $('#prevent-review').click(function (e) {
        alert('Please login to comment!');
        e.preventDefault();
    })
});
