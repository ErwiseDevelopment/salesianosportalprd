let data = new Date()
let monthCurrent = String(data.getMonth() + 1).padStart(2, '0')
monthCurrent = parseInt(monthCurrent)
monthCurrent--


//banner
const swiperBanner = new Swiper( '.js-swiper-banner', {
    loop: true,

    autoplay: {
        delay: 6000,
        disableOnInteraction: false
    }
});

//calendar
const swiperMonth = new Swiper( '.js-swiper-month', {
    allowTouchMove: false,
    initialSlide: monthCurrent,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

//calendar day

const swiperDay = new Swiper( '.js-swiper-day', {
    allowTouchMove: false,
    initialSlide: monthCurrent,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

const swiperCalendar = new Swiper( '.js-swiper-calendar', {
    allowTouchMove: false,
    initialSlide: monthCurrent,
    
    navigation: {
        prevEl: '.js-swiper-button-prev-calendar',
        nextEl: '.js-swiper-button-next-calendar'
    }
})

//videos
const swiperVideos = new Swiper( '.js-swiper-videos', {
    navigation: {
        prevEl: '.js-swiper-button-prev-videos',
        nextEl: '.js-swiper-button-next-videos'
    },

    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 3,
            spaceBetween: 6,
        }
    }
}) 

//Banner Materials
const swiperMaterials = new Swiper( '.js-swiper-banner-materials', {
	autoplay: {
		delay: 6000,
		disableOnInteraction: false
	}
}) 