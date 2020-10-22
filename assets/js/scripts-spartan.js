jQuery(document).on('change', '#campaignmonitor-update', function(event){ // Aug 7, 2020

      event.preventDefault(); // stop post action

			var xchk = 0 ;

			if ( jQuery(this).prop('checked') )
				 xchk = 1 ;

      jQuery.ajax({
          type: "POST",
          url: ajaxurl, // or '<?php echo admin_url('admin-ajax.php'); ?>'
          data: {
              action : 'wpcf7_cme_set_autoupdate',
							valcheck : xchk  ,
                },

          success: function( response ){ // response,data, textStatus, jqXHR,

            //jQuery( '#gg-select'+ itag ).html( response );

          },
          error: function(data, textStatus, jqXHR){

              alert(textStatus);

          },
      });
});

jQuery(document).on('click', '.cpe-trigger-log', function(event){

  event.preventDefault(); // stop post action

  jQuery.ajax({
      type: "POST",
      url: ajaxurl, // or '<?php echo admin_url('admin-ajax.php'); ?>'

      data: {

        action : 'campaing_logload',
        cme_idformxx : jQuery("#cme_txtcomodin").attr("value"),
        cmeapi: jQuery("#wpcf7-campaignmonitor-api").attr("value"),

      },
      // error: function(e) {
      //   console.log(e);
      // },

      beforeSend: function() {

        // jQuery("#log_reset").addClass("CHIMPLogger");

      },

      success: function( response ){ // response //data, textStatus, jqXHR

        jQuery('#cm_log_panel').html( response );

      },

      error: function(data, textStatus, jqXHR){

          alert( jqXHR );

      },

  });
});

jQuery(document).on('click', '#cm_log_reset', function(event){

  event.preventDefault(); // stop post action

  jQuery.ajax({
      type: "POST",
      url: ajaxurl, // or '<?php echo admin_url('admin-ajax.php'); ?>'

      data: {

        action : 'campaing_logreset',
        cme_idformxx : jQuery("#cme_txtcomodin").attr("value"),
        cmeapi: jQuery("#wpcf7-campaignmonitor-api").attr("value"),

      },
      // error: function(e) {
      //   console.log(e);
      // },

      beforeSend: function() {

        jQuery("#cm_log_reset").addClass("CHIMPLogger");

      },

      success: function( response ){ // response //data, textStatus, jqXHR

        jQuery('#cm_log_panel').html( response );

      },

      error: function(data, textStatus, jqXHR){

          alert( jqXHR );

      },

  });

});




jQuery(document).ready(function() {
	try {

		if (! jQuery('#wpcf7-campaignmonitor-cf-active').is(':checked'))

			jQuery('.campaignmonitor-custom-fields').hide();

		jQuery('#wpcf7-campaignmonitor-cf-active').click(function() {

			if (jQuery('.campaignmonitor-custom-fields').is(':hidden')
			&& jQuery('#wpcf7-campaignmonitor-cf-active').is(':checked')) {

				jQuery('.campaignmonitor-custom-fields').slideDown('fast');
			}

      else if (jQuery('.campaignmonitor-custom-fields').is(':visible')
			&& jQuery('#wpcf7-campaignmonitor-cf-active').not(':checked')) {

				jQuery('.campaignmonitor-custom-fields').slideUp('fast');
        jQuery(this).closest('form').find(".campaignmonitor-custom-fields input[type=text]").val("");

			}
		});
				
		
		jQuery(".cme-trigger").click(function() {

			jQuery(".cme-support").slideToggle("fast");

      jQuery(this).text(function(i, text){
          return text === "Show Advanced Settings" ? "Hide Advanced Settings" : "Show Advanced Settings";
      });

			return false; //Prevent the browser jump to the link anchor
		});
		
		jQuery(".cpe-trigger-sys").click(function() {
			
  		jQuery( "#toggle-sys-cme" ).slideToggle(250);

		});
		
		jQuery(".cpe-trigger-log").click(function() {

  		jQuery( "#cm_eventlog-sys" ).slideToggle(250);

		});
		
		
		function cme_toggleDiv() {

			setTimeout(function () {
					jQuery(".cme-cta").slideToggle(450);
			}, 10000);

		} ;
		cme_toggleDiv() ;


	}

	catch (e) {

	}

});