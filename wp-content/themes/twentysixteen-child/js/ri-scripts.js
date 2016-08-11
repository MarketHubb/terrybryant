jQuery(document).ready(function($) {
    var checkboxFormID = $('li.disclaimer div.ginput_container ul.gfield_checkbox li input[type="checkbox"]').attr('id');
    var checkboxLabel = $('label[for="' + checkboxFormID + '"]');
    var disclaimerLink = $('<a href="#" id="form-disclaimer">disclaimer</a>');
    var disclaimer = $('<div id="disclaimer-container"><p>I understand and agree that submitting this form and/or email communication with Terry Bryant Accident & Injury Law or any individual employed by the firm through its website does not create an attorney-client relationship with the firm, and the information I submit is not privileged or confidential.</p><p id="disclaimer-close">Close</p></div>')
    checkboxLabel.text('I have read the ').after(disclaimerLink);
    $('li.disclaimer div.ginput_container ul.gfield_checkbox li').after(disclaimer);
    $('#disclaimer-container').hide();

    $('a#form-disclaimer').on('click', function (event)
    {
        event.preventDefault();
        $('#disclaimer-container').toggle();
    });
    $('#disclaimer-close').on('click', function (event)
    {
        event.preventDefault();
        $('#disclaimer-container').toggle();
    });
});