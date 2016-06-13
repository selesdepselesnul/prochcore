const homeMenu = document.getElementById('homeMenu');
const aboutMenu = document.getElementById('aboutMenu');
const contactMenu = document.getElementById('contactMenu');
const menus = document.getElementsByClassName('menu');
const about = document.getElementById('about');
const contact = document.getElementById('contact');
const home = document.getElementById('home');


function activateContent(contentMenu) {
	contentMenu.style.backgroundColor = 'grey';
	contentMenu.style.borderRadius = '4px';
	contentMenu.style.visibility = '';
}

(function (){
	about.style.visibility = 'hidden';
    contact.style.visibility = 'hidden';
	activateContent(homeMenu);

	for (var i = 0; i < menus.length; i++)
		menus[i].onclick = (e) => {

			const menuId = e.srcElement.id;

			onDeactive(homeMenu);
			onDeactive(aboutMenu);
			onDeactive(contactMenu);

			if (menuId == "homeMenu")
				onActive(homeMenu, home, generateInActiveMenuList(homeMenu));
			else if(menuId == "aboutMenu")
				onActive(aboutMenu, about, generateInActiveMenuList(aboutMenu));
			else
				onActive(contactMenu, contact, generateInActiveMenuList(contactMenu));

		}

})()


function onActive(elem, active, inActiveList) {
	elem.style.backgroundColor = 'grey';
	elem.style.borderRadius = '4px';

	active.style.visibility = '';

	for (var i = 0; i < inActiveList.length; i++) {
		inActiveList[i].style.visibility = 'hidden';
	};
}

function onDeactive(elem) {
	elem.style.backgroundColor = '';
	elem.style.borderRadius = '';
}

function generateInActiveMenuList(menu) {
	switch(menu.id) {
		case 'homeMenu':
			return [about, contact];
		case 'aboutMenu':
			return [home, contact];
		default:
			return [home, about];
	}
}

function generateActiveMenu(menu) {
	switch(menu.id) {
		case 'homeMenu':
			return home;
		case 'aboutMenu':
			return about;
		default:
			return contact;
	}
}



function changeWhenScrolling(elem, adjElem, menu) {
	const indonistanLogo = document.getElementById('indonistanLogo');
	const menuList = document.getElementsByClassName('menu-list');
	const indonistanName = document.getElementById('indonistanName');


	if (window.scrollY == 0) {
		indonistanLogo.style.display = 'block';
		indonistanName.style.display = 'block';

		for (var i = 0; i < menus.length; i++) {
			menuList[i].style.display = 'block';
			menus[i].style.fontSize = '20px';
		}
	} else {
		indonistanLogo.style.display = 'none';
		indonistanName.style.display = 'none';
		for (var i = 0; i < menus.length; i++) {
			menuList[i].style.display = 'inline-block';
			menus[i].style.fontSize = '30px';
		}
	}

	if(adjElem) {
		if(window.scrollY >= elem.offsetTop
			&& window.scrollY <= adjElem.offsetTop)
			onActive(menu, generateActiveMenu(menu), generateInActiveMenuList(menu));
		else
			onDeactive(menu)
	} else {
		if(window.scrollY >= elem.offsetTop)
			onActive(menu, generateActiveMenu(menu), generateInActiveMenuList(menu));
		else
			onDeactive(menu);
	}
}

window.addEventListener('scroll',
	function() {

		changeWhenScrolling(home, about, homeMenu);
		changeWhenScrolling(about, contact, aboutMenu);
		changeWhenScrolling(contact, null, contactMenu);
});
