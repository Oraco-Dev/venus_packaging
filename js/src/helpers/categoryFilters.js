import { filterPosts } from "./filterPosts";

const blogBadges = document.querySelectorAll(".blog-filter__badges a");

blogBadges.forEach((el) => {
  el.addEventListener("click", () => {
    console.log(el);
    // const elColor = el.getAttribute("data-border");
    const elValue = el.getAttribute("data-category");

    if (el.classList.contains("selected")) {
      el.classList.remove("selected");
      //   el.style.backgroundColor = `transparent`;
    } else {
      el.classList.add("selected");
      //   el.style.backgroundColor = `${elColor}`;
    }
    filterPosts(elValue);
  });
});
