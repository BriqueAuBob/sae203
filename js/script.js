const buttons_menu = document.querySelectorAll(".burger_icon");
const menu = document.getElementById("menu");
for (const button of buttons_menu) {
  button.addEventListener("click", () => {
    if (menu.classList.contains("open")) {
      menu.classList.remove("open");
      setTimeout(() => {
        menu.classList.remove("visible");
      }, 300);
    } else {
      menu.classList.add("visible");
      window.requestAnimationFrame(() => {
        menu.classList.add("open");
      });
    }
  });
}

const carousels = document.querySelectorAll(".carousel");
for (const carousel of carousels) {
  const inner = carousel.querySelector(".carousel_inner");
  const items = carousel.querySelectorAll(".carousel_item");

  const state = document.createElement("div");
  state.classList.add("state");
  carousel.appendChild(state);

  const stateDots = document.createElement("div");
  stateDots.classList.add("dots");
  state.appendChild(stateDots);

  let current = 0;
  items[0].classList.add("active");
  stateDots.innerHTML = `<span></span>`.repeat(items.length);

  const dots = stateDots.children;
  dots[0].classList.add("active");

  let interval = null;
  function navigate(id) {
    gsap.to(inner, {
      duration: 0.5,
      x: inner.scrollLeft - items[id].offsetLeft,
      ease: "power2.inOut",
      overwrite: true,
    });
    items[current].classList.remove("active");
    dots[current].classList.remove("active");
    current = id;
    items[current].classList.add("active");
    dots[current].classList.add("active");
  }
  for (let i = 0; i < items.length; i++) {
    const item = items[i];
    const dot = dots[i];
    const ina = i;
    item.addEventListener("click", () => {
      navigate(ina);
      clearInterval(interval);
    });
    dot.addEventListener("click", () => {
      navigate(ina);
      clearInterval(interval);
    });
  }

  window.addEventListener("resize", (e) => {
    window.requestAnimationFrame(() => {
      navigate(current);
    });
  });

  interval = setInterval(() => {
    navigate((current + 1) % items.length);
  }, 5000);
}
