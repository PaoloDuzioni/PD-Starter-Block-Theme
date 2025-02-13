import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

/**
 * GSAP on scroll animations
 *
 * Scroll animation
 * Scroll to ID section
 */
export default function scrollAnimations() {
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

    /**
     * Scroll Animation
     */
        // Setup
    const isMobile = window.innerWidth < 768;

    function commonScrollOptions(section) {
        return {
            scrollTrigger: {
                trigger: section,
                start: isMobile ? 'top bottom' : '100px 90%',
                //markers: true,
            },
            opacity: 0,
            duration: 0.5,
        };
    }

    // Block Text Side Image and Block Text Side Carousel
    const blockSTextSideImage = document.querySelector(
        '.block-text-side-image, .block-text-side-carousel',
    );
    if (blockSTextSideImage) {
        const colLeft = blockSTextSideImage.querySelector(
            '.wp-block-evidenzio-column:first-child',
        );
        const image = blockSTextSideImage.querySelector(
            '.wp-block-image, .block-carousel',
        );

        const delay =
            blockSTextSideImage.previousElementSibling.classList.contains(
                'block-slider-video',
            )
                ? 0.4
                : 0;

        gsap.from(colLeft, {
            ...commonScrollOptions(blockSTextSideImage),
            x: -100,
            delay,
        });

        gsap.from(image, {
            ...commonScrollOptions(image),
            x: 100,
            delay,
        });
    }


    /**
     * Animated Counters
     */
    const animatedCounters = document.querySelectorAll('.animated-counter');

    for (const counter of animatedCounters) {
        gsap.from(counter, {
            scrollTrigger: {
                trigger: counter,
                start: '100px 90%',
            },
            textContent: '0',
            duration: 1,
            ease: 'power1.inOut',
            modifiers: {
                // italian puntuation and no decimals
                textContent: value =>
                    value.toLocaleString('it-IT', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0,
                    }),
            },
        });
    }
    

    /**
     * Scroll to ID section
     */
    const urlHash = window.location.href.split('#')[1];
    const scrollElem = document.querySelector('#' + urlHash);

    if (urlHash && scrollElem) {
        const scrollTop = scrollElem.offsetTop;
        // get css header offset custom property and convert to px
        let headerOffset = getComputedStyle(
            document.documentElement,
        ).getPropertyValue('--header-scrolled-height');
        headerOffset = parseInt(headerOffset) * 10;

        gsap.to(window, {
            scrollTo: {
                y: scrollTop - headerOffset,
                autoKill: false,
            },
            duration: 0.5,
        });
    }
}
