//TweenLite.set(".swipe-animation",{x:100,y:200});




;(function ($) {

    var methods = {

        circle:null,
        stopped:false,
        init: function () {

            methods.circle = $(this);
            startAnimation($(this));

            function startAnimation(circle)
            {
                if(methods.stopped)
                    return;

                var targetY = Math.min($(window).height()-200, 450);

                TweenLite.fromTo(circle, .2,
                    {
                        x:100,
                        y:targetY,
                        scaleX:1.5,
                        scaleY:1.5,
                        alpha:0
                    },
                    {
                        scaleX:1,
                        scaleY:1,
                        alpha:.8,
                        onComplete:swipeAnimation,
                        onCompleteParams:[circle]
                    });
            }

            function swipeAnimation(circle)
            {
                if(methods.stopped)
                    return;

                TweenLite.fromTo(circle, .5,
                    {
                        x:100
                    },
                    {
                        x:250,
                        onComplete:endAnimation,
                        onCompleteParams:[circle]
                    });

            }

            function endAnimation(circle)
            {
                if(methods.stopped)
                    return;

                TweenLite.to(circle, .3,
                    {
                        alpha:0,
                        scaleX:1.5,
                        scaleY:1.5,
                        onComplete:delayAnimation,
                        onCompleteParams:[circle]
                    });
            }

            function delayAnimation(circle)
            {
                if(methods.stopped)
                    return;

                setTimeout(startAnimation,1000,circle);
            }


            var obj={
                // circle:methods.circle,
                stop:function()
                {
                    methods.stopped=true;
                    methods.circle.css("display","none");
                    // TweenLite.kill(null, this.circle);
                }
            };

            return obj;
        }
        
    };


    $.fn.swipeAnimation = function () {

        return methods.init.apply(this);

    }; // Plugin end
}(jQuery));