
// show sidebar
const toggleBtn = document.getElementById('toggle-sidebar');
const toggleBtn2 = document.getElementById('toggle-sidebar2');
const sideBar = document.getElementById('side-bar');
const blockSidebar = document.getElementById('b-sidebar');

toggleBtn.addEventListener('click', () => {
  sideBar.classList.toggle('sidebar-active');
  blockSidebar.classList.toggle('sidebar-active');
});

toggleBtn2.addEventListener('click', () => {
  sideBar.classList.toggle('sidebar-active');
  blockSidebar.classList.toggle('sidebar-active');
});

// close sidebar
const sbClose = document.getElementById('sb-close');

sbClose.addEventListener('click', () => {
  sideBar.classList.toggle('sidebar-active');
  blockSidebar.classList.toggle('sidebar-active');
});

// user management submenu
const dSubmenuTgl = document.getElementById('u-submenu-toggle');
const dSubmenu = document.getElementById('u-sub-menu');
const dArrow = document.getElementById('u-submenu-arrow');

dSubmenuTgl.addEventListener('click', () => {
  dSubmenu.classList.toggle('u-submenu');
  dArrow.classList.toggle('rotate3');
});