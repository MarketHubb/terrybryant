jQuery(document).ready(function($) {

    /**
     * Tabs functionality
     */
    $('ul#services-tabs-title-ul li a').on('click', function (event)
    {
        event.preventDefault();

        var target = $(this).data('tab');

        $('ul#services-tabs-title-ul li').each(function () {
            $(this).removeClass('active');
        })

        $(this).closest('li').addClass('active');

        $('#services-tabs-body-container .services-tab-body-container').each(function () {
            $(this).removeClass('active');

            if ($(this).data('body') == target) {
                $(this).addClass('active');
            }
        })

    });

}); // End Ready
