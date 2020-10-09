// < ![CDATA[
    jQuery(window).on('load', function () {
        var $preloader = jQuery('#page-preloader'),
            $spinner   = $preloader.find('.spinner');
        $spinner.fadeOut();
        $preloader.delay(500).fadeOut('slow');
    });
// ]]>