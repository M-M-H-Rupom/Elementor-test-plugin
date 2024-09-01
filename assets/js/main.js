(function($){
    $(window).on("elementor/frontend/init", function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/flipclock.default', function(scope, $){
            var att = $(scope).find('.clock').attr('id')
            var user_date = $(scope).find('.clock').data('set-dates')
            var target_time = $(scope).find('.clock').data('target-time')
            var targetDate = new Date(target_time.replace(' ', 'T'));
            
            var clock;
            var currentDate = new Date();
            // var futureDate = new Date(currentDate.getTime() + (user_date * 24 * 60 * 60 * 1000)); 
            var futureDate = new Date(targetDate.getTime() + (user_date * 24 * 60 * 60 * 1000)); 
            var diff = (targetDate.getTime() - currentDate.getTime()) / 1000;

            clock = $(scope).find('.clock').FlipClock(diff, {
                'autoStart': false,
                clockFace: 'DailyCounter',
                // countdown: true,
                showSeconds: true
            });
            // alert('test')
            // setTimeout(function() {
            //     window.location.href = "https://www.google.com";
            // }, diff * 1000);
        });
    });

    $('.show_cat_product').on('click',function(){
        $.ajax({
            url: ajaxurl.url, 
            type: 'POST',
            data: {
                action: 'load_category_products', 
                category: '',
            },
            // success: function(response) {
            //     $('#product-container').html(response);
            // },
            // error: function() {
            //     alert('Error loading products.');
            // }
        });
    })

    $('#submit_massage').on('click',function(){
        // alert('submited');
        $.ajax({
            type: "POST",
            url: ajaxurl.url,
            data: {
                action: 'form_submit',
                
            },
            success: function(response) {
                alert('Send massage successfully!');
                console.log(response);
                
            },
        });
    })
})(jQuery);