document.addEventListener("DOMContentLoaded", function () {
    let tabButtons = document.querySelectorAll(".about-page__tabs-buttons-button");
    let contentElements = document.querySelectorAll(".about-page__tabs-contents > div");

    // Function to activate tab and content based on the hash fragment
    function activateTabByHash() {
        // Get the hash fragment from the URL
        const hash = window.location.hash;
        // Extract tab id from the hash
        const tabId = hash.replace("#", "");
        // Activate tab and content
        activateTab(tabId);
    }

    // Function to activate tab
    function activateTab(tabId) {
        // Remove 'active' class from all buttons
        tabButtons.forEach(function (tabButton) {
            tabButton.classList.remove("active");
        });

        // Add 'active' class to the specified button
        let targetButton = document.getElementById(tabId);
        if (targetButton) {
            targetButton.classList.add("active");
        }

        // Hide all content elements
        contentElements.forEach(function (contentElement) {
            contentElement.classList.add("hidden");
        });

        // Show the specified content
        let targetContent = document.getElementById(`${tabId}-content`);
        if (targetContent) {
            targetContent.classList.remove("hidden");
        }
    }

    // Initial activation of the first tab
    activateTab('about-us');

    // Check if there is a hash fragment in the URL
    if (window.location.hash) {
        // Activate tab based on URL hash fragment
        activateTabByHash();
    }

    // Listen for hash changes (e.g., when user clicks back/forward buttons)
    window.addEventListener("hashchange", activateTabByHash);
});
