<?php

get_header();

$postId = get_the_ID();

?>

<main class="spare-page">

    <section class="spare-page__banner">
        <div class="spare-page__banner-overlay"></div>
        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Service-and-Spare-Parts-Team-scaled-_1_-min.jpg"
            alt="Spare Parts Venus - Banner Image" class="spare-page__banner-img" />
        <h1>Service & Spare Parts</h1>
    </section>

    <div class="container">
        <section class="spare-page__team">
            <div class="spare-page__team-left">
                <h2>The Venus Service Team</h2>
                <h4>
                    Our experienced and friendly Service Team provide pre and post sales service and repairs on all of
                    our packaging machines out of our Melbourne headquarters. For larger machines we provide customers
                    with on-site service.
                </h4>
                <p>Our technicians have a comprehensive and detailed technical knowledge of our packaging machines. They
                    can provide insights on how to run them to optimal capacity, helping with trouble-shooting over the
                    phone and in person.
                </p>
            </div>
            <div class="spare-page__team-right">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Service-Team-Group-2-e1464829845790-min.jpg"
                    alt=""
                    class="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Service-Team-Group-2-e1464829845790-min.jpg" />
            </div>
        </section>
    </div>

    <div class="container">
        <section class="spare-page__checkbox">
            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-background-industry.svg"
                alt="Venus Watermark" class="spare-page__checkbox-watermark" />
            <div class="spare-page__checkbox-left">
                <h4>
                    Our customer support and pre and post sales service includes:
                </h4>
                <div class="spare-page__checkbox-left-ticks">
                    <div class="spare-page__checkbox-left-ticks-content">
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/icons8-tick-30.png"
                            alt="Tick Icon">
                        <p>Packaging machine pre-servicing</p>
                    </div>
                    <div class="spare-page__checkbox-left-ticks-content">
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/icons8-tick-30.png"
                            alt="Tick Icon">
                        <p>
                            Pre and post-sales technical guidance
                        </p>
                    </div>
                    <div class="spare-page__checkbox-left-ticks-content">
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/icons8-tick-30.png"
                            alt="Tick Icon">
                        <p> Diagnosing packaging machine problems</p>
                    </div>
                    <div class="spare-page__checkbox-left-ticks-content">
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/icons8-tick-30.png"
                            alt="Tick Icon">
                        <p> Packaging machine repair</p>
                    </div>
                    <div class="spare-page__checkbox-left-ticks-content">
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/icons8-tick-30.png"
                            alt="Tick Icon">
                        <p>Packaging machine spare parts</p>
                    </div>
                </div>
                <a href="tel:0394281652"><button class="button orange">Call us: (03) 9428 1652</button></a>
            </div>
        </section>
    </div>

    <div class="container">
        <section class="spare-page__service">
            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Spare-parts.svg"
                alt="Venus - Watermark" class="spare-page__service-watermark" />
            <div class="spare-page__service-left">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/spare-parts.png"
                    alt="Photo of venus food wrap" />
            </div>
            <div class="spare-page__service-right">
                <span class="display-two">
                    Venus Spare Parts
                </span>
                <span class="intro-text"> The Service Team also stock a range of spare parts of recent and older
                    machines.
                    <br />
                    <br />
                    We always have in stock a broad range of spare parts for Venus brand heat sealers, shrink packaging
                    machines, pallet wrappers, Venhart strapping machines, and net clipping machines including circuit
                    boards, Teflon strips and heating elements.
                    Be sure to take note of your packaging machine name, and model number and to ensure the fastest
                    possible processing and despatch time.
                    <br />
                    <br />
                    Most spare parts can be shipped via overnight satchel
                    Call your sales representative or the Servicing team to place an order. </span>
                <footer>
                    <a href="tel:0394281652"><button class="button light-blue">Call us: (03) 9428 1652</button></a>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/arrow3.svg"
                        alt="Arrow Icon" />
                </footer>

            </div>
        </section>
    </div>

    <div class="container">
        <section class="spare-page__contact">
            <div class="spare-page__contact-left">
                <div class="spare-page__contact-left-content">
                    <h2>Call your sales representative or the Servicing team for help or fill out the form on this page.
                    </h2>
                    <a href="tel:0394281652"><button class="button orange">Call us: (03) 9428 1652</button></a>
                </div>
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Service-and-Spare-Parts-Team-scaled-_1_-min.jpg"
                    alt="Venus Packaging - Contact Image">
            </div>
            <div class="spare-page__contact-right">
                <h4>Fill in the form and one of our team members will contact you.</h4>
                <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
            </div>
        </section>
    </div>

</main>

<? get_footer(); ?>