const nav = document.querySelector(".navbar");
let lastScroll = 0;

//window.scrollY = level of scroll
window.addEventListener("scroll", () => {
  if (lastScroll < window.scrollY) {
    nav.style.top = "-60px";
  } else {
    nav.style.top = "0px";
  }
  lastScroll = window.scrollY;
});
