add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products'); // Allow non-logged in users to use AJAX

function filter_products() {
$selectedCategories = json_decode(stripslashes($_POST['categories']));
$args = array(
'post_type' => 'product',
'posts_per_page' => -1, // Get all products
'tax_query' => array(
'relation' => 'OR',
array(
'taxonomy' => 'product_cat',
'field' => 'name',
'terms' => $selectedCategories,
'operator' => 'IN'
)
)
);

$query = new WP_Query($args);

if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post();
// Display only the title of the product
echo '<li>' . get_the_title() . '</li>';
endwhile;
else :
echo '<p>No products found</p>';
endif;

wp_die(); // Always include this to terminate script properly
}

<!-- JS -->

let ajaxurl = ajax_object.ajaxurl;

document.addEventListener('DOMContentLoaded', function() {
// Event listener for checkbox click
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
var originalProducts = ''; // String to store the original list of products

// Function to fetch and display products
function fetchAndDisplayProducts(categories) {
// AJAX request to filter products
var xhr = new XMLHttpRequest();
xhr.open('POST', ajaxurl); // WordPress AJAX handler
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.onload = function() {
if (xhr.status === 200) {
// Update product list with filtered products
document.getElementById('product-list-container').innerHTML = xhr.responseText;
} else {
console.error('Request failed. Status: ' + xhr.status);
}
};
xhr.onerror = function() {
console.error('Request failed');
};
xhr.send('action=filter_products&categories=' + encodeURIComponent(JSON.stringify(categories)));
}

// Function to reset products to original list
function resetProducts() {
document.getElementById('product-list-container').innerHTML = originalProducts;
}

// Fetch and store original list of products
originalProducts = document.getElementById('product-list-container').innerHTML;

// Event listener for checkbox change
checkboxes.forEach(function(checkbox) {
checkbox.addEventListener('change', function() {
var selectedCategories = []; // Array to store selected category names
// Loop through all checked checkboxes
checkboxes.forEach(function(checkbox) {
if (checkbox.checked) {
selectedCategories.push(checkbox.value); // Add category name to array
}
});

// If no categories are selected, reset products to original list
if (selectedCategories.length === 0) {
resetProducts();
} else {
// Fetch and display products based on selected categories
fetchAndDisplayProducts(selectedCategories);
}
});
});
});