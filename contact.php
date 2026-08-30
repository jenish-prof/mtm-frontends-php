<?php
session_start();

$websiteName = "My Travel Mate";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us - <?php echo $websiteName; ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Poppins", sans-serif;
            background: #ffffff;
            color: #1d2925;
        }

        /* =========================
           CONTACT HERO
        ========================= */

        .contact-hero {
            min-height: 480px;

            display: flex;
            align-items: center;
            justify-content: center;

            text-align: center;

            padding: 100px 20px 70px;

            color: white;

            background:
                linear-gradient(
                    rgba(0, 0, 0, 0.65),
                    rgba(0, 0, 0, 0.45)
                ),
                url("https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=2000&q=85");

            background-size: cover;
            background-position: center;
        }

        .contact-hero-content {
            max-width: 800px;
        }

        .contact-hero small {
            color: #ff9a52;
            font-size: 13px;
            letter-spacing: 4px;
            font-weight: 600;
        }

        .contact-hero h1 {
            font-family: Georgia, serif;
            font-size: clamp(50px, 7vw, 85px);
            margin: 15px 0;
        }

        .contact-hero h1 span {
            color: #ff914d;
        }

        .contact-hero p {
            max-width: 650px;
            margin: auto;
            color: #eeeeee;
            line-height: 1.8;
            font-size: 16px;
        }


        /* =========================
           CONTACT SECTION
        ========================= */

        .contact-section {
            padding: 90px 7%;
            background: #ffffff;
        }

        .contact-container {
            max-width: 1200px;
            margin: auto;

            display: grid;
            grid-template-columns: 1fr 1.2fr;

            gap: 60px;
            align-items: start;
        }


        /* =========================
           CONTACT INFORMATION
        ========================= */

        .contact-info h2 {
            font-family: Georgia, serif;
            font-size: 45px;
            margin-bottom: 20px;
            color: #1d2925;
        }

        .contact-info h2 span {
            color: #e76f24;
        }

        .contact-info > p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .info-box {
            display: flex;
            align-items: center;
            gap: 18px;

            margin-bottom: 25px;
        }

        .info-icon {
            width: 55px;
            height: 55px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff1e8;
            color: #e76f24;

            border-radius: 50%;

            font-size: 20px;

            flex-shrink: 0;
        }

        .info-text h4 {
            font-size: 16px;
            margin-bottom: 3px;
        }

        .info-text p {
            color: #666;
            font-size: 14px;
        }


        /* =========================
           CONTACT FORM
        ========================= */

        .contact-form {
            background: #f8f8f6;

            padding: 40px;

            border-radius: 10px;

            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        }

        .contact-form h3 {
            font-family: Georgia, serif;
            font-size: 32px;
            margin-bottom: 25px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;

            padding: 14px 16px;

            border: 1px solid #ddd;

            border-radius: 5px;

            background: white;

            font-family: "Poppins", sans-serif;
            font-size: 14px;

            outline: none;

            transition: 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #e76f24;
            box-shadow: 0 0 0 3px rgba(231, 111, 36, 0.1);
        }

        .form-group textarea {
            height: 140px;
            resize: vertical;
        }

        .submit-btn {
            border: none;

            padding: 14px 28px;

            background: #e76f24;
            color: white;

            border-radius: 5px;

            font-family: "Poppins", sans-serif;
            font-size: 15px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #c95713;
            transform: translateY(-2px);
        }


        /* =========================
           SOCIAL MEDIA
        ========================= */

        .contact-social {
            margin-top: 35px;
        }

        .contact-social h4 {
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 12px;
        }

        .social-links a {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #1d2925;
            color: white;

            border-radius: 50%;

            text-decoration: none;

            transition: 0.3s;
        }

        .social-links a:hover {
            background: #e76f24;
            transform: translateY(-3px);
        }


        /* =========================
           MAP / TRAVEL MESSAGE
        ========================= */

        .travel-message {
            padding: 80px 7%;

            background: #1d2925;

            color: white;

            text-align: center;
        }

        .travel-message h2 {
            font-family: Georgia, serif;
            font-size: 45px;
            margin-bottom: 15px;
        }

        .travel-message h2 span {
            color: #ff914d;
        }

        .travel-message p {
            max-width: 650px;
            margin: auto;

            color: #cccccc;

            line-height: 1.8;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 850px) {

            .contact-container {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .contact-info h2 {
                font-size: 40px;
            }

            .contact-form {
                padding: 30px;
            }
        }

        @media (max-width: 600px) {

            .contact-hero {
                min-height: 420px;
                padding: 100px 6% 60px;
            }

            .contact-hero h1 {
                font-size: 48px;
            }

            .contact-section {
                padding: 65px 6%;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .contact-form {
                padding: 25px;
            }

            .contact-info h2 {
                font-size: 36px;
            }

            .travel-message {
                padding: 65px 6%;
            }

            .travel-message h2 {
                font-size: 36px;
            }
        }

    </style>

</head>

<body>

<?php include "components/navbar.php"; ?>


<!-- =========================
     CONTACT HERO
========================= -->

<section class="contact-hero">

    <div class="contact-hero-content">

        <small>GET IN TOUCH</small>

        <h1>
            Contact <span>Us</span>
        </h1>

        <p>
            Have a question, need help planning your trip,
            or simply want to say hello? We would love to
            hear from you.
        </p>

    </div>

</section>


<!-- ===========S==============
     CONTACT SECTION
========================= -->

<section class="contact-section">

    <div class="contact-container">


        <!-- CONTACT INFORMATION -->

        <div class="contact-info">

            <h2>
                Let's plan your
                <span>next journey.</span>
            </h2>

            <p>
                Whether you are looking for a peaceful holiday,
                an exciting adventure, or a cultural experience,
                My Travel Mate is here to help you.
            </p>


            <div class="info-box">

                <div class="info-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div class="info-text">

                    <h4>Our Location</h4>

                    <p>
                        Gujarat, India
                    </p>

                </div>

            </div>


            <div class="info-box">

                <div class="info-icon">
                    <i class="fa-solid fa-phone"></i>
                </div>

                <div class="info-text">

                    <h4>Phone Number</h4>

                    <p>
                        +91 9081530419
                    </p>

                </div>

            </div>


            <div class="info-box">

                <div class="info-icon">
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="info-text">

                    <h4>Email Address</h4>

                    <p>
                        info@mytravelmate.com
                    </p>

                </div>

            </div>


            <div class="info-box">

                <div class="info-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <div class="info-text">

                    <h4>Working Hours</h4>

                    <p>
                        Monday - Saturday : 9:00 AM - 6:00 PM
                    </p>

                </div>

            </div>


            <div class="contact-social">

                <h4>Follow Us</h4>

                <div class="social-links">

                    <a href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>

                    <a href="#">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                </div>

            </div>

        </div>


        <!-- CONTACT FORM -->

        <div class="contact-form">

            <h3>
                Send us a message
            </h3>

            <form action="#" method="POST">

                <div class="form-row">

                    <div class="form-group">

                        <label for="name">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                </div>


                <div class="form-group">

                    <label for="subject">
                        Subject
                    </label>

                    <input
                        type="text"
                        id="subject"
                        name="subject"
                        placeholder="Enter subject"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="message">
                        Message
                    </label>

                    <textarea
                        id="message"
                        name="message"
                        placeholder="Write your message..."
                        required
                    ></textarea>

                </div>


                <button
                    type="submit"
                    class="submit-btn"
                >
                    Send Message
                    <i class="fa-solid fa-paper-plane"></i>
                </button>

            </form>

        </div>

    </div>

</section>


<!-- =========================
     TRAVEL MESSAGE
========================= -->

<section class="travel-message">

    <h2>
        Your adventure starts
        <span>with us.</span>
    </h2>

    <p>
        Discover incredible destinations, create unforgettable
        memories and let My Travel Mate make your journey special.
    </p>

</section>


<?php include "components/footer.php"; ?>


</body>

</html>