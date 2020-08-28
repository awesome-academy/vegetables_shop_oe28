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
// add item to cart
$(document).ready(function () {
    $('.add-to-cart').on("click",function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id =  $(this).attr("id");
        $.ajax({
            url: 'add-to-cart/' + product_id,
            type: 'GET',
        }).done(function (response) {
            renderCart(response);
            alertify.success('Add to cart successfully!');
        });
    });
    // click x and remove item
    $('#change-item-cart').on('click','.remove-item',function(){
        $.ajax({
            url: 'delete-item-cart/' + $(this).data('id'),
            type: 'GET',
        }).done(function (response) {
            renderCart(response);
            alertify.error('Delete item successfully!');
        });
    });

    function renderCart(response) {
        $('#change-item-cart').empty();
        $('#change-item-cart').html(response);
        $('#total-qty-show').text($('#total-qty-cart').val());
    }
    // minus, plus page cart index
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();

        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();

        return false;
    });
    // remove item in list cart
    $('.page-cart-single').on('click', '.product-remove-item', function () {
        $.ajax({
            url: 'delete-list-item-cart/' + $(this).data('id'),
            type: 'GET',
        }).done(function (response) {
            $('.page-cart-single').empty();
            $('.page-cart-single').html(response);
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();

                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();

                return false;
            });
            alertify.error('Delete item successfully!');
        });
    });
    // update number item cart
    $('.page-cart-single').on('click','.update-number-item',function(){
        var id = 'quantity-item-' + $(this).data('id');
        var qty = $('#' + id).val()
        $.ajax({
            url: 'save-item-cart/' + $(this).data('id') + '/' + qty,
            type: 'GET',
        }).done(function (response) {
            $('.page-cart-single').empty();
            $('.page-cart-single').html(response);
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();

                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();

                return false;
            });
            alertify.success('Update item successfully!');
        });
    });
});
