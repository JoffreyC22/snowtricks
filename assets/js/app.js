require('../css/app.scss');
require('../img/bkg.jpg');

var $ = require('jquery');
// JS is equivalent to the normal "bootstrap" package
// no need to set this to a variable, just require it
require('bootstrap-sass');

$(document).ready(function() {

    function slideToTricks() {
        $("#show-tricks").click(function() {
            $('html, body').animate({
                scrollTop: $(".tricks-wrapper").offset().top
            }, 2000);
        });
    }

    function loadMoreItems(entity) {
        $("#load-more-"+entity).click(function() {
           var items = $('.'+entity+'-container');
           console.log(items);
            $(items).each(function() {
                if ($(this).hasClass('hidden')){
                    $(this).removeClass('hidden');
                }
            });
            $(this).addClass('hidden');
        });
    }

    $('#back-top').click(function() {
        scrollTopPage();
    });

    /** Used functions **/
    slideToTricks();
    loadMoreItems('comment');
    loadMoreItems('trick');
    window.onscroll = function() {scrollFunction()};

});

function scrollFunction() {
    if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
        document.getElementById("back-top").style.display = "block";
    } else {
        document.getElementById("back-top").style.display = "none";
    }
}

function scrollTopPage() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}



