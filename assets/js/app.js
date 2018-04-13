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
            $(items).each(function() {
                if ($(this).hasClass('hidden')){
                    $(this).removeClass('hidden');
                }
            });
            $(this).addClass('hidden');
        });
    }

    function confirmDelete() {
        $('.delete-trick').click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var sure = confirm("Etes-vous sûr de vouloir supprimer ?");
            if (sure) {
                window.location.replace(href);
            }
        })
    }

    $('#back-top').click(function() {
        scrollTopPage();
    });

    function addAnotherItem(clicked) {
        $('.'+clicked).click(function (e) {
            e.preventDefault();
            var list = $($(this).attr('data-list'));
            // Try to find the counter of the list
            var counter = list.data('widget-counter') | list.children().length;
            // If the counter does not exist, use the length of the list
            if (!counter) { counter = list.children().length; }
            // grab the prototype template
            var newWidget = list.attr('data-prototype');
            // replace the "__name__" used in the id and name of the prototype
            // with a number that's unique to your emails
            // end name attribute looks like name="contact[emails][2]"
            newWidget = newWidget.replace(/__name__/g, counter);
            // Increase the counter
            counter++;
            // And store it, the length cannot be used if deleting widgets is allowed
            list.data(' widget-counter', counter);
            // create a new list element and add it to the list
            var newElem = $(list.attr('data-widget-tags')).html(newWidget);
            newElem.appendTo(list);
        });
    }

    /** Used functions **/
    slideToTricks();
    loadMoreItems('comment');
    loadMoreItems('trick');
    confirmDelete();
    addAnotherItem('add-another-collection-widget');
    addAnotherItem('add-another-collection-widget-video');
    window.onscroll = function() {scrollFunction()};

});

function scrollFunction() {
    if  ($("#back-top").length != 0) {
        if (document.body.scrollTop > 25 || document.documentElement.scrollTop > 25) {
            document.getElementById("back-top").style.display = "block";
        } else {
            document.getElementById("back-top").style.display = "none";
        }
    }
}

function scrollTopPage() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}




