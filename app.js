const body = document.querySelector('.header .user-p ');
const mobile_menu = document.querySelector('.header .user-p ');
const menu_item = document.querySelectorAll('.header .user-p ');
const header = document.querySelector('.header.container');

body.addEventListener('click', () => {
	body.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		body.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});