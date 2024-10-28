<?php

get_header();

$postID = get_the_ID();

?>

<main class="contact-page">

    <section class="contact-page__banner">
        <div class="container">
            <div class="contact-page__banner-left">
                <header>
                    <h1>Contact <span class="display-one">us</span></h1>
                    <span class="intro-text">So we can work with you to find the right packaging solution for your
                        business.
                </header>

                <div class="contact-page__banner-left-details">
                    <div class="contact-page__banner-left-details-section">
                        <header>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/phone.svg"
                                alt="" class="" />
                            <h4>Phone</h4>
                        </header>
                        <a href="tel:0394281652">
                            <h5>(03) 9428 1652</h5>
                        </a>
                    </div>
                    <div class="contact-page__banner-left-details-section">
                        <header>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/mail.svg"
                                alt="" class="" />
                            <h4>Sales</h4>
                        </header>
                        <a href="mailto:sales@venuspack.com.au">
                            <h5>sales@venuspack.com.au</h5>
                        </a>
                    </div>
                    <div class="contact-page__banner-left-details-section">
                        <header>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/icons8-wrench-50.png"
                                alt="" class="" />
                            <h4>Servicing</h4>
                        </header>
                        <a href="mailto:service@venuspack.com.au">
                            <h5>service@venuspack.com.au</h5>
                        </a>
                    </div>
                    <div class="contact-page__banner-left-details-section">
                        <header>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/map-pin.svg"
                                alt="Location Icon" class="" />
                            <h4>Address</h4>
                        </header>
                        <a href="https://maps.app.goo.gl/73jEBQTMKKa5UhTP7">
                            <h5>555 Church Street, Richmond VIC Australia 3121</h4>
                        </a>
                    </div>
                </div>
            </div>
            <div class="contact-page__banner-right">
                <h4>Fill in the form and one of our team members will contact you.</h4>
                <?php echo do_shortcode('[gravityform id="1" title="false" ajax="true"]'); ?>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="contact-page__book">
            <div class="contact-page__book-card">
                <h3 class="display-two">Book a demo</h3>
                <p>Wondering how your product will look? Let’s make it easy. Book a demo here.</p>
                <div class="contact-page__book-card-meta">
                    <a href="/contact?type=distributor">
                        <button class="button orange">Contact us</button>
                    </a>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/arrow1.svg" />
                </div>
            </div>
            <div class="contact-page__book-card">
                <h3 class="display-two">Become a distributor</h3>
                <p>Generous discounts and product selling tools are some of the benefits offered to our distributor
                    network. </p>
                <div class="contact-page__book-card-meta">
                    <a href="/contact?type=distributor">
                        <button class="button orange">Contact us</button>
                    </a>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/arrow1.svg" />
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="contact-page__map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14616.772466940889!2d145.00910805112085!3d-37.831422125351644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad6428e9371605f%3A0xb1a57999401f76b!2sVenus%20Packaging!5e0!3m2!1sen!2sau!4v1714354409981!5m2!1sen!2sau"
                style="border:0; width: 100%; height: 600px; border-radius: 30px;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function getTypeFromUrl(url) {
        const queryParams = new URLSearchParams(new URL(url).search);
        return queryParams.get('type');
    }

    // Get the current URL
    const currentUrl = window.location.href;

    // Extract the value of the 'type' parameter from the URL
    const typeParam = getTypeFromUrl(currentUrl);

    console.log(typeParam);

    // Assuming you want to set the value of an input field with ID 'input_1_6'
    var field = document.getElementById("input_1_6");

    if (typeParam) {
        if (typeParam == 'distributor') {
            field.value = "Distributor/Wholesaler";
        }
    }
});
</script>

<?php get_footer(); ?>