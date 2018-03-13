/**
* Custom Js for backend 
*
* @package Blog_Era
*/
jQuery(document).ready(function($) {
    $('#blog-era-img-container li label img').click(function(){    	
        $('#blog-era-img-container li').each(function(){
            $(this).find('img').removeClass ('blog-era-radio-img-selected') ;
        });
        $(this).addClass ('blog-era-radio-img-selected') ;
    });                    
});

( function( api ) {

	api.sectionConstructor['upsell'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );