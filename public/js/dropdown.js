const dropdowns = document.querySelectorAll('.dropdown');

dropdowns.forEach(dropdown => {
  const toggleButton = dropdown.querySelector('.dropdown-toggle');

  toggleButton.addEventListener('click', function(event) {
    const menu = dropdown.querySelector('.dropdown-menu');
    menu.classList.toggle('hidden');

    event.stopPropagation();
  });
});

// document.addEventListener('click', function(event) {
//   // Close all open dropdown menus
//   es.forEach(dropdown => {
//     const menu = dropdown.querySelector('.dropdown-menu');

//     if (!menu.classList.contains('hidden')) {
//       menu.classList.remove('hidden');
//     }
//   });
// });
