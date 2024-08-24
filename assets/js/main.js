(function($){
    $(window).on("elementor/frontend/init", function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/flipclock.default', function(scope, $){
            var clock;
            var currentDate = new Date();
            var futureDate = new Date(currentDate.getTime() + 2 * 60 * 1000); 
            var diff = (futureDate.getTime() - currentDate.getTime()) / 1000;

            clock = $(scope).find('.clock').FlipClock(diff, {
                clockFace: 'DailyCounter',
                countdown: true,
                showSeconds: true
            });

            // setTimeout(function() {
            //     window.location.href = "https://www.google.com";
            // }, diff * 1000);
        });
    });
})(jQuery);
