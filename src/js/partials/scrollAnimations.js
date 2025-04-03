import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

/**
 * GSAP on scroll animations
 *
 * - Fade animations
 * - Animated Counters
 * - Scroll to ID section
 */
export default function scrollAnimations() {
    gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
    /******************************************************
         FADE ANIMATIONS
     ******************************************************/

    /**
     * Setup
     */
    const isMobile = window.innerWidth < 768;
    const blocks = [];

    /**
     * Elements to animate
     */

    // Block Hero
    const blockHero = document.querySelectorAll('.block-hero');
    if (blockHero) {
        for (const block of blockHero) {
            const title = block.querySelector('.h1');
            const text = block.querySelector('.h2');
            const followBox = document.querySelector('.follow-box');

            setupElement(block, title, 'fade-left', block, 0.4);
            setupElement(block, text, 'fade-up', block, 0.9);

            if (followBox) {
                setupElement(block, followBox, 'fade-in', block, 1.4);
            }
        }
    }

    // Block Carousel
    const blockCarousel = document.querySelectorAll('.block-carousel');
    if (blockCarousel) {
        for (const block of blockCarousel) {
            const text = block.querySelectorAll('.h1, p');
            const items = block.querySelectorAll('.swiper-slide');
            const target = block.querySelector('.site-carousel');

            setupElement(block, text, 'fade-in', text);
            setupElement(block, items, 'fade-in', target, null, true);
        }
    }

    /**
     * Init Blocks elements to animate and set up its parent
     */
    for (const block of blocks) {
        block.parent.style.overflow = 'hidden';

        genAnimations(block.animations);
    }

    /**
     * Setup elements to animate
     * @param {HTMLElement} parent - The parent element
     * @param {HTMLElement} element - The element to animate
     * @param {string} type - The animation type
     * @param {HTMLElement} trigger - The trigger element
     * @param {number | null} delay - The animation delay
     * @param {boolean} stagger - The animation stagger
     */
    function setupElement(
        parent,
        element,
        type,
        trigger,
        delay = null,
        stagger = false,
    ) {
        const animation = {
            element,
            type,
            trigger: trigger,
            delay,
            stagger,
        };

        // push element if not already in array, else just push the animation in the animations array
        if (blocks.some(block => block.parent === parent)) {
            blocks
                .find(block => block.parent === parent)
                .animations.push(animation);
            return;
        }

        blocks.push({ parent, animations: [animation] });
    }

    /**
     * Core Animation function
     * @param {Array} animations - Array of objects containing the GSAP properties for the animations
     */
    function genAnimations(animations) {
        animations.forEach(item => {
            // Default options
            const animationOptions = {
                scrollTrigger: {
                    trigger: item.trigger,
                    start: 'top 90%',
                },
                duration: item.speed ?? 0.5,
                delay: item.delay ?? 0,
                stagger: item.stagger && !isMobile ? 0.3 : false,
                opacity: 0,
            };

            // Animation types
            switch (item.type) {
                case 'fade-in':
                    animationOptions.scale = 0;
                    break;
                case 'fade-in-half':
                    animationOptions.scale = 0.5;
                    break;
                case 'fade-left':
                    animationOptions.x = 100;
                    break;
                case 'fade-right':
                    animationOptions.x = -100;
                    break;

                case 'fade-up':
                    animationOptions.y = 100;
                    break;
                default:
                    console.error(
                        'Wrong or missing data-animation type:',
                        item.type,
                    );
            }

            gsap.from(item.element, {
                ...animationOptions,
            });
        });
    }

    
    /******************************************************
         Animated Counters
     ******************************************************/
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
    

    /******************************************************
         Scroll to ID section
     ******************************************************/
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
