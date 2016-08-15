jQuery(document).ready(function($) {
	// Google Analytics Event Tracking: ApexChat
	window.ChatInterceptor = function () {
		__gaTracker('send', 'event', 'ApexChat', 'Chat', 'Lead', 1);
    };
});