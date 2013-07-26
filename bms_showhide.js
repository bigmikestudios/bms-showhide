// JavaScript Document

jQuery(document).ready(function() {
	
  // set up readmore toggle
	jQuery("div.bms-sh div.bms-sh-label").each(function(){
		var new_content = '<a href="javascript: void(0);">'+jQuery(this).html() + '</a>';
		jQuery(this).html(new_content);
	});

	// hide it all initially
  jQuery("div.bms-sh div.bms-sh-moreinfo").hide();
  
  // add the toggle
	jQuery('div.bms-sh div.bms-sh-label a').click(function(e){
    e.preventDefault();
		jQuery(this).parent().parent().children('div.bms-sh-moreinfo').slideToggle('fast', 'linear');
		var is_open = jQuery(this).hasClass('bms-sh-is_open');
		if (is_open)
		{
			jQuery(this).removeClass('bms-sh-is_open');

		}
		else
		{
			jQuery(this).addClass('bms-sh-is_open');
		}
	});
});