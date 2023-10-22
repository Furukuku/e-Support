
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