
<?php

session_start();

$isLoggedIn = isset($_SESSION['user_id']);
$username = $_SESSION['username'] ?? 'Traveler';

/* =========================================================
   PACKAGES DATA
========================================================= */

$packages = [

    [
        "title" => "Rajasthan Royal Tour",
        "location" => "Jaipur • Udaipur • Jodhpur",
        "duration" => "6 Nights / 7 Days",
        "price" => "18999",
        "category" => "Budget",
        "image" => "https://images.unsplash.com/photo-1477587458883-47145ed94245?auto=format&fit=crop&w=1200&q=80",
        "description" => "Explore royal palaces, forts, colorful markets and the rich culture of Rajasthan."
    ],

    [
        "title" => "Kerala Backwaters",
        "location" => "Alleppey • Munnar • Kochi",
        "duration" => "4 Nights / 5 Days",
        "price" => "15999",
        "category" => "Family",
        "image" => "https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?auto=format&fit=crop&w=1200&q=80",
        "description" => "Relax among peaceful backwaters, green hills, beaches and beautiful Kerala villages."
    ],

    [
        "title" => "Himachal Adventure",
        "location" => "Manali • Shimla • Kasol",
        "duration" => "5 Nights / 6 Days",
        "price" => "16999",
        "category" => "Adventure",
        "image" => "images/Himachal Adventure.png",
        "description" => "Enjoy mountains, valleys, adventure activities and breathtaking Himalayan views."
    ],

    [
        "title" => "Golden Triangle Tour",
        "location" => "Delhi • Agra • Jaipur",
        "duration" => "5 Nights / 6 Days",
        "price" => "17999",
        "category" => "Pilgrimage",
        "image" => "https://images.unsplash.com/photo-1564507592333-c60657eea523?auto=format&fit=crop&w=1200&q=80",
        "description" => "Discover India's famous Golden Triangle with historical monuments and cultural experiences."
    ],

    [
        "title" => "Goa Beach Escape",
        "location" => "North Goa • South Goa",
        "duration" => "3 Nights / 4 Days",
        "price" => "12999",
        "category" => "Budget",
        "image" => "https://images.unsplash.com/photo-1512343879784-a960bf40e7f2?auto=format&fit=crop&w=1200&q=80",
        "description" => "Enjoy beautiful beaches, sunsets, local food and a relaxing coastal holiday."
    ],

    [
        "title" => "Kashmir Paradise",
        "location" => "Srinagar • Gulmarg • Pahalgam",
        "duration" => "5 Nights / 6 Days",
        "price" => "21999",
        "category" => "Honeymoon",
        "image" => "images/Kashmir Paradise.jpg",
        "description" => "Experience beautiful valleys, lakes, mountains and unforgettable Kashmir scenery."
    ],

    [
        "title" => "Andaman Island Escape",
        "location" => "Port Blair • Havelock",
        "duration" => "4 Nights / 5 Days",
        "price" => "24999",
        "category" => "Family",
        "image" => "https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80",
        "description" => "Enjoy crystal-clear water, peaceful beaches, island adventures and tropical nature."
    ],

    [
        "title" => "Varanasi Spiritual Journey",
        "location" => "Varanasi • Sarnath",
        "duration" => "2 Nights / 3 Days",
        "price" => "9999",
        "category" => "Pilgrimage",
        "image" => "https://images.unsplash.com/photo-1561361058-c24cecae35ca?auto=format&fit=crop&w=1200&q=80",
        "description" => "Experience the spiritual atmosphere, ancient ghats and cultural heritage of Varanasi."
    ]

];

/* =========================================================
   CATEGORY FILTER
========================================================= */

$selectedCategory = $_GET['category'] ?? 'All';

$allowedCategories = [
    'All',
    'Budget',
    'Family',
    'Honeymoon',
    'Adventure',
    'Pilgrimage'
];

if (!in_array($selectedCategory, $allowedCategories, true)) {
    $selectedCategory = 'All';
}

$filteredPackages = [];

foreach ($packages as $package) {

    if (
        $selectedCategory === 'All' ||
        $package['category'] === $selectedCategory
    ) {

        $filteredPackages[] = $package;
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Packages | My Travel Mate
    </title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <link
        rel="stylesheet"
        href="css/Package.css"
    >

</head>

<body>

<?php include "components/navbar.php"; ?>

<!-- =========================================================
     PACKAGE HERO
========================================================= -->

<section class="package-hero">

    <div class="package-hero-overlay"></div>

    <div class="package-hero-content">

        <span class="hero-small-title">
            EXPLORE WITH MY TRAVEL MATE
        </span>

        <h1>
            Discover Perfect Tour Packages
        </h1>

        <p>
            Choose from our carefully designed travel packages
            and make your next journey unforgettable.
        </p>

        <div class="breadcrumb">

            <a href="home.php">
                Home
            </a>

            <span>›</span>

            <strong>
                Packages
            </strong>

        </div>

    </div>

</section>

<!-- =========================================================
     PACKAGES
========================================================= -->

<main class="packages-page">

    <div class="page-container">

        <!-- CATEGORY FILTER -->

        <section class="category-section">

            <div class="category-buttons">

                <a
                    href="Packages.php"
                    class="category-btn <?= ($selectedCategory === 'All') ? 'selected' : '' ?>"
                >
                    All Packages
                </a>

                <a
                    href="Packages.php?category=Budget"
                    class="category-btn <?= ($selectedCategory === 'Budget') ? 'selected' : '' ?>"
                >
                    Budget
                </a>

                <a
                    href="Packages.php?category=Family"
                    class="category-btn <?= ($selectedCategory === 'Family') ? 'selected' : '' ?>"
                >
                    Family
                </a>

                <a
                    href="Packages.php?category=Honeymoon"
                    class="category-btn <?= ($selectedCategory === 'Honeymoon') ? 'selected' : '' ?>"
                >
                    Honeymoon
                </a>

                <a
                    href="Packages.php?category=Adventure"
                    class="category-btn <?= ($selectedCategory === 'Adventure') ? 'selected' : '' ?>"
                >
                    Adventure
                </a>

                <a
                    href="Packages.php?category=Pilgrimage"
                    class="category-btn <?= ($selectedCategory === 'Pilgrimage') ? 'selected' : '' ?>"
                >
                    Pilgrimage
                </a>

            </div>

        </section>

        <!-- =================================================
             PACKAGE CARDS
        ================================================= -->

        <section class="packages-container">

            <?php if (!empty($filteredPackages)): ?>

                <?php foreach ($filteredPackages as $package): ?>

                    <article class="package-card">

                        <!-- IMAGE -->

                        <div class="package-image">

                            <img
                                src="<?= htmlspecialchars($package['image']) ?>"
                                alt="<?= htmlspecialchars($package['title']) ?>"
                                loading="lazy"
                            >

                            <span class="package-category">

                                <?= htmlspecialchars($package['category']) ?>

                            </span>

                        </div>

                        <!-- CONTENT -->

                        <div class="package-content">

                            <h2>
                                <?= htmlspecialchars($package['title']) ?>
                            </h2>

                            <div class="package-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <?= htmlspecialchars($package['location']) ?>

                            </div>

                            <div class="package-duration">

                                <i class="fa-regular fa-calendar"></i>

                                <?= htmlspecialchars($package['duration']) ?>

                            </div>

                            <p class="package-description">

                                <?= htmlspecialchars($package['description']) ?>

                            </p>

                            <!-- BOTTOM -->

                            <div class="package-bottom">

                                <div class="price">

                                    <span>
                                        Starting from
                                    </span>

                                    <strong>
                                        ₹<?= number_format((float)$package['price']) ?>
                                    </strong>

                                </div>

                                <!-- BOOK NOW -->

                                <?php

                                if ($isLoggedIn) {

                                    /*
                                     * User is already logged in.
                                     * Directly open Booking Form.
                                     */

                                    $bookingUrl =
                                        "Booking Form.php?package="
                                        . urlencode($package['title']);

                                } else {

                                    /*
                                     * User is not logged in.
                                     * First open Login.php.
                                     * After successful login, return to Booking Form.
                                     */

                                    $returnUrl =
                                        "Booking Form.php?package="
                                        . urlencode($package['title']);

                                    $bookingUrl =
                                        "Login.php?redirect="
                                        . urlencode($returnUrl);
                                }

                                ?>

                                <a
                                    href="<?= htmlspecialchars($bookingUrl) ?>"
                                    class="details-btn book-btn"
                                >

                                    <?php if ($isLoggedIn): ?>

                                        Book Now

                                    <?php else: ?>

                                        Login to Book

                                    <?php endif; ?>

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="no-packages">

                    <i class="fa-solid fa-map-location-dot"></i>

                    <h2>
                        No Packages Found
                    </h2>

                    <p>
                        Please choose another package category.
                    </p>

                    <a
                        href="Packages.php"
                        class="reset-btn"
                    >
                        View All Packages
                    </a>

                </div>

            <?php endif; ?>

        </section>

    </div>

</main>

<!-- =========================================================
     CUSTOM PACKAGE
========================================================= -->

<section class="custom-package">

    <div class="custom-content">

        <span>
            CUSTOM TRAVEL
        </span>

        <h2>
            Want a Customized Trip?
        </h2>

        <p>
            Create your own travel experience with a personalized
            itinerary designed especially for you.
        </p>

        <a
            href="Contact.php"
            class="custom-btn"
        >

            Plan My Trip

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

    <div class="custom-icon">

        <i class="fa-solid fa-map-location-dot"></i>

    </div>

</section>

<?php include "components/footer.php"; ?>

</body>

</html>
