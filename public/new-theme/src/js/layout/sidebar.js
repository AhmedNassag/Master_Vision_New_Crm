"use strict";

// Class definition
var KTAppSidebar = function () {
	// Private variables
	var menuWrapper;

	var handleMenuScroll = function() {
		var menuActiveItem = menuWrapper.querySelector(".menu-link.active");

		if ( !menuActiveItem ) {
			return;
		}

		if ( KTUtil.isVisibleInContainer(menuActiveItem, menuWrapper) === true) {
			return;
		}

		menuWrapper.scroll({
			top: KTUtil.getRelativeTopPosition(menuActiveItem, menuWrapper),
			behavior: 'smooth'
		});
	}

	// Public methods
	return {
		init: function () {
			// Elements
			menuWrapper = document.querySelector('#kt_app_sidebar_menu_wrapper');

			if ( menuWrapper ) {
				handleMenuScroll();
			}
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTAppSidebar.init();
});



var sidebar  = document.getElementById('sideBar_Container');
var main     = document.getElementById('main_Ct');
var dNone    = document.getElementById('kt_app_sidebar');
var closeing = document.getElementById('kt_aside_toggle');

closeing.onclick = () => {
    if (sidebar.classList.contains('col-lg-3'))
    {
        sidebar.classList.replace('col-lg-3', 'col-lg-1');
        main.classList.replace('col-lg-9', 'col-lg-12');
        closeing.classList.replace('start-18','start-3');
        dNone.classList.add('d-none');
    }
    else
    {
        sidebar.classList.replace('col-lg-1', 'col-lg-3');
        main.classList.replace('col-lg-12', 'col-lg-9');
        dNone.classList.replace('d-none', 'd-flex');
        closeing.classList.replace('start-3','start-18');

        console.log('hi');
    }
};
