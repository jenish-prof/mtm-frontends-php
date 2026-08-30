
<?php

session_start();

/* =========================================================
   BLOG DATA
========================================================= */

$blogs = [

    [
        "title" => "Discover the Royal Beauty of Rajasthan",
        "category" => "Culture",
        "date" => "August 20, 2026",
        "image" => "https://images.unsplash.com/photo-1599661046289-e31897846e41?auto=format&fit=crop&w=900&q=80",
        "description" => "Explore magnificent forts, beautiful palaces, colorful markets and the royal culture of Rajasthan."
    ],

    [
        "title" => "A Peaceful Journey Through Kashmir",
        "category" => "Nature",
        "date" => "August 15, 2026",
        "image" => "https://images.unsplash.com/photo-1595815771614-ade9d652a65d?auto=format&fit=crop&w=900&q=80",
        "description" => "Experience the breathtaking mountains, peaceful lakes and unforgettable natural beauty of Kashmir."
    ],

    [
        "title" => "Explore the Beaches of Goa",
        "category" => "Adventure",
        "date" => "August 10, 2026",
        "image" => "https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?auto=format&fit=crop&w=900&q=80",
        "description" => "Discover beautiful beaches, exciting activities and amazing sunsets on your Goa adventure."
    ],

    [
        "title" => "Kerala: God's Own Country",
        "category" => "Travel",
        "date" => "August 05, 2026",
        "image" => "https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&w=900&q=80",
        "description" => "Enjoy Kerala's peaceful backwaters, green landscapes, traditional culture and delicious food."
    ],

    [
        "title" => "Adventure in the Himalayas",
        "category" => "Adventure",
        "date" => "July 28, 2026",
        "image" => "https://images.unsplash.com/photo-1544735716-392fe2489ffa?auto=format&fit=crop&w=900&q=80",
        "description" => "Take an unforgettable journey through the beautiful Himalayan mountains and valleys."
    ],

    [
        "title" => "The Golden Triangle Experience",
        "category" => "Culture",
        "date" => "July 20, 2026",
        "image" => "https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=900&q=80",
        "description" => "Visit Delhi, Agra and Jaipur and discover some of India's most famous historical attractions."
    ],

    [
        "title" => "Magical Mountains of Himachal Pradesh",
        "category" => "Nature",
        "date" => "July 15, 2026",
        "image" => "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&w=900&q=80",
        "description" => "Explore peaceful mountain towns, beautiful valleys and amazing Himalayan landscapes."
    ],

    [
        "title" => "Beautiful Backwaters of Kerala",
        "category" => "Travel",
        "date" => "July 10, 2026",
        "image" => "https://images.unsplash.com/photo-1593693397690-362cb9666fc2?auto=format&fit=crop&w=900&q=80",
        "description" => "Relax among Kerala's beautiful backwaters and experience traditional houseboat journeys."
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Travel Blog | My Travel Mate</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        rel="stylesheet"
        href="css/Blog.css"
    >

</head>

<body>

<!-- =========================================================
     NAVBAR
========================================================= -->

<?php include "components/navbar.php"; ?>


<!-- =========================================================
     BLOG HERO
========================================================= -->

<section class="blog-hero">

    <div class="hero-overlay">

        <div class="hero-content">

            <span class="hero-small">
                MY TRAVEL MATE
            </span>

            <h1>
                Travel Stories & Adventures
            </h1>

            <p>
                Discover inspiring destinations, travel tips,
                amazing experiences and unforgettable journeys.
            </p>

            <a href="#blogs" class="hero-btn">
                Explore Blogs
                <i class="fa-solid fa-arrow-down"></i>
            </a>

        </div>

    </div>

</section>


<!-- =========================================================
     VIDEO SECTION
========================================================= -->

<section class="video-section">

    <div class="section-heading">

        <span>
            TRAVEL VIDEO
        </span>

        <h2>
            Explore India With Us
        </h2>

        <p>
            Watch our travel video and get inspired
            for your next adventure.
        </p>

    </div>

    <div class="video-container">

        <iframe
            src="https://www.youtube.com/embed/Scxs7L0vhZ4"
            title="India Travel Video"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>

    </div>

</section>


<!-- =========================================================
     BLOG SECTION
========================================================= -->

<section class="blog-section" id="blogs">

    <div class="section-heading">

        <span>
            OUR BLOG
        </span>

        <h2>
            Latest Travel Stories
        </h2>

        <p>
            Read our latest stories and discover amazing places
            to add to your travel list.
        </p>

    </div>


    <!-- CATEGORY FILTER -->

    <div class="category-buttons">

        <button
            type="button"
            class="category-btn active"
            data-category="all"
        >
            All
        </button>

        <button
            type="button"
            class="category-btn"
            data-category="Travel"
        >
            Travel
        </button>

        <button
            type="button"
            class="category-btn"
            data-category="Adventure"
        >
            Adventure
        </button>

        <button
            type="button"
            class="category-btn"
            data-category="Nature"
        >
            Nature
        </button>

        <button
            type="button"
            class="category-btn"
            data-category="Culture"
        >
            Culture
        </button>

    </div>


    <!-- BLOG GRID -->

    <div class="blog-grid">

        <?php foreach ($blogs as $blog): ?>

            <article
                class="blog-card"
                data-category="<?= htmlspecialchars($blog["category"]) ?>"
            >

                <div class="blog-image">

                    <img
                        src="<?= htmlspecialchars($blog["image"]) ?>"
                        alt="<?= htmlspecialchars($blog["title"]) ?>"
                        loading="lazy"
                    >

                    <span class="blog-category">
                        <?= htmlspecialchars($blog["category"]) ?>
                    </span>

                </div>


                <div class="blog-content">

                    <div class="blog-date">

                        <i class="fa-regular fa-calendar"></i>

                        <?= htmlspecialchars($blog["date"]) ?>

                    </div>


                    <h3>
                        <?= htmlspecialchars($blog["title"]) ?>
                    </h3>


                    <p>
                        <?= htmlspecialchars($blog["description"]) ?>
                    </p>


                    <!-- READ MORE / GOOGLE SEARCH -->

                    <a
                        href="https://www.google.com/search?q=<?= urlencode($blog["title"] . " travel guide") ?>"
                        class="read-more"
                        target="_blank"
                        rel="noopener noreferrer"
                    >

                        Read More

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</section>


<!-- =========================================================
     TRAVEL QUOTE
========================================================= -->

<section class="travel-quote">

    <div class="quote-content">

        <i class="fa-solid fa-quote-left"></i>

        <h2>
            "The world is a book,
            and those who do not travel
            read only one page."
        </h2>

        <p>
            Start your journey and create your own story.
        </p>

        <a
            href="Package.php"
            class="quote-btn"
        >

            Explore Packages

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

</section>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

const categoryButtons =
    document.querySelectorAll(".category-btn");

const blogCards =
    document.querySelectorAll(".blog-card");


/* =========================================================
   CATEGORY FILTER
========================================================= */

categoryButtons.forEach(button => {

    button.addEventListener("click", function() {

        categoryButtons.forEach(btn => {

            btn.classList.remove("active");

        });

        this.classList.add("active");


        const selectedCategory =
            this.getAttribute("data-category");


        blogCards.forEach(card => {

            const cardCategory =
                card.getAttribute("data-category");


            if (
                selectedCategory === "all" ||
                cardCategory === selectedCategory
            ) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });

});

</script>
<?php include"components/footer.php" ?>

</body>

</html>
