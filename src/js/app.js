import 'bootstrap/js/dist/collapse'; // Collapse: for navbar mobile collapse and accordion
import 'bootstrap/js/dist/dropdown'; // Dropdown: for navbar submenus
import bodyLoaded from './partials/bodyLoaded';
import scrollHeader from './partials/scrollHeader';
import siteSliders from './partials/sliders';
// import scrollAnimations from './partials/scrollAnimations'; // <-- requires GSAP (npm i gsap)

/**
 * MAIN APP JS LOGIC
 */

// CHECK IF DOCUMENT IS READY
if (document.readyState !== 'loading') {
    docIsReady();
} else {
    document.addEventListener('DOMContentLoaded', docIsReady);
}

// DOCUMENT READY FUNCTION
function docIsReady() {
    /**
     * Remove body onload layer
     */
    bodyLoaded();

    /**************************************************************************************
        CUSTOM CODE
     **************************************************************************************/

    /**
     * Check if the header is scrolled
     */
    scrollHeader();

    /**
     * Site sliders
     */
    siteSliders();

    /**
     * Site scroll animations
     */
    // scrollAnimations();
} // End Document Ready
