// document.addEventListener("DOMContentLoaded", function() {
//     var galleryItems = document.querySelectorAll('[data-fancybox="gallery"]');

//     // Function to hide header and fixed-contact
//     // function hideHeaderAndContact() {
//     //     document.querySelector('.header').style.display = 'none';
//     //     document.querySelector('.fixed-contact').style.display = 'none';
//     // }

//     // galleryItems.forEach(function(item) {
//     //     item.addEventListener('click', function() {
//     //         hideHeaderAndContact();
//     //     });
//     // });

//     // Function to show header and fixed-contact
//     function showHeaderAndContact() {
//         document.querySelector('.header').style.display = 'block';
//         document.querySelector('.fixed-contact').style.display = 'block';
//     }

//     // Check if Fancybox is open on click outside the lightbox
//     document.addEventListener('click', function(event) {
//         if (!isFancyboxOpen()) {
//             // Show the header and .fixed-contact if Fancybox is not open
//             showHeaderAndContact();
//         }
//     });

//     // Function to check if Fancybox is open
//     function isFancyboxOpen() {
//         return document.querySelector('.fancybox-is-open') !== null;
//     }

//     // Attach event listener for click outside the lightbox
//     document.addEventListener('afterShow.fb', function() {
//         document.addEventListener('click', clickOutsideHandler);
//     });

//     // Function to handle click outside the lightbox
//     function clickOutsideHandler(event) {
//         if (!isFancyboxOpen()) {
//             // Show the header and .fixed-contact if Fancybox is not open
//             showHeaderAndContact();
//             // Remove the event listener to prevent multiple bindings
//             document.removeEventListener('click', clickOutsideHandler);
//         }
//     }
// });