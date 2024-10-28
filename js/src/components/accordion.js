document.addEventListener("DOMContentLoaded", function () {
  // Get all accordion items
  let accordionItems = document.querySelectorAll(".accordion-item");

  // Loop through all accordion items
  accordionItems.forEach(function (item) {
    let head = item.querySelector(".accordion-item__head");
    let content = item.querySelector(".accordion-item__content");
    let headImg = head.querySelector(".accordion-item__head-img");

    // Add click event listener to the accordion item head
    head.addEventListener("click", function () {
      // Toggle the 'open' class for the content, head, and head image
      content.classList.toggle("open");
      head.classList.toggle("open");
      headImg.classList.toggle("open");

      // Close other open accordion items
      accordionItems.forEach(function (otherItem) {
        if (otherItem !== item) {
          otherItem
            .querySelector(".accordion-item__content")
            .classList.remove("open");
          otherItem
            .querySelector(".accordion-item__head")
            .classList.remove("open");
          otherItem
            .querySelector(".accordion-item__head-img")
            .classList.remove("open");
        }
      });
    });
  });
});
