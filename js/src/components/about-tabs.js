document.addEventListener("DOMContentLoaded", function () {
  let tabButtons = document.querySelectorAll(
    ".about-page__tabs-buttons-button"
  );
  let contentElements = document.querySelectorAll(
    ".about-page__tabs-contents > div"
  );

  // Initial activation
  tabButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Remove 'active' class from all buttons
      tabButtons.forEach(function (tabButton) {
        tabButton.classList.remove("active");
      });

      // Add 'active' class to the clicked button
      button.classList.add("active");

      // Hide all content elements
      contentElements.forEach(function (contentElement) {
        contentElement.classList.add("hidden");
      });

      // Show the corresponding content based on the clicked button
      let buttonId = button.id; // Extract the tab ID from button id
      let contentId = buttonId + "-content";
      document.getElementById(contentId).classList.remove("hidden");
    });
  });
});
