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
            var htmlApp = pHtml + fieldHTML + minus;
            $('.show-new-item').append(htmlApp);
        }
    });
});
