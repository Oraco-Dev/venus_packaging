var scrollToTopButton = document.querySelector(".bt__button");

// Add a click event listener to the button
scrollToTopButton.addEventListener("click", function () {
  // Scroll to the top of the page
  window.scroll({
    top: 0,
    left: 0,
    behavior: "smooth", // This provides a smooth scrolling effect (optional)
  });
});
