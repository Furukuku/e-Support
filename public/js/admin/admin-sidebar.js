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

// profile submenu
const pSubmenuTgl = document.getElementById('p-submenu-toggle');
const pSubmenu = document.getElementById('p-sub-menu');
const pArrow = document.getElementById('p-submenu-arrow');

pSubmenuTgl.addEventListener('click', () => {
  pSubmenu.classList.toggle('p-submenu');
  pArrow.classList.toggle('rotate1');
});

// users management submenu
const uSubmenuTgl = document.getElementById('u-submenu-toggle');
const uSubmenu = document.getElementById('u-sub-menu');
const uArrow = document.getElementById('u-submenu-arrow');

uSubmenuTgl.addEventListener('click', () => {
  uSubmenu.classList.toggle('u-submenu');
  uArrow.classList.toggle('rotate2');
});

// documents management submenu
const dSubmenuTgl = document.getElementById('d-submenu-toggle');
const dSubmenu = document.getElementById('d-sub-menu');
const dArrow = document.getElementById('d-submenu-arrow');

dSubmenuTgl.addEventListener('click', () => {
  dSubmenu.classList.toggle('d-submenu');
  dArrow.classList.toggle('rotate3');
});

// if(pSubmenu.style.display == 'block' && pArrow.classList.contains('rotate1')){
//   uSubmenu.style.display('none');
//   dSubmenu.style.display('none');
//   uSubmenu.classList.remove('rotate2');
//   dSubmenu.classList.remove('rotate3');
// }
// if(pArrow.classList.contains('rotate1')){
//   console.log('hello po')
// }
// console.log('hello' + pSubmenu.style.display)

// sidebar active navigation/indicator
// const navigationLists = document.getElementsByClassName('nav-list');

// for(let i = 0; i < navigationLists.length; i++){
//   navigationLists[i].addEventListener('click', () => {
//     if(navigationLists[i].classList.contains('navigate-active')){
//       return;
//     }else{
//       for(let j = 0; j < navigationLists.length; j++) {
//         if(navigationLists[j].classList.contains('navigate-active')){
//           navigationLists[j].classList.remove('navigate-active');
//         }
//       }
//       navigationLists[i].classList.add('navigate-active');
//     }
//   });
// }