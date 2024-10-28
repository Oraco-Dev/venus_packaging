<?php

$postId = $args['postId'];
$headColour = $args['headColour'];

?>

<?php
$accordionItemCount = 0; // Initialize the accordion item count

// Loop to check for existence of custom fields
while (get_post_meta($postId, 'accordiontitle' . ($accordionItemCount + 1), true)) {
    $accordionItemCount++;
}

for ($i = 1; $i <= $accordionItemCount; $i++) {
    $titleField = 'accordiontitle' . $i;
    $contentField = 'accordioncontent' . $i;

    $accordionTitle = get_post_meta($postId, $titleField, true);
$accordionContent = get_post_meta($postId, $contentField, true);
    ?>
<div class="accordion-item">
    <div class="accordion-item__head <?php echo $headColour ?>">
        <h4>
            <?php echo $accordionTitle; ?>
        </h4>
        <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/down.png" class="accordion-item__head-img" />
    </div>
    <div class="accordion-item__content <?php echo $headColour ?>">
        <p>
            <?php echo $accordionContent; ?>
        </p>
    </div>
</div>
<?php
}
?>