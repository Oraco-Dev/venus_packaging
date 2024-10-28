document.addEventListener("DOMContentLoaded", function () {
  let eventsOverlay = document.querySelector(".product-page__overlay");
  let eventsModal = document.querySelector(".product-page__modal");
  let openEventsButton = document.getElementById("product-form-button");
  let closeEventsButton = document.querySelector(".close-product-modal");

  if (
    !eventsOverlay &&
    !eventsModal &&
    !openEventsButton &&
    !closeEventsButton
  ) {
    return;
  }


  function openEventsModal() {
      eventsOverlay.classList.add("active");
      eventsModal.classList.add("active");
  }

  function closeEventsModal() {
    eventsOverlay.classList.remove("active");
    eventsModal.classList.remove("active");
  }

  openEventsButton.addEventListener("click", openEventsModal);
  closeEventsButton.addEventListener("click", closeEventsModal);

  eventsOverlay.addEventListener("click", function (event) {
    if (event.target === eventsOverlay) {
      closeEventsModal();
    }
  });
});

// EVENTS PAGE
document.addEventListener("DOMContentLoaded", function () {
  let eventsOverlay = document.querySelector(".product-page-video__overlay");
  let eventsModal = document.querySelector(".product-page-video__modal");
  let openEventsButton = document.getElementById("product-video-form-button");
  let closeEventsButton = document.querySelector(".close-product-video-modal");

  if (
    !eventsOverlay &&
    !eventsModal &&
    !openEventsButton &&
    !closeEventsButton
  ) {
    return;
  }


    function openEventsModal() {
      eventsOverlay.classList.add("active");
      eventsModal.classList.add("active");

  }

  function closeEventsModal() {
    eventsOverlay.classList.remove("active");
    eventsModal.classList.remove("active");
  }

  openEventsButton.addEventListener("click", openEventsModal);
  closeEventsButton.addEventListener("click", closeEventsModal);

  eventsOverlay.addEventListener("click", function (event) {
    if (event.target === eventsOverlay) {
      closeEventsModal();
    }
  });
});