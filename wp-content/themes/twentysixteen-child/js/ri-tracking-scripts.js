jQuery(document).ready(function($) {
	/**
	 * Google Analytics Event Tracking: ApexChat
	 */
	window.ChatInterceptor = function () {
		__gaTracker('send', 'event', 'ApexChat', 'Chat', 'Lead', 1);
    };
	/**
	 * Google Adword Call Conversion Tracking
	 */
	_googWcmGet('phone-number', '1-866-669-7720');
});