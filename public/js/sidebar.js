
document.getElementById('sidebar-btn').addEventListener('click', () => {
  const sidebar = document.getElementById('sidebar');
  const logos = document.getElementsByClassName("hidden-logo");
  const header = document.getElementById('sidebar-header');
  const subheader = document.getElementById('sidebar-subheader');
  const navItemTitles = document.getElementsByClassName("navitem-title");

  sidebar.classList.toggle('lg:w-60');
  sidebar.classList.toggle('w-16');
  header.classList.toggle('pb-14');
  header.classList.toggle('pb-11');
  subheader.classList.toggle('hidden');

  for (let i = 0; i < logos.length; i++) {
    const logo = logos[i];
    logo.classList.toggle('hidden');
  }

  for (let i = 0; i < navItemTitles.length; i++) {
    const navItemTitle = navItemTitles[i];
    navItemTitle.classList.toggle('hidden');
  }
});