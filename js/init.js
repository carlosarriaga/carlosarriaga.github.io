(function($){
	$(function(){
		//$('.tabs-wrapper .row').pushpin({ top: $('.tabs-wrapper').offset().top });

		//		$('.collapsible').collapsible({
		//			accordion : false
		//		});		
		
		$('.scrollspy').scrollSpy();

		$('.parallax').parallax();		

		$('.button-collapse').sideNav({
			menuWidth: 400, // Default is 240
			edge: 'left', // Choose the horizontal origin
			closeOnClick: false // Closes side-nav on <a> clicks, useful for Angular/Meteor
		});

		$('.tooltipped').tooltip({delay: 50});
		
		$('.modal-trigger').leanModal();
		



	}); // end of document ready
})(jQuery); // end of jQuery name space


