;(function ($) {

    var methods = {

        margin: 20,
        currentCard: 0,
        numCards: 0,
        cardsArray:[],
        init: function () {

            setupCards($(this));

            function setupCards(cardSlider) {

                cardSlider.css("overflow-x", "hidden");
                cardSlider.css("position", "relative");

                var tallestCardHeight = 0;

                methods.numCards = cardSlider.find(".slider-item").length;
                var half = methods.numCards / 2;


                cardSlider.find(".slider-item").each(
                    function (index) {

                        var card = $(this);
                        methods.cardsArray.push(card);

                        //vertical center the cards
                        TweenLite.set(card, {yPercent: -50});

                        //set initial position x
                        var position = index;
                        if (index > half)
                            position = index-methods.numCards;

                        alpha=0;
                        if(Math.abs(position)<2)
                            alpha=1;

                        TweenLite.set(card, {transformPerspective:600});
                        TweenLite.set(card, {xPercent: (position * 100) - 50, x: methods.margin * position, alpha:alpha});

                        if (card.outerHeight() > tallestCardHeight)
                            tallestCardHeight = card.outerHeight();

                    }
                );

                cardSlider.height(tallestCardHeight + 40);

                cardSlider.append(
                    '<div id="prev-btn" class="card-panel z-depth-1"> <i class="material-icons">navigate_before</i> </div>'
                );

                cardSlider.append(
                    '<div id="next-btn" class="card-panel z-depth-1"> <i class="material-icons">navigate_next</i> </div>'
                );

                TweenLite.set("#prev-btn",{css:{cursor:"pointer", width:70, position:"absolute", top:tallestCardHeight/2-35, left:10}})
                TweenLite.set("#next-btn",{css:{cursor:"pointer", width:70, position:"absolute", top:tallestCardHeight/2-35, right:10}})


                $("#prev-btn").click(function()
                {
                    methods.prevCard();
                }).hover(function()
                {
                    $(this).addClass("z-depth-2");
                }, function()
                {
                    $(this).removeClass("z-depth-2");
                });

                $("#next-btn").click(function()
                {
                    methods.nextCard();
                }).hover(function()
                {
                    $(this).addClass("z-depth-2");
                }, function()
                {
                    $(this).removeClass("z-depth-2");
                });

            }

        },
        nextCard:function()
        {
            var firstCard = methods.cardsArray.shift();
            methods.cardsArray.push(firstCard);

            methods.animate();

        },
        prevCard:function()
        {
            var lastCard = methods.cardsArray.pop();
            methods.cardsArray.unshift(lastCard);

            methods.animate();
        },
        animate:function()
        {
            var half=methods.numCards/2;

            for(var i=0;i<methods.numCards;i++)
            {
                var card = methods.cardsArray[i];
                var position = i;
                if (i > half)
                    position = i-methods.numCards;

                var alpha=0;
                var rotation = 80 * (position/Math.abs(position));
                var zPos = -200;

                if(Math.abs(position)<2)
                {
                    alpha=1;
                    rotation=0;
                    zPos = 0;
                }

                TweenLite.to(card, .3, {xPercent: (position * 100) - 50, x: methods.margin * position, alpha:alpha, rotationY:rotation, z:zPos});

            }
        }
    };


    $.fn.cardSliderEnera = function () {

        return methods.init.apply(this);

    }; // Plugin end
}(jQuery));