<?php
/* =========================================================
   MY TRAVEL MATE - FOOTER
========================================================= */
?>

<style>

    /* =========================================
       FOOTER
    ========================================= */

    .footer {
        width: 100%;
        background: #111816;
        color: #ffffff;
        font-family: "Poppins", Arial, sans-serif;
        margin-top: 60px;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;

        padding: 60px 30px 45px;

        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1.4fr;

        gap: 50px;
    }


    /* =========================================
       FOOTER COLUMNS
    ========================================= */

    .footer-column h3 {
        color: #ffffff;
        font-size: 24px;
        font-weight: 700;

        margin: 0 0 18px;
    }

    .footer-column h4 {
        color: #ff914d;
        font-size: 17px;
        font-weight: 600;

        margin: 0 0 20px;
    }

    .footer-column p {
        color: #b8c0bd;
        font-size: 14px;

        line-height: 1.8;

        margin: 0 0 10px;
    }


    /* =========================================
       ABOUT SECTION
    ========================================= */

    .footer-about {
        max-width: 350px;
    }

    .footer-about p {
        line-height: 1.8;
    }


    /* =========================================
       FOOTER LINKS
    ========================================= */

    .footer-column a {
        display: block;

        color: #b8c0bd;

        text-decoration: none;

        font-size: 14px;

        margin-bottom: 12px;

        transition: all 0.3s ease;
    }

    .footer-column a:hover {
        color: #ff914d;

        padding-left: 5px;
    }


    /* =========================================
       CONTACT ICONS
    ========================================= */

    .footer-column p i {
        color: #ff914d;

        width: 22px;

        margin-right: 5px;
    }


    /* =========================================
       SOCIAL ICONS
    ========================================= */

    .footer-social {
        display: flex;

        align-items: center;

        gap: 10px;

        margin-top: 22px;
    }

    .footer-social a {
        width: 38px;
        height: 38px;

        display: flex;

        align-items: center;
        justify-content: center;

        background: #24332e;

        color: #ffffff;

        border-radius: 50%;

        padding: 0;

        margin: 0;

        transition: all 0.3s ease;
    }

    .footer-social a:hover {
        background: #e76f24;

        color: #ffffff;

        transform: translateY(-3px);
    }


    /* =========================================
       FOOTER BOTTOM
    ========================================= */

    .footer-bottom {
        max-width: 1200px;

        margin: 0 auto;

        padding: 20px 30px;

        border-top: 1px solid rgba(255, 255, 255, 0.1);

        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 20px;
    }

    .footer-bottom p {
        margin: 0;

        color: #89938f;

        font-size: 13px;
    }

    .footer-bottom strong {
        color: #ff914d;
    }


    /* =========================================
       TABLET
    ========================================= */

    @media (max-width: 900px) {

        .footer-container {
            grid-template-columns: repeat(2, 1fr);

            gap: 40px;
        }

    }


    /* =========================================
       MOBILE
    ========================================= */

    @media (max-width: 600px) {

        .footer-container {
            grid-template-columns: 1fr;

            padding: 45px 25px 30px;

            gap: 30px;
        }

        .footer-about {
            max-width: 100%;
        }

        .footer-bottom {
            flex-direction: column;

            text-align: center;

            padding: 20px;
        }

    }

</style>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="footer">

    <div class="footer-container">


        <!-- ABOUT -->
        <div class="footer-column footer-about">

            <h3>
                ✦ My Travel Mate
            </h3>

            <p>
                Explore amazing destinations, discover new places,
                and make every journey unforgettable.
            </p>


            <!-- SOCIAL MEDIA -->

            <div class="footer-social">

                <a href="#" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#" aria-label="Twitter">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>

                <a href="#" aria-label="YouTube">
                    <i class="fa-brands fa-youtube"></i>
                </a>

            </div>

        </div>


        <!-- QUICK LINKS -->

        <div class="footer-column">

            <h4>
                Quick Links
            </h4>

            <a href="home.php">
                Home
            </a>

            <a href="Package.php">
                Packages
            </a>

            <a href="Gallery.php">
                Gallery
            </a>

            <a href="Blog.php">
                Blog
            </a>

        </div>


        <!-- INFORMATION -->

        <div class="footer-column">

            <h4>
                Information
            </h4>

            <a href="Booking Form.php">
                Booking Form
            </a>

            <a href="Contact.php">
                Contact Us
            </a>

            <a href="#">
                Privacy Policy
            </a>

            <a href="#">
                Terms & Conditions
            </a>

        </div>


        <!-- CONTACT -->

        <div class="footer-column">

            <h4>
                Contact Us
            </h4>

            <p>
                <i class="fa-solid fa-location-dot"></i>
                India
            </p>

            <p>
                <i class="fa-solid fa-envelope"></i>
                info@mytravelmate.com
            </p>

            <p>
                <i class="fa-solid fa-phone"></i>
                +91 90815 30419
            </p>

        </div>

    </div>


    <!-- FOOTER BOTTOM -->

    <div class="footer-bottom">

        <p>
            © <?php echo date("Y"); ?>

            <strong>
                My Travel Mate
            </strong>

            . All Rights Reserved.
        </p>

        <p>
            Discover • Experience • Remember
        </p>

    </div>

</footer>