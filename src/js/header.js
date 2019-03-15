(function() {
  const menu = document.querySelector("#eats-icon-menu");
  const closeMenu = document.querySelector("#eats-icon-menu-close");
  const nav = document.querySelector(".eats-nav");

  const isDesktop = lodash.debounce(() => {
    const desktop = window.matchMedia("(min-width: 900px)");
    if (!desktop.matches) {
      nav.classList.remove("eats-nav--active");
    }
  }, 500);

  const toggleMenu = e => {
    if (e.target.matches(".eats-icon-menu")) {
      e.preventDefault();
      menu.classList.toggle("eats-icon-menu--hide");
      nav.classList.toggle("eats-nav--active");
      closeMenu.classList.toggle("eats-icon-menu-close--active");
    }
  };

  document.addEventListener("click", toggleMenu);
  window.addEventListener("resize", isDesktop);
})();
