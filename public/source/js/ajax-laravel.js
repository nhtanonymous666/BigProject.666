$(document).ready(function() {
    
    var quantitiy = 0;
    $('.quantity-right-plus').click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);


        // Increment

    });

    $('.quantity-left-minus').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
        }
    });

    var contentWayPoint = function() {
        var i = 0;
        $('.ftco-animate').waypoint( function( direction ) {

            if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
                
                i++;

                $(this.element).addClass('item-animate');
                setTimeout(function(){

                    $('body .ftco-animate.item-animate').each(function(k){
                        var el = $(this);
                        setTimeout( function () {
                            var effect = el.data('animate-effect');
                            if ( effect === 'fadeIn') {
                                el.addClass('fadeIn ftco-animated');
                            } else if ( effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft ftco-animated');
                            } else if ( effect === 'fadeInRight') {
                                el.addClass('fadeInRight ftco-animated');
                            } else {
                                el.addClass('fadeInUp ftco-animated');
                            }
                            el.removeClass('item-animate');
                        },  k * 50, 'easeInOutExpo' );
                    });
                    
                }, 100);
                
            }

        } , { offset: '95%' } );
    };
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).on('click', '.pagination-custom a', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        //var page = $(this).attr('href').split('page=')[1];
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
        }).done(function(data){
            $('.load-ajax-pagination').html(data.data);
            contentWayPoint();
            window.history.pushState("", "", url);
        }).fail(function(jqXHR, XMLHttpRequest, textStatus, thrownError){
            alert("Status: " + textStatus + "\n" + "Error: " + thrownError);
        });
    });

    //Load list cart header
    function listCartHeader() {
        var url = 'listCartHeader';
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json'
        }).done(function(data){
            $('.load-list-cart-header').html(data.data);
        }).fail(function(jqXHR, XMLHttpRequest, textStatus, thrownError){
            alert("Status: " + textStatus + "\n" + "Error: " + thrownError);
        });
    }

    // Add Cart
    $(document).on('click', '.load-ajax-pagination .add-cart', function(event) {
        event.preventDefault();
        var prodid = $(this).attr('prod-id');
        //var link = $(this).attr('href');
        var url = 'add-cart/' + prodid;
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json'
        }).done(function(data){
            if (data == 'success') {
                listCartHeader();
                swal("", "Thêm vào giỏ hàng thành công", "success");
            } else if (data == 'redirect-login') {
                window.location.href = 'login';
            }
        }).fail(function(jqXHR, XMLHttpRequest, textStatus, thrownError){
            alert("Status: " + textStatus + "\n" + "Error: " + thrownError);
        });
    });
});