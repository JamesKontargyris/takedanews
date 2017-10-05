(function()
{
    // Function to get URL parameters
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if(results != null) {
            return results[1] || 0;
        }

        return false;
    }

    // Show / hide search form when search button is clicked
    $('.search__button').on('click', function()
    {
        $('.search__container').slideToggle().find('.search-field').focus();
        return false;
    });


    // Redirect to homepage on click of logo
    $('.site-header__logo').on('click', function()
    {
        window.location.href = "/";
    });

    // Toggle show / hide on arrows that indicate revealing / hiding of content
    $('.newsletter__content__section__header, .newsletter__content__section__close-articles').on('click', function()
    {
        var section = $(this).closest('.newsletter__content__section');
        section.find('.newsletter__content__section__articles').slideToggle();
        section.find('.newsletter__content__section__header__arrow-indicator').toggleClass('hide');
    });

    // Show back-to-top link when scrolling down page
    $(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 20) {
            $('.button--back-to-top').fadeIn();
        } else {
            $('.button--back-to-top').fadeOut();
        }
    });

    // If a section or article ID is found in the URL, open the relevant section and scroll down to the element with the ID
    var hash = window.location.hash.substr(1);
    console.log(hash);
    if(hash) {
        var location = $("#" + hash);
        if($.urlParam('type') != 0 && $.urlParam('type') == 'section')
        {
            location.find('.newsletter__content__section__articles').slideToggle(50, function()
            {
                $('html,body').animate({scrollTop: $(location).offset().top},300);
            });
            location.find('.newsletter__content__section__header__arrow-indicator').toggleClass('hide');
        }
        else if($.urlParam('type') != 0 && $.urlParam('type') == 'article')
        {
            location.closest('.newsletter__content__section__articles').slideToggle(50, function()
            {
                $('html,body').animate({scrollTop: $(location).offset().top},300);
            });
            location.closest('.newsletter__content__section').find('.newsletter__content__section__header__arrow-indicator').toggleClass('hide');
        }
    }

})();