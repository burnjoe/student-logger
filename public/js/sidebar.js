
document.getElementById('sidebar-btn').addEventListener('click', () => {
  const sidebar = document.getElementById('sidebar');
  const header = document.getElementById('sidebar-header');
  const subheader = document.getElementById('sidebar-subheader');
  const windowWidth = window.innerWidth;

  // sidebar.classList.toggle('w-16');
  // sidebar.classList.toggle('w-60');
  // header.classList.toggle('pb-11');
  header.classList.toggle('pb-14');
  subheader.classList.toggle('hidden');





  
  // if (windowWidth < 1024) {
  //   // Mobile size
  //   sidebar.classList.toggle('w-16');
  //   sidebar.classList.toggle('w-0');
  // } else {
  //   // Desktop size
  //   sidebar.classList.toggle('lg:w-16');
  //   sidebar.classList.toggle('lg:w-60');
  // }

  document.querySelectorAll('.hidden-logo').forEach(logo => { 
    logo.classList.toggle('hidden');
  });

  document.querySelectorAll('.navitem-title').forEach(navItemTitle => {
    navItemTitle.classList.toggle('hidden');
  });
});