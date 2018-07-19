jQuery( function($) {
	
	$(document).ready(function(){
		
		// Main menu superfish
		$('#main-menu > ul').addClass('dropdown-menu sf-menu');
		$('#main-menu > ul').superfish({
			delay: 200,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			cssArrows: false,
			disableHI: true
		});

    $('#responsiveTabs').responsiveTabs({
            startCollapsed: 'accordion'
        });

		// Mobile Menu
		$('#navigation-toggle').sidr({
			name: 'sidr-main',
			source: '#sidr-close, #site-navigation',
			side: 'left'
		});
		$(".sidr-class-toggle-sidr-close").click( function() {
			$.sidr('close', 'sidr-main');
			return false;
		});

		$('#views-exposed-form-federal-staff-directory-page button').click(
            function () {
                $('#views-exposed-form-federal-staff-directory-page').submit();
            }
        );

        /* loading aria attribute on pates tabs */
          $('.pates-tabs__list').attr('role', 'tablist');      // ul
          $('.pates-tabs__item').attr('role', 'presentation'); // li
          
          $('.pates-tabs__link').attr('role', 'tab');          // a
          $('.pates-tabs__link').each(function() {             // controls attribute
             $this = $(this);
             controls = '' + $this.attr('href');
             controls = controls.replace('#','');
             $this.attr('aria-controls', controls);
          });
          
          $('.pates-tabs__tabcontent').attr('role', 'tabpanel');    // contents
          $('.pates-tabs__tabcontent').attr('aria-hidden', 'true'); // all hidden
          $('.pates-tabs__tabcontent').each(function() {            // label by link
             $this = $(this);
             labelledby = 'label_' + $this.attr('id');
             $this.attr('aria-labelledby', labelledby);
          });
          
          // hash => select the good one
          hash = window.location.hash;
          hash = hash.replace('#','');
          $('.pates-tabs__tabcontent').each(function() {
             $this = $(this);
             if ( hash == $this.attr('id') ){
                 selector = '#' + hash;
                 // affichage
                 $(selector).removeAttr('aria-hidden');
                 // selection menu
                 selector = '#label_' + hash;
                 $(selector).attr('aria-selected', 'true');
                 return false; // on sort du each
             }
          });
          // if no selected => select first
          if ($('.pates-tabs__link[aria-selected]').length == 0) {
             $('.pates-tabs__link:first').attr('aria-selected', 'true');
             $('.pates-tabs__tabcontent:first').removeAttr('aria-hidden');
          }
          
           
          /* click on a link */
          $('.pates-tabs__link').click(
             function() {
              $this = $(this);
              
              // remove aria selected on all links + remove focusable
              $('.pates-tabs__link').removeAttr('aria-selected');
              
              // add aria selected on $this + focusable
              $this.attr('aria-selected', 'true');
              $this.attr('tabindex', '0');
              
              // add aria-hidden on all tabs
              $('.pates-tabs__tabcontent').attr('aria-hidden', 'true');
              
              // remove aria-hidden on tab linked
              id_to_show = '#' + $this.attr('aria-controls');
              $(id_to_show).removeAttr('aria-hidden');
              
              return false;
              }
            );		

	}); // End doc ready

	$(window).load(function(){
		// Homepage FlexSlider

		$('#main-menu > ul > li > a.sf-with-ul').append('<i class="fa fa-angle-down"></i>');
		$('#main-menu > ul > li li > a.sf-with-ul').append('<i class="fa fa-angle-right"></i>');

		$('#homepage-slider').flexslider({
			animation: 'fade',
			slideshow: true,
			smoothHeight: true,
			controlNav: false,
			directionNav: true,
			prevText: '<span class="fa fa-caret-left"></span>',
			nextText: '<span class="fa fa-caret-right"></span>',
			controlsContainer: ".flexslider-container"
		});
		
	}); // End on window load
	
});