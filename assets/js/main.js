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
})(jQuery);