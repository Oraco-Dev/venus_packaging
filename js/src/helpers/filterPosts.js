let selectedCategories = [];

export function filterPosts(category) {
  var index = selectedCategories.indexOf(category);

  if (index === -1) {
    // Add category to the array if not already present
    selectedCategories.push(category);
  } else {
    // Remove category from the array if already present
    selectedCategories.splice(index, 1);
  }

  // Get all the posts on the page
  let posts = document.getElementsByClassName("blog-card");

  // Iterate through the posts and show/hide based on the selected categories
  for (var i = 0; i < posts.length; i++) {
    let post = posts[i];
    // access the 'data-category attribute assigned to html element in JSON'
    let postCategories = JSON.parse(post.getAttribute("data-category"));

    // Show all posts if no categories selected or 'all' category is selected
    if (selectedCategories.length === 0 || selectedCategories.includes("all")) {
      post.style.display = "block";
    } else {
      // Check if post categories match any of the selected categories
      let postIncludesCategory = postCategories.some((category) =>
        selectedCategories.includes(category)
      );

      if (postIncludesCategory) {
        post.style.display = "block";
      } else {
        post.style.display = "none";
      }
    }
  }
}
