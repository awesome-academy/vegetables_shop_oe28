$("document").ready(function(){
    setTimeout(function(){
        $("div.alert").fadeOut();
    }, 5000);
});

$(".delete-sup").on("submit", function() {
    return confirm("Are you sure?");
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
jQuery("#carousel").owlCarousel({
    autoplay: true,
    lazyLoad: true,
    loop: true,
    margin: 20,
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: 7000,
    smartSpeed: 800,
    nav: false,
    responsive: {
        0: {
            items: 1
        },

        600: {
            items: 3
        },

        1024: {
            items: 4
        },

        1366: {
            items: 4
        }
    }
});

if (address_2 = localStorage.getItem('address_2_saved')) {
    $('select[name="calc_shipping_district"] option').each(function() {
        if ($(this).text() == address_2) {
            $(this).attr('selected', '');
        }
    });
    $('input.billing_address_2').attr('value', address_2);
}
if (district = localStorage.getItem('district')) {
    $('select[name="calc_shipping_district"]').html(district);
    $('select[name="calc_shipping_district"]').on('change', function() {
        var target = $(this).children('option:selected');
        target.attr('selected', '');
        $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected');
        address_2 = target.text();
        $('input.billing_address_2').attr('value', address_2);
        district = $('select[name="calc_shipping_district"]').html();
        localStorage.setItem('district', district);
        localStorage.setItem('address_2_saved', address_2);
    });
}
$('select[name="calc_shipping_provinces"]').each(function() {
    var $this = $(this),
        stc = '';
    c.forEach(function(i, e) {
        e += +1;
        stc += '<option value=' + e + '>' + i + '</option>';
        $this.html('<option value="">Tỉnh / Thành phố</option>' + stc);
        if (address_1 = localStorage.getItem('address_1_saved')) {
            $('select[name="calc_shipping_provinces"] option').each(function() {
                if ($(this).text() == address_1) {
                    $(this).attr('selected', '')
                }
            });
            $('input.billing_address_1').attr('value', address_1)
        }
        $this.on('change', function(i) {
            i = $this.children('option:selected').index() - 1;
            var str = '',
                r = $this.val()
            if (r != '') {
                arr[i].forEach(function(el) {
                    str += '<option value="' + el + '">' + el + '</option>';
                    $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
                })
                var address_1 = $this.children('option:selected').text();
                var district = $('select[name="calc_shipping_district"]').html();
                localStorage.setItem('address_1_saved', address_1);
                localStorage.setItem('district', district);
                $('select[name="calc_shipping_district"]').on('change', function() {
                    var target = $(this).children('option:selected');
                    target.attr('selected', '');
                    $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected');
                    var address_2 = target.text();
                    $('input.billing_address_2').attr('value', address_2);
                    district = $('select[name="calc_shipping_district"]').html();
                    localStorage.setItem('district', district);
                    localStorage.setItem('address_2_saved', address_2);
                })
            } else {
                $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>');
                district = $('select[name="calc_shipping_district"]').html();
                localStorage.setItem('district', district);
                localStorage.removeItem('address_1_saved', address_1);
            }
        })
    })
});
