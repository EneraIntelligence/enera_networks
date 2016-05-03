;(function ($) {

    var methods = {

        init: function () {

            var card = this.find(".carousel-item:first");
            var cardsLength = this.find(".carousel-item").length;
            //console.log(card);


            var cardHeight = card.outerHeight() + 20;
            this.css("height", cardHeight);

            var cards = [];

            this.find(".carousel-item").each(function (index) {
                // console.log(index);

                if (index > 0) {
                    $(this).css("pointer-events", "none");
                }
                else {
                    $(this).css("pointer-events", "auto");
                }

                cards.push(this);

                TweenLite.set(this, {x: (index * -18), z: (index * -20)});
                TweenLite.set(this, {css: {zIndex: cardsLength - index}});
                var blur = index - 1;
                if (blur < 0)blur = 0;
                TweenLite.set(this, {webkitFilter: "blur(" + blur + "px)"});

                var cardWidth = card.outerWidth() + 20;
                var dragged = false;

                Draggable.create(this, {
                    type: "x",
                    edgeResistance: 0.65,
                    //bounds: {top: 0, left: 0, width: cardWidth * 3, height: cardHeight},
                    lockAxis: true,
                    // throwProps:true,
                    onPress: function () {
                        $(this.target).addClass("z-depth-3");
                        dragged = false;

                        cardWidth = $(this.target).outerWidth() + 20;

                    },
                    onDrag: function () {
                        //console.log(this.x);
                        dragged = true;
                        var i;
                        var card;

                        if (this.x < 0) {
                            var difX = this.x;
                            //TweenLite.set(this.target, {x:0});

                            for (i = 0; i < cards.length; i++) {
                                card = cards[i];
                                TweenLite.set(card, {z: difX + (i * -18), x: difX * .5 + (i * -18)});
                            }

                            TweenLite.set(card, {webkitFilter: "blur(" + 0 + "px)"});
                            // TweenLite.set(card, {css: {zIndex: cards.length }});
                            TweenLite.set(card, {z: 0, x: cardWidth + difX + 30});
                            $(card).addClass("z-depth-3");

                            $(this.target).removeClass("z-depth-3");


                        }
                        else {
                            TweenLite.set(this.target, {z: 0});
                            $(this.target).addClass("z-depth-3");


                            for (i = 1; i < cards.length; i++) {
                                card = cards[i];
                                TweenLite.set(card, {z: i * -18, x: i * -18});
                            }

                            $(card).removeClass("z-depth-3");
                            TweenLite.set(card, {webkitFilter: "blur(" + i - 1 + "px)"});
                            // TweenLite.set(card, {css: {zIndex: 1}});

                        }
                    },
                    onRelease: function () {
                        if (!dragged) {
                            $(this.target).removeClass("z-depth-3");

                        }
                    },

                    onDragEnd: function () {
                        //console.log(this.x+"_"+cardWidth);
                        // return Math.round(endValue / cardWidth) * cardWidth;

                        if (this.x < -40) {
                            //left animation
                            var lastCard = cards.pop();
                            cards.unshift(lastCard);
                            moveCards();
                        }
                        else {
                            var finalX = Math.round(this.x / cardWidth) * cardWidth;

                            var onCompleteFunction = null;
                            if (finalX != 0) {
                                onCompleteFunction = cardMovedOut;
                            }
                            else {
                                $(this.target).removeClass("z-depth-3");
                            }

                            TweenLite.to(this.target, .3, {
                                x: finalX,
                                z: 0,
                                onComplete: onCompleteFunction
                            });

                            for (i = 1; i < cards.length; i++) {
                                card = cards[i];
                                TweenLite.set(card, {z: i * -18, x: i * -18});
                            }
                        }


                    }

                });

            });

            function cardMovedOut() {
                //console.log("salio");
                var outCard = cards.shift();
                cards.push(outCard);
                moveCards();
            }

            function moveCards() {

                for (var i = 0; i < cards.length; i++) {
                    var card = cards[i];
                    var blur = i - 1;
                    if (blur < 0)blur = 0;

                    $(card).removeClass("z-depth-3");

                    if (i > 0) {
                        $(card).css("pointer-events", "none");
                    }
                    else {
                        $(card).css("pointer-events", "auto");
                    }

                    TweenLite.set(card, {css: {zIndex: cardsLength - i}});

                    TweenLite.to(card, .3, {
                        x: (i * -18),
                        z: (i * -20),
                        webkitFilter: "blur(" + blur + "px)"
                    });
                }
            }

        }
    };


    $.fn.carouselEnera = function () {

        return methods.init.apply(this);

    }; // Plugin end
}(jQuery));