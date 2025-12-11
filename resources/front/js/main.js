import '../css/main.css'
import Alpine from 'alpinejs'
import 'swiper/css';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import collapse from '@alpinejs/collapse'
import AOS from 'aos'
import 'aos/dist/aos.css'
import "flyonui/flyonui"


Alpine.plugin(collapse)

window.Alpine = Alpine

Alpine.data('layout', () => ({
    init() {
        const checkWidth = () => {
            this.show = window.innerWidth > 1024;
            this.active_layout = window.scrollY > 100;
        };
        const checkScroll = () => {
            this.scrolled = window.scrollY > 100;
            if (window.innerWidth > 1024) {
                this.active_layout = window.scrollY > 100;
            }
        }

        checkWidth()
        checkScroll()
        window.addEventListener('resize', () => {
            checkWidth()
        })
        window.addEventListener('scroll', () => {
            checkScroll()
        })
    },
    show: true,
    active_layout: false,
    scrolled: false,
    toggle() {
        this.show = !this.show
    },
}))

Alpine.start()

const services_swiper = new Swiper('.services-slider', {
    // configure Swiper to use modules
    modules: [Navigation, Autoplay],
    // Navigation arrows
    slidesPerView: 'auto',
    spaceBetween: 24,
    loop: true,
    addIcons: true,
    autoplay: {
        delay: 2000,
        pauseOnMouseEnter: false,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 'auto',
        },
        1024: {
            slidesPerView: 2,
        },
        1280: {
            slidesPerView: 3,
        },
        1536: {
            slidesPerView: 3,
        },
    },
});

const projects_swiper = new Swiper('.projects-slider', {
    // configure Swiper to use modules
    modules: [Navigation, Autoplay],
    // Navigation arrows
    slidesPerView: 'auto',
    spaceBetween: 24,
    loop: true,
    addIcons: true,
    autoplay: {
        delay: 2000,
        pauseOnMouseEnter: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 'auto',
        },
        1024: {
            slidesPerView: 1,
        },
        1280: {
            slidesPerView: 2,
        },
        1536: {
            slidesPerView: 2,
        },
    },
});

// Initialize AOS
AOS.init({
  duration: 1000,
  once: true,
  offset: 100
});
