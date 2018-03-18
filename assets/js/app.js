require('../css/app.scss');

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

    /** Used functions **/
    slideToTricks();
});


