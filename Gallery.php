<?php

$gallery = [

    [
        "title" => "Himalayan Mountains",
        "category" => "Mountains",
        "location" => "Kashmir",
        "image" => "https://images.unsplash.com/photo-1500534623283-312aade485b7?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Beautiful Palace",
        "category" => "Heritage",
        "location" => "Rajasthan",
        "image" => "https://images.unsplash.com/photo-1477587458883-47145ed94245?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Mountain Lake",
        "category" => "Mountains",
        "location" => "Himachal Pradesh",
        "image" => "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Tropical Beach",
        "category" => "Beaches",
        "location" => "Goa",
        "image" => "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Kerala Backwaters",
        "category" => "Beaches",
        "location" => "Kerala",
        "image" => "https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Indian Tiger",
        "category" => "Wildlife",
        "location" => "Ranthambore",
        "image" => "https://images.unsplash.com/photo-1561731216-c3a4d99437d5?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Golden Temple",
        "category" => "Temples",
        "location" => "Amritsar",
        "image" => "https://images.unsplash.com/photo-1588096292148-8d2c6e2c7b1b?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Indian Palace",
        "category" => "Heritage",
        "location" => "Udaipur",
        "image" => "https://images.unsplash.com/photo-1514222134-b57cbb8ce073?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Mountain Valley",
        "category" => "Mountains",
        "location" => "Ladakh",
        "image" => "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Goa Sunset",
        "category" => "Beaches",
        "location" => "Goa",
        "image" => "https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Wildlife Safari",
        "category" => "Wildlife",
        "location" => "Rajasthan",
        "image" => "https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?auto=format&fit=crop&w=1200&q=85"
    ],

    [
        "title" => "Ancient Temple",
        "category" => "Temples",
        "location" => "South India",
        "image" => "https://images.unsplash.com/photo-1548013146-72479768bada?auto=format&fit=crop&w=1200&q=85"
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gallery | My Travel Mate</title>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Gallery CSS -->
    <link rel="stylesheet" href="css/Gallery.css">

</head>

<body>

    <?php include 'components/navbar.php'; ?>


    <!-- ==============================
     GALLERY HERO
================================ -->

    <section class="gallery-hero">

        <div class="hero-content">

            <div class="hero-small">
                TRAVEL • EXPLORE • REMEMBER
            </div>

            <h1>
                Travel<br>
                <span>Gallery</span>
            </h1>

            <p>
                Explore beautiful moments, breathtaking landscapes,
                incredible heritage and unforgettable experiences
                from across India.
            </p>

            <div class="breadcrumb">

                <a href="home.php">
                    Home
                </a>

                <span>›</span>

                <strong>
                    Gallery
                </strong>

            </div>

        </div>

    </section>


    <!-- ==============================
     GALLERY
================================ -->

    <section class="gallery-section">

        <div class="container">

            <div class="section-title">

                <small>
                    EXPLORE OUR JOURNEYS
                </small>

                <h2>
                    Beautiful Moments
                </h2>

                <p>
                    Discover inspiring destinations and memorable
                    travel moments captured across India.
                </p>

            </div>


            <!-- SEARCH AND FILTER -->

            <div class="gallery-tools">

                <div class="filters">

                    <button
                        class="filter-btn active"
                        data-category="All">
                        All
                    </button>

                    <button
                        class="filter-btn"
                        data-category="Mountains">
                        🏔 Mountains
                    </button>

                    <button
                        class="filter-btn"
                        data-category="Beaches">
                        🏖 Beaches
                    </button>

                    <button
                        class="filter-btn"
                        data-category="Heritage">
                        🏰 Heritage
                    </button>

                    <button
                        class="filter-btn"
                        data-category="Wildlife">
                        🐅 Wildlife
                    </button>

                    <button
                        class="filter-btn"
                        data-category="Temples">
                        🛕 Temples
                    </button>

                </div>


                <div class="search-box">

                    <input
                        type="text"
                        id="gallerySearch"
                        placeholder="Search gallery...">

                    <button type="button">

                        <i class="fa-solid fa-search"></i>

                    </button>

                </div>

            </div>


            <!-- GALLERY GRID -->

            <div
                class="gallery-grid"
                id="galleryGrid">

                <?php foreach ($gallery as $item): ?>

                    <article
                        class="gallery-card"
                        data-category="<?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?>"
                        data-title="<?= htmlspecialchars(strtolower($item['title']), ENT_QUOTES, 'UTF-8') ?>">

                        <img
                            src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>"
                            alt="<?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>"
                            loading="lazy">

                        <div class="gallery-overlay">

                            <div class="view-icon">

                                <i class="fa-solid fa-expand"></i>

                            </div>

                            <h3>
                                <?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?>
                            </h3>

                            <p>

                                <i class="fa-solid fa-location-dot"></i>

                                <?= htmlspecialchars($item['location'], ENT_QUOTES, 'UTF-8') ?>

                            </p>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>


            <!-- NO RESULTS -->

            <div
                class="no-results"
                id="noResults">

                <i class="fa-solid fa-image"></i>

                <h3>
                    No images found
                </h3>

                <p>
                    Try another category or search term.
                </p>

            </div>

        </div>

    </section>


    <!-- ==============================
     CTA
================================ -->

    <section class="gallery-cta">

        <small>
            YOUR NEXT ADVENTURE
        </small>

        <h2>
            Where will you go next?
        </h2>

        <p>
            Discover amazing destinations and start planning
            your next unforgettable journey.
        </p>

        <a
            href="destination.php"
            class="cta-btn">
            Explore Destinations →
        </a>

    </section>


    <?php include 'components/footer.php'; ?>


    <!-- ==============================
     LIGHTBOX
================================ -->

    <div
        class="lightbox"
        id="lightbox">

        <button
            class="close-lightbox"
            id="closeLightbox">
            ×
        </button>

        <img
            id="lightboxImage"
            src=""
            alt="Gallery Image">

    </div>


    <!-- ==============================
     JAVASCRIPT
================================ -->

    <script>
        const filterButtons =
            document.querySelectorAll(".filter-btn");

        const galleryCards =
            document.querySelectorAll(".gallery-card");

        const searchInput =
            document.getElementById("gallerySearch");

        const noResults =
            document.getElementById("noResults");

        let currentCategory = "All";


        function filterGallery() {

            const searchText =
                searchInput.value.toLowerCase().trim();

            let visible = 0;

            galleryCards.forEach(card => {

                const category =
                    card.dataset.category;

                const title =
                    card.dataset.title;

                const categoryMatch =
                    currentCategory === "All" ||
                    category === currentCategory;

                const searchMatch =
                    title.includes(searchText);

                if (categoryMatch && searchMatch) {

                    card.style.display = "block";

                    visible++;

                } else {

                    card.style.display = "none";

                }

            });

            noResults.style.display =
                visible === 0 ? "block" : "none";
        }


        filterButtons.forEach(button => {

            button.addEventListener("click", function() {

                filterButtons.forEach(btn => {

                    btn.classList.remove("active");

                });

                this.classList.add("active");

                currentCategory =
                    this.dataset.category;

                filterGallery();

            });

        });


        searchInput.addEventListener(
            "input",
            filterGallery
        );


        const lightbox =
            document.getElementById("lightbox");

        const lightboxImage =
            document.getElementById("lightboxImage");

        const closeLightbox =
            document.getElementById("closeLightbox");


        galleryCards.forEach(card => {

            card.addEventListener("click", function() {

                const image =
                    this.querySelector("img");

                lightboxImage.src =
                    image.src;

                lightbox.classList.add("show");

                document.body.style.overflow =
                    "hidden";

            });

        });


        function closeGalleryLightbox() {

            lightbox.classList.remove("show");

            document.body.style.overflow = "";

        }


        closeLightbox.addEventListener(
            "click",
            closeGalleryLightbox
        );


        lightbox.addEventListener(
            "click",
            function(e) {

                if (e.target === lightbox) {

                    closeGalleryLightbox();

                }

            }
        );


        document.addEventListener(
            "keydown",
            function(e) {

                if (e.key === "Escape") {

                    closeGalleryLightbox();

                }

            }
        );
    </script>

</body>

</html>