window.addEventListener("scroll", () => {
    var navbar = document.querySelector("nav");
    if (window.scrollY > 250) {
        navbar.classList.remove("bg-transparent");
         navbar.classList.add("bg-white");
    } else {
      navbar.classList.remove("bg-white");
    }
    console.log("line 8", navbar);
  });
  