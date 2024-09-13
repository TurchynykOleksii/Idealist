const sloganEl = document.querySelector('.slogan__text');
const aboutEl = document.querySelector('.about__info');
const sloganText = new SplitType(sloganEl, {
	types: 'words, chars',
});
const aboutText = new SplitType(aboutEl, {
	types: 'words, chars',
});

gsap.registerPlugin(ScrollTrigger);

gsap.from(sloganText.chars, {
	scrollTrigger: {
		trigger: sloganEl,
		start: 'top 60%',
		end: 'top 20%',
		scrub: true,
		markers: false,
	},
	opacity: 0.2,
	stagger: 0.05,
});

gsap.from(aboutText.chars, {
	scrollTrigger: {
		trigger: aboutEl,
		start: 'top 60%',
		end: 'top 20%',
		scrub: true,
		markers: false,
	},
	opacity: 0.2,
	stagger: 0.05,
});

let isDesk = $('body').hasClass('desktop'),
	menuOpen = false;

let scrollTop = $(window).scrollTop(),
	lastScrollTop = scrollTop;

var mobile = window.matchMedia('(min-width: 0px) and (max-width: 768px)');
var tablet = window.matchMedia('(min-width: 769px) and (max-width: 1023px)');
var desktop = window.matchMedia('(min-width: 1023px) and (max-width: 1279px)'); // Enable (for mobile)
var desktop_pc = window.matchMedia('(min-width: 1280px)');

if ($('header').hasClass('autoHide')) {
	if (mobile.matches && scrollTop > 200) {
		$('header').addClass('header--scrolled');
	} else if (scrollTop > 800) {
		$('header').addClass('header--scrolled');
	}
}

function throttle(fn, wait) {
	var time = Date.now();
	return function () {
		if (time + wait - Date.now() < 0) {
			fn();
			time = Date.now();
		}
	};
}

window.addEventListener('scroll', throttle(DocumentScroll, 100));

function DocumentScroll() {
	scrollTop = $(window).scrollTop();

	if ($('header').hasClass('autoHide')) {
		if (scrollTop < lastScrollTop || scrollTop < 200) {
			// scroll UP
			$('header').removeClass('header--hide');
		} else if (scrollTop > 200) {
			// scroll DOWN
			$('header').addClass('header--hide');
		}
	}

	if (mobile.matches) {
		scrollTop > 200
			? $('header').addClass('header--scrolled')
			: $('header').removeClass('header--scrolled');
	} else {
		scrollTop > 800
			? $('header').addClass('header--scrolled')
			: $('header').removeClass('header--scrolled');
	}

	lastScrollTop = scrollTop;
}

$(document).ready(function () {
	const urlParams = window.location.search
		.replace('?', '')
		.split('&')
		.reduce(function (p, e) {
			var a = e.split('=');
			p[decodeURIComponent(a[0])] = decodeURIComponent(a[1]);
			return p;
		}, {});

	if (urlParams['thank-you']) {
		const url = new URL(document.location);
		const searchParams = url.searchParams;
		searchParams.delete('thank-you');
		window.history.pushState({}, '', url.toString());
	}

	$('.header__burger').on('click', function () {
		if (!$('body').hasClass('menu-open')) {
			$('body').addClass('menu-open');
		} else {
			$('body').removeClass('menu-open');
		}
	});

	$('.header__menu-liscrollTop a').on('click', function () {
		$('.header__burger').removeClass('active');
		$('body').removeClass('menu-open');
	});

	document.addEventListener(
		'wpcf7mailsent',
		function (event) {
			event.preventDefault();
			const formID = event.detail.contactFormId;
			const $popupThanks = $('.popup--thanks');

			if ($popupThanks) {
				$('.popup').hide();
				$('body').addClass('scroll-disable');
				$popupThanks.parent().addClass('show').hide().fadeIn(200);
				$popupThanks.hide().fadeIn(200);
			}

			if ($('input[value="' + formID + '"]')) {
				const formName = $('input[value="' + formID + '"]').val();
				window.history.pushState('1', 'Thank-you', '?thank-you=' + formName);
			} else {
				window.history.pushState('1', 'Thank-you', '?thank-you=' + formID);
			}
		},
		false
	);
});

// const observer = new IntersectionObserver((entries) => {
//   entries.forEach((entry) => {
//     const target1 = entry.target.querySelector(".services__title");
//     const target2 = entry.target.querySelector(".services__area-item");

//     if (entry.isIntersecting) {
//       target1.classList.add("in-view");
//       target2.classList.add("in-view");
//       return; // if we added the class, exit the function
//     }

//     // We're not intersecting, so remove the class!
//     target1.classList.remove("in-view");
//     target2.classList.remove("in-view");
//   });
// });

// observer.observe(document.querySelector(".services"));

// Create the observer like the examples above
const observer = new IntersectionObserver(
	(entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add('in-view');
				return;
			}

			entry.target.classList.remove('in-view');
		});
	},
	{threshold: 1.0}
);

// Get multiple elements instead of a single one using "querySelectorAll"
const targets = document.querySelectorAll('.serives__area-item');
const targets2 = document.querySelectorAll('.about__anim-line');

// Loop over the elements and add each one to the observer
targets.forEach((element) => observer.observe(element));
targets2.forEach((element) => observer.observe(element));
observer.observe(document.querySelector('.services__title'));
observer.observe(document.querySelector('.about__title'));

const mobileMenuBtn = document.querySelector('.header__burger-menu');
const mobileMenuEl = document.querySelector('.mobile__menu');
const burgerIcon = document.querySelector('.mobile__burger-icon');
const crossIcon = document.querySelector('.mobile__corss-icon');
const mobileMenuItems = document.querySelectorAll('.mobile__nav-item');
const accordionItems = document.querySelectorAll('.services__area-item');

const toggleMobileMenu = () => {
	mobileMenuEl.classList.toggle('hide__menu');
	if (!mobileMenuEl.classList.contains('hide__menu')) {
		burgerIcon.classList.add('hide-icon');
		crossIcon.classList.remove('hide-icon');
		document.querySelector('body').style.overflow = 'hidden';
	} else {
		document.querySelector('body').style.overflow = 'visible';
		burgerIcon.classList.remove('hide-icon');
		crossIcon.classList.add('hide-icon');
	}
};

mobileMenuItems.forEach((menuItem) => {
	menuItem.addEventListener('click', toggleMobileMenu);
});

mobileMenuBtn.addEventListener('click', toggleMobileMenu);

targets.forEach((item) => {
	item.addEventListener('click', () => {
		item.querySelector('.services__info').classList.toggle('hide-info');
	});
});

accordionItems.forEach((item) => {
	item.addEventListener('click', () => {
		item
			.querySelector('.services__accordion-item')
			.classList.toggle('services__accordion');
		item.querySelector('.services__icon').classList.toggle('services__icon-up');
	});
});

const poppupServiceEl = document.querySelector('.poppup__form-service');
const poppupFormatEl = document.querySelector('.poppup__form-format');
const poppupFormatTitleEl = document.querySelector('.poppup__service-format');
const poppupServiceTitleEl = document.querySelector('.poppup__service-service');

function visibleAccordion(accordionParent, rotate) {
	accordionParent.classList.toggle('show__accordion');
	if (!accordionParent.classList.contains('show__accordion')) {
		rotate.querySelector('.poppup__rotate').style.transform = 'rotate(0)';
	} else {
		rotate.querySelector('.poppup__rotate').style.transform = 'rotate(180deg)';
	}
}

poppupFormatTitleEl.addEventListener('click', () => {
	visibleAccordion(poppupFormatEl, poppupFormatTitleEl);
});
poppupServiceTitleEl.addEventListener('click', () => {
	visibleAccordion(poppupServiceEl, poppupServiceTitleEl);
});

const bannerBtnEl = document.querySelector('.banner__btn');
const overlayEl = document.querySelector('.overlay');
const poppupEl = document.querySelector('.poppup');
const poppupCloseEl = document.querySelector('.poppup__close');

const writeBtnEl = document.querySelector('.services__btn-mob');
const getConsultation = document.querySelector('.ready__consultation');
const footerConsultation = document.querySelector('.footer__btn');

footerConsultation.addEventListener('click', () => {
	if (overlayEl.classList.contains('overlay__hide')) {
		document.getElementsByTagName('html')[0].classList.add('body-noscroll');
	} else {
		document.getElementsByTagName('html')[0].classList.remove('body-noscroll');
	}

	overlayEl.classList.toggle('overlay__hide');
	poppupEl.classList.toggle('poppup__hide');
});

getConsultation.addEventListener('click', () => {
	if (overlayEl.classList.contains('overlay__hide')) {
		document.getElementsByTagName('html')[0].classList.add('body-noscroll');
	} else {
		document.getElementsByTagName('html')[0].classList.remove('body-noscroll');
	}

	overlayEl.classList.toggle('overlay__hide');
	poppupEl.classList.toggle('poppup__hide');
});

writeBtnEl.addEventListener('click', () => {
	if (overlayEl.classList.contains('overlay__hide')) {
		document.getElementsByTagName('html')[0].classList.add('body-noscroll');
	} else {
		document.getElementsByTagName('html')[0].classList.remove('body-noscroll');
	}

	overlayEl.classList.toggle('overlay__hide');
	poppupEl.classList.toggle('poppup__hide');
});

bannerBtnEl.addEventListener('click', () => {
	if (overlayEl.classList.contains('overlay__hide')) {
		document.getElementsByTagName('html')[0].classList.add('body-noscroll');
	} else {
		document.getElementsByTagName('html')[0].classList.remove('body-noscroll');
	}

	overlayEl.classList.toggle('overlay__hide');
	poppupEl.classList.toggle('poppup__hide');
});

overlayEl.addEventListener('click', (e) => {
	if (e.currentTarget === e.target) {
		overlayEl.classList.add('overlay__hide');
		poppupEl.classList.add('poppup__hide');
		document.getElementsByTagName('html')[0].classList.remove('body-noscroll');
	}
});

poppupCloseEl.addEventListener('click', () => {
	overlayEl.classList.add('overlay__hide');
	poppupEl.classList.add('poppup__hide');
	document.getElementsByTagName('html')[0].classList.remove('body-noscroll');
});

const hoursEl = document.querySelector('.details__hours');
const coastEl = document.querySelector('.details__coasts');
const detailsCross = document.querySelectorAll('.details__close-icon');

function hoverTextSHow(el) {
	el.nextElementSibling.style.opacity = '1';
	el.nextElementSibling.style.zIndex = '3';
}

hoursEl.addEventListener('click', () => hoverTextSHow(hoursEl));
coastEl.addEventListener('click', () => hoverTextSHow(coastEl));

detailsCross.forEach((cross) => {
	cross.addEventListener('click', () => {
		hoursEl.nextElementSibling.style.opacity = '0';
		coastEl.nextElementSibling.style.opacity = '0';
		coastEl.nextElementSibling.style.zIndex = '-2';
		hoursEl.nextElementSibling.style.zIndex = '-2';
	});
});

const nameErrorEl = document.querySelector('.poppup__name-error');
const mailErrorEl = document.querySelector('.poppup__mail-error');
const telErrorEl = document.querySelector('.poppup__tel-error');

const nameInputEl = document.querySelector('.form__input-name');
const telInputEl = document.querySelector('.form__input-tel');
const emailInputEl = document.querySelector('.form__input-mail');

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const telPattern = /^\+380\d{9}$/;

const namePattern = /^[a-zA-Zа-яА-ЯёЁ\s]+$/;

nameInputEl.addEventListener('blur', () => {
	if (
		nameInputEl.value.length < 2 ||
		!namePattern.test(nameInputEl.value.trim())
	) {
		nameErrorEl.classList.add('show-error');
	} else {
		nameErrorEl.classList.remove('show-error');
	}
});

telInputEl.addEventListener('blur', () => {
	if (!telPattern.test(telInputEl.value.trim())) {
		telErrorEl.classList.add('show-error');
	} else {
		telErrorEl.classList.remove('show-error');
	}
});

emailInputEl.addEventListener('blur', () => {
	if (!emailPattern.test(emailInputEl.value.trim())) {
		mailErrorEl.classList.add('show-error');
	} else {
		mailErrorEl.classList.remove('show-error');
	}
});
