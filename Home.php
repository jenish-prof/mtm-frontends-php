<?php
session_start();

$websiteName = "My Travel Mate";

$places = [
    [
        "name" => "Kashmir",
        "description" => "Mountains, lakes and peaceful valleys.",
        "image" => "https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1000&q=80"
    ],
    [
        "name" => "Kerala",
        "description" => "Beautiful backwaters and tropical nature.",
        "image" => "https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&w=1000&q=80"
    ],
    [
        "name" => "Rajasthan",
        "description" => "Royal palaces, forts and colorful culture.",
        "image" => "https://images.unsplash.com/photo-1477587458883-47145ed94245?auto=format&fit=crop&w=1000&q=80"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $websiteName; ?></title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

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
            font-family: "Poppins", Arial, sans-serif;
            min-height: 100vh;
            background: #ffffff;
        }


        /* =========================================
           HERO
        ========================================= */

        .hero {
            height: 100vh;
            min-height: 650px;

            display: flex;
            align-items: center;

            padding-left: 9%;

            color: #ffffff;

            background:
                linear-gradient(
                    90deg,
                    rgba(0, 0, 0, 0.72),
                    rgba(0, 0, 0, 0.25)
                ),
                url("https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=2000&q=85");

            background-size: cover;
            background-position: center;
        }

        .hero-content {
            max-width: 650px;
        }

        .small-title {
            color: #ff9a52;

            letter-spacing: 4px;

            font-size: 12px;

            font-weight: 600;

            margin-bottom: 20px;
        }

        .hero h1 {
            font-family: Georgia, serif;

            font-size: clamp(55px, 8vw, 100px);

            line-height: 0.95;

            margin-bottom: 25px;
        }

        .hero h1 span {
            color: #ff914d;
        }

        .hero p {
            max-width: 550px;

            color: #dddddd;

            line-height: 1.8;

            margin-bottom: 30px;

            font-size: 16px;
        }


        /* =========================================
           BUTTON
        ========================================= */

        .btn {
            display: inline-block;

            padding: 15px 28px;

            background: #e76f24;

            color: #ffffff;

            text-decoration: none;

            border-radius: 4px;

            font-weight: 600;

            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #c95713;

            transform: translateY(-2px);
        }


        /* =========================================
           INTRO
        ========================================= */

        .intro {
            padding: 100px 9%;

            text-align: center;

            background: #ffffff;
        }

        .intro small {
            color: #e76f24;

            letter-spacing: 3px;

            font-weight: 600;
        }

        .intro h2 {
            font-family: Georgia, serif;

            font-size: 55px;

            margin: 15px 0;

            color: #1d2925;

            line-height: 1.15;
        }

        .intro p {
            max-width: 700px;

            margin: auto;

            color: #666666;

            line-height: 1.8;

            font-size: 16px;
        }


        /* =========================================
           DESTINATIONS
        ========================================= */

        .destinations {
            padding: 40px 7% 100px;

            background: #ffffff;
        }

        .heading {
            text-align: center;

            margin-bottom: 45px;
        }

        .heading small {
            color: #e76f24;

            letter-spacing: 3px;

            font-weight: 600;
        }

        .heading h2 {
            font-family: Georgia, serif;

            font-size: 50px;

            margin-top: 12px;

            color: #1d2925;
        }

        .cards {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;

            max-width: 1300px;

            margin: auto;
        }

        .card {
            height: 450px;

            position: relative;

            overflow: hidden;

            border-radius: 8px;

            color: #ffffff;

            background: #222222;
        }

        .card img {
            width: 100%;

            height: 100%;

            object-fit: cover;

            transition: transform 0.5s ease;
        }

        .card:hover img {
            transform: scale(1.08);
        }

        .card-content {
            position: absolute;

            left: 0;

            bottom: 0;

            width: 100%;

            padding: 30px;

            background:
                linear-gradient(
                    transparent,
                    rgba(0, 0, 0, 0.88)
                );
        }

        .card-content h3 {
            font-family: Georgia, serif;

            font-size: 35px;

            margin-bottom: 5px;
        }

        .card-content p {
            color: #dddddd;

            margin: 5px 0 15px;

            line-height: 1.5;
        }

        .card-content a {
            color: #ff9a52;

            text-decoration: none;

            font-weight: 600;

            transition: 0.3s;
        }

        .card-content a:hover {
            color: #ffffff;
        }


        /* =========================================
           CTA
        ========================================= */

        .cta {
            padding: 100px 8%;

            background: #1d2925;

            color: #ffffff;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 30px;
        }

        .cta h2 {
            font-family: Georgia, serif;

            font-size: 55px;

            line-height: 1.1;
        }

        .cta span {
            color: #ff914d;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 800px) {

            .hero {
                padding: 0 7%;

                min-height: 600px;
            }

            .hero h1 {
                font-size: 58px;
            }

            .hero p {
                font-size: 15px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .card {
                height: 420px;
            }

            .intro h2,
            .heading h2,
            .cta h2 {
                font-size: 42px;
            }

            .cta {
                flex-direction: column;

                align-items: flex-start;

                padding: 80px 8%;
            }
        }


        /* =========================================
           SMALL MOBILE
        ========================================= */

        @media (max-width: 500px) {

            .hero {
                min-height: 600px;

                padding: 0 6%;
            }

            .hero h1 {
                font-size: 48px;
            }

            .small-title {
                font-size: 10px;

                letter-spacing: 2px;
            }

            .intro {
                padding: 70px 6%;
            }

            .intro h2,
            .heading h2,
            .cta h2 {
                font-size: 36px;
            }

            .destinations {
                padding: 30px 6% 70px;
            }

            .card {
                height: 400px;
            }

            .card-content {
                padding: 25px;
            }

            .card-content h3 {
                font-size: 30px;
            }
        }

    </style>

</head>


<body>


<!-- =========================================
     NAVBAR
========================================= -->

<?php include "components/navbar.php"; ?>


<!-- =========================================
     HERO SECTION
========================================= -->

<section class="hero" id="home">

    <div class="hero-content">

        <div class="small-title">
            TRAVEL • CULTURE • ADVENTURE
        </div>

        <h1>
            Discover<br>
            <span>Incredible</span> India
        </h1>

        <p>
            Explore breathtaking landscapes, ancient heritage,
            colorful cultures and unforgettable experiences
            across India.
        </p>

        <a href="#destinations" class="btn">
            Explore Now →
        </a>

    </div>

</section>


<!-- =========================================
     INTRO SECTION
========================================= -->

<section class="intro" id="about">

    <small>
        EXPERIENCE INDIA
    </small>

    <h2>
        Every journey tells<br>
        a different story.
    </h2>

    <p>
        From the Himalayas to the Indian Ocean, India offers
        countless experiences for every kind of traveler.
        Discover places, people and traditions that make
        every journey special.
    </p>

</section>


<!-- =========================================
     DESTINATIONS SECTION
========================================= -->

<section class="destinations" id="destinations">

    <div class="heading">

        <small>
            POPULAR DESTINATIONS
        </small>

        <h2>
            Places to explore
        </h2>

    </div>


    <div class="cards">

        <?php foreach ($places as $place): ?>

            <div class="card">

                <img
                    src="<?php echo htmlspecialchars($place['image']); ?>"
                    alt="<?php echo htmlspecialchars($place['name']); ?>"
                >

                <div class="card-content">

                    <h3>
                        <?php echo htmlspecialchars($place['name']); ?>
                    </h3>

                    <p>
                        <?php echo htmlspecialchars($place['description']); ?>
                    </p>

                    <a href="#">
                        Explore →
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</section>


<!-- =========================================
     CTA SECTION
========================================= -->

<section class="cta" id="contact">

    <div>

        <h2>
            Your next<br>
            <span>adventure</span> starts here.
        </h2>

    </div>

    <a
        href="mailto:hello@example.com"
        class="btn"
    >
        Plan My Trip →
    </a>

</section>


<!-- =========================================
     FOOTER
========================================= -->

<?php include "components/footer.php"; ?>


</body>

</html>