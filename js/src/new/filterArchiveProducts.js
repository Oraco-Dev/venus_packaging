(function() {
    let ajaxurl = ajax_object.ajaxurl;

    document.addEventListener('DOMContentLoaded', function() {
        // Handle regular product filters
        var checkboxes = document.querySelectorAll('.filter-product-archive-checkbox');
        var productListContainer = document.getElementById('product-list-container');
        var originalProducts = '';

        if (productListContainer) {
            originalProducts = productListContainer.innerHTML;

            function fetchAndDisplayProducts(categories, currentCategory) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', ajaxurl); // WordPress AJAX handler
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        productListContainer.innerHTML = xhr.responseText;
                        loadProductImages();
                    } else {
                        console.error('Request failed. Status: ' + xhr.status);
                    }
                };
                xhr.onerror = function() {
                    console.error('Request failed');
                };
                xhr.send('action=filter_products&categories=' + encodeURIComponent(JSON.stringify(categories)) + '&current_category=' + encodeURIComponent(currentCategory));
            }

            function resetProducts() {
                productListContainer.innerHTML = originalProducts;
                loadProductImages();
            }

            function loadProductImages() {
                var event = new Event('loadProductImages');
                document.dispatchEvent(event);
            }

            var currentCategory = document.getElementById('current-category-slug').value;
            console.log(currentCategory);
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    var selectedCategories = [];
                    checkboxes.forEach(function(checkbox) {
                        if (checkbox.checked) {
                            selectedCategories.push(checkbox.value);
                            console.log(selectedCategories);
                        }
                    });

                    if (selectedCategories.length === 0) {
                        resetProducts();
                    } else {
                        fetchAndDisplayProducts(selectedCategories, currentCategory);
                    }
                });
            });

            document.addEventListener('loadProductImages', function() {
                if (typeof wc_add_to_cart_variation_params !== 'undefined') {
                    $(document.body).trigger('wc_fragment_refresh');
                }
            });
        }

        // Handle eco product filters
        var ecoCheckboxes = document.querySelectorAll('.filter-eco-product-archive-checkbox');
        var ecoProductListContainer = document.getElementById('product-list-container-eco');
        var originalEcoProducts = '';

        if (ecoProductListContainer) {
            originalEcoProducts = ecoProductListContainer.innerHTML;

            function fetchAndDisplayEcoProducts(categories, currentCategory) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', ajaxurl); // WordPress AJAX handler
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        ecoProductListContainer.innerHTML = xhr.responseText;
                        loadEcoProductImages();
                    } else {
                        console.error('Request failed. Status: ' + xhr.status);
                    }
                };
                xhr.onerror = function() {
                    console.error('Request failed');
                };
                xhr.send('action=filter_eco_products&categories=' + encodeURIComponent(JSON.stringify(categories)) + '&current_category=' + encodeURIComponent(currentCategory));
            }

            function resetEcoProducts() {
                ecoProductListContainer.innerHTML = originalEcoProducts;
                loadEcoProductImages();
            }

            function loadEcoProductImages() {
                var event = new Event('loadEcoProductImages');
                document.dispatchEvent(event);
            }

            var currentCategory = document.getElementById('current-category-slug').value;

            ecoCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    console.log('Eco checkbox changed');
                    var selectedCategories = [];
                    ecoCheckboxes.forEach(function(checkbox) {
                        if (checkbox.checked) {
                            selectedCategories.push(checkbox.value);
                        }
                    });

                    if (selectedCategories.length === 0) {
                        resetEcoProducts();
                    } else {
                        fetchAndDisplayEcoProducts(selectedCategories, currentCategory);
                    }
                });
            });

            document.addEventListener('loadEcoProductImages', function() {
                if (typeof wc_add_to_cart_variation_params !== 'undefined') {
                    $(document.body).trigger('wc_fragment_refresh');
                }
            });
        }
    });
})();
