( function( api ) {

    // Extends our custom "campus-education-pro" section.
    api.sectionConstructor['dropshipping-store-pro'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );
    jQuery(document).ready(function()
	{
	jQuery('#customize-theme-controls #sirat-img-container li img').click(function()
	{
	jQuery('#customize-theme-controls #sirat-img-container li img').removeClass('sirat-radio-img-selected');
	jQuery(this).addClass('sirat-radio-img-selected');
	});
	});
} )( wp.customize );