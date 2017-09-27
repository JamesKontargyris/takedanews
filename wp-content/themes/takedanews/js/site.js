(function()
{
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

    // If a section ID is found in the URL, open the relevant section
    var hash = window.location.hash.substr(1);
    if(hash) {
        var section = $('#' + hash);
        section.find('.newsletter__content__section__articles').slideToggle();
        section.find('.newsletter__content__section__header__arrow-indicator').toggleClass('hide');
    }

})();