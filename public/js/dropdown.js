// document.getElementById('').addEventListener('click', () => {
//   const sidebar = document.getElementById('sidebar');
//   const logos = document.getElementsByClassName("hidden-logo");
//   const header = document.getElementById('sidebar-header');
//   const subheader = document.getElementById('sidebar-subheader');
//   const navItemTitles = document.getElementsByClassName("navitem-title");

  
// });


const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
  const toggleButton = dropdown.querySelector('.dropdown-toggle');

  toggleButton.addEventListener('click', function(event) {
    const menu = dropdown.querySelector('.dropdown-menu');
    menu.classList.toggle('hidden');

    event.stopPropagation();
  });
});

document.addEventListener('click', function(event) {
  // Close all open dropdown menus
  dropdowns.forEach(dropdown => {
    const menu = dropdown.querySelector('.dropdown-menu');

    if (!menu.classList.contains('hidden')) {
      menu.classList.remove('hidden');
    }
  });
});
