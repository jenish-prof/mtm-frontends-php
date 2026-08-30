<?php

session_start();

$message = "";
$showPayment = false;
/* =========================================================
   LOGIN CHECK
========================================================= */

if (!isset($_SESSION['user_id'])) {

    $package = $_GET['package'] ?? 'Rajasthan Royal Tour';

    $loginUrl =
        "Login.php?redirect="
        . urlencode("Booking Form.php?package=" . $package);

    header("Location: " . $loginUrl);

    exit;
}

/* =========================================================
   PACKAGES DATA
========================================================= */

$packages = [

    [
        "title" => "Rajasthan Royal Tour",
        "location" => "Jaipur • Udaipur • Jodhpur",
        "duration" => "6 Nights / 7 Days",
        "price" => 18999,
        "category" => "Budget"
    ],

    [
        "title" => "Kerala Backwaters",
        "location" => "Alleppey • Munnar • Kochi",
        "duration" => "4 Nights / 5 Days",
        "price" => 15999,
        "category" => "Family"
    ],

    [
        "title" => "Himachal Adventure",
        "location" => "Manali • Shimla • Kasol",
        "duration" => "5 Nights / 6 Days",
        "price" => 16999,
        "category" => "Adventure"
    ],

    [
        "title" => "Golden Triangle Tour",
        "location" => "Delhi • Agra • Jaipur",
        "duration" => "5 Nights / 6 Days",
        "price" => 17999,
        "category" => "Pilgrimage"
    ],

    [
        "title" => "Goa Beach Escape",
        "location" => "North Goa • South Goa",
        "duration" => "3 Nights / 4 Days",
        "price" => 12999,
        "category" => "Budget"
    ],

    [
        "title" => "Kashmir Paradise",
        "location" => "Srinagar • Gulmarg • Pahalgam",
        "duration" => "5 Nights / 6 Days",
        "price" => 21999,
        "category" => "Honeymoon"
    ],

    [
        "title" => "Andaman Island Escape",
        "location" => "Port Blair • Havelock",
        "duration" => "4 Nights / 5 Days",
        "price" => 24999,
        "category" => "Family"
    ],

    [
        "title" => "Varanasi Spiritual Journey",
        "location" => "Varanasi • Sarnath",
        "duration" => "2 Nights / 3 Days",
        "price" => 9999,
        "category" => "Pilgrimage"
    ]

];

/* =========================================================
   DEFAULT PACKAGE
========================================================= */

$package = $_GET["package"] ?? "Rajasthan Royal Tour";
$price = 18999;

/* =========================================================
   FIND PACKAGE FROM GET
========================================================= */

foreach ($packages as $item) {

    if ($item["title"] === $package) {

        $price = $item["price"];

        break;
    }
}

/* =========================================================
   FORM VARIABLES
========================================================= */

$fullName = "";
$email = "";
$contact = "";
$travelDate = "";

/* =========================================================
   FORM PROCESSING
========================================================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $action = $_POST["action"] ?? "";

    /* =====================================================
       STEP 1 - BOOKING DETAILS
    ===================================================== */

    if ($action === "payment") {

        $package = trim($_POST["package"] ?? "");
        $fullName = trim($_POST["full_name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $contact = trim($_POST["contact"] ?? "");
        $travelDate = $_POST["travel_date"] ?? "";

        /* FIND SELECTED PACKAGE */

        $packageFound = false;

        foreach ($packages as $item) {

            if ($item["title"] === $package) {

                $price = (float)$item["price"];

                $packageFound = true;

                break;
            }
        }

        /* VALIDATION */

        if (
            $package === "" ||
            $fullName === "" ||
            $email === "" ||
            $contact === "" ||
            $travelDate === ""
        ) {

            $message = "Please fill in all booking details.";

        } elseif (!$packageFound) {

            $message = "Please select a valid package.";

        } elseif (strlen($fullName) < 3) {

            $message = "Please enter a valid full name.";

        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $message = "Please enter a valid email address.";

        } elseif (!preg_match("/^[0-9]{10}$/", $contact)) {

            $message = "Contact number must contain exactly 10 digits.";

        } elseif ($travelDate < date("Y-m-d")) {

            $message = "Please select a valid future travel date.";

        } else {

            $showPayment = true;
        }
    }

    /* =====================================================
       STEP 2 - PROCESS PAYMENT
    ===================================================== */

    if ($action === "process_payment") {

        $package = trim($_POST["package"] ?? "");
        $fullName = trim($_POST["full_name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $contact = trim($_POST["contact"] ?? "");
        $travelDate = $_POST["travel_date"] ?? "";

        /* GET REAL PACKAGE PRICE */

        $packageFound = false;

        foreach ($packages as $item) {

            if ($item["title"] === $package) {

                $price = (float)$item["price"];

                $packageFound = true;

                break;
            }
        }

        if (!$packageFound) {

            $message = "Invalid package selected.";

        } else {

            $tax = round($price * 0.05, 2);

            $fees = 199;

            $total = $price + $tax + $fees;

            /* SAVE BOOKING IN SESSION */

            $_SESSION["booking"] = [

                "package" => $package,

                "full_name" => $fullName,

                "email" => $email,

                "contact" => $contact,

                "travel_date" => $travelDate,

                "package_price" => $price,

                "tax" => $tax,

                "fees" => $fees,

                "total" => $total
            ];

            header("Location: Booking Form.php?success=1");

            exit;
        }
    }
}

/* =========================================================
   SUCCESS MESSAGE
========================================================= */

if (isset($_GET["success"])) {

    $message = "Booking details submitted successfully!";
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
        Booking Form | My Travel Mate
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

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
        href="css/Booking.css"
    >

</head>

<body>

<?php include "components/navbar.php"; ?>

<main class="booking-page">

    <div class="booking-wrapper">

        <!-- =================================================
             HEADER
        ================================================= -->

        <div class="booking-header">

            <span class="booking-icon">

                <i class="fa-solid fa-plane-departure"></i>

            </span>

            <h1>
                Book Your Trip
            </h1>

            <p>
                Select your package and complete your traveler details.
            </p>

        </div>

        <!-- =================================================
             MESSAGE
        ================================================= -->

        <?php if ($message): ?>

            <div
                class="message <?= isset($_GET["success"]) ? "success" : "error" ?>"
            >

                <i
                    class="fa-solid <?= isset($_GET["success"]) ? "fa-circle-check" : "fa-circle-exclamation" ?>"
                ></i>

                <?= htmlspecialchars($message) ?>

            </div>

        <?php endif; ?>

        <!-- =================================================
             BOOKING FORM
        ================================================= -->

        <?php if (!$showPayment && !isset($_GET["success"])): ?>

            <form
                method="POST"
                class="booking-card"
            >

                <input
                    type="hidden"
                    name="action"
                    value="payment"
                >

                <!-- =================================================
                     PACKAGE DETAILS
                ================================================= -->

                <div class="section-title">

                    <i class="fa-solid fa-suitcase-rolling"></i>

                    <h2>
                        Select Package
                    </h2>

                </div>

                <!-- PACKAGE SELECT -->

                <div class="input-group full">

                    <label for="package">
                        Choose Your Package
                    </label>

                    <div class="input-wrapper">

                        <!-- Location icon removed -->

                        <select
                            id="package"
                            name="package"
                            required
                        >

                            <option value="">
                                -- Select Package --
                            </option>

                            <?php foreach ($packages as $item): ?>

                                <option
                                    value="<?= htmlspecialchars($item["title"]) ?>"
                                    data-price="<?= htmlspecialchars($item["price"]) ?>"
                                    data-location="<?= htmlspecialchars($item["location"]) ?>"
                                    data-duration="<?= htmlspecialchars($item["duration"]) ?>"
                                    <?= ($package === $item["title"]) ? "selected" : "" ?>
                                >

                                    <?= htmlspecialchars($item["title"]) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <!-- PACKAGE INFORMATION -->

                <div
                    class="package-box"
                    id="packageInfo"
                >

                    <!-- Location icon removed -->

                    <div>

                        <span>
                            Selected Package
                        </span>

                        <strong id="selectedPackageName">

                            <?= htmlspecialchars($package) ?>

                        </strong>

                        <small id="selectedPackageInfo">

                            <?php

                            foreach ($packages as $item) {

                                if ($item["title"] === $package) {

                                    echo htmlspecialchars($item["location"])
                                        . " • "
                                        . htmlspecialchars($item["duration"]);

                                    break;
                                }
                            }

                            ?>

                        </small>

                    </div>

                </div>

                <!-- PACKAGE PRICE -->

                <div class="price-display">

                    <span>
                        Package Price
                    </span>

                    <strong id="packagePrice">

                        ₹<?= number_format($price, 2) ?>

                    </strong>

                </div>

                <!-- =================================================
                     TRAVELER DETAILS
                ================================================= -->

                <div class="section-title personal-title">

                    <i class="fa-solid fa-user"></i>

                    <h2>
                        Traveler Details
                    </h2>

                </div>

                <div class="form-grid">

                    <!-- FULL NAME -->

                    <div class="input-group full">

                        <label for="full_name">
                            Full Name
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                placeholder="Enter your full name"
                                value="<?= htmlspecialchars($fullName) ?>"
                                required
                            >

                        </div>

                    </div>

                    <!-- EMAIL -->

                    <div class="input-group">

                        <label for="email">
                            Email Address
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Enter your email"
                                value="<?= htmlspecialchars($email) ?>"
                                required
                            >

                        </div>

                    </div>

                    <!-- CONTACT -->

                    <div class="input-group">

                        <label for="contact">
                            Contact Number
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-phone"></i>

                            <input
                                type="tel"
                                id="contact"
                                name="contact"
                                placeholder="10 digit mobile number"
                                maxlength="10"
                                pattern="[0-9]{10}"
                                value="<?= htmlspecialchars($contact) ?>"
                                required
                            >

                        </div>

                    </div>

                    <!-- TRAVEL DATE -->

                    <div class="input-group full">

                        <label for="travel_date">
                            Travel Date
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-calendar-days"></i>

                            <input
                                type="date"
                                id="travel_date"
                                name="travel_date"
                                min="<?= date("Y-m-d") ?>"
                                value="<?= htmlspecialchars($travelDate) ?>"
                                required
                            >

                        </div>

                    </div>

                </div>

                <!-- CONTINUE -->

                <button
                    type="submit"
                    class="payment-btn"
                >

                    Continue to Payment

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

            </form>

        <?php elseif ($showPayment): ?>

            <!-- =================================================
                 PAYMENT SUMMARY
            ================================================= -->

            <?php

            $tax = round($price * 0.05, 2);

            $fees = 199;

            $total = $price + $tax + $fees;

            ?>

            <div class="payment-card">

                <div class="payment-header">

                    <div class="payment-icon">

                        <i class="fa-solid fa-credit-card"></i>

                    </div>

                    <div>

                        <h2>
                            Payment Summary
                        </h2>

                        <p>
                            Review your booking before payment.
                        </p>

                    </div>

                </div>

                <!-- BOOKING SUMMARY -->

                <div class="booking-summary">

                    <div class="summary-item">

                        <span>
                            Package
                        </span>

                        <strong>
                            <?= htmlspecialchars($package) ?>
                        </strong>

                    </div>

                    <div class="summary-item">

                        <span>
                            Traveler
                        </span>

                        <strong>
                            <?= htmlspecialchars($fullName) ?>
                        </strong>

                    </div>

                    <div class="summary-item">

                        <span>
                            Travel Date
                        </span>

                        <strong>

                            <?= htmlspecialchars(
                                date(
                                    "d M Y",
                                    strtotime($travelDate)
                                )
                            ) ?>

                        </strong>

                    </div>

                </div>

                <!-- AMOUNT -->

                <div class="amount-section">

                    <div class="amount-row">

                        <span>
                            Package Price
                        </span>

                        <span>
                            ₹<?= number_format($price, 2) ?>
                        </span>

                    </div>

                    <div class="amount-row">

                        <span>
                            Taxes (5%)
                        </span>

                        <span>
                            ₹<?= number_format($tax, 2) ?>
                        </span>

                    </div>

                    <div class="amount-row">

                        <span>
                            Booking & Service Fees
                        </span>

                        <span>
                            ₹<?= number_format($fees, 2) ?>
                        </span>

                    </div>

                    <div class="amount-total">

                        <span>
                            Total Amount
                        </span>

                        <strong>
                            ₹<?= number_format($total, 2) ?>
                        </strong>

                    </div>

                </div>

                <!-- PAYMENT -->

                <form method="POST">

                    <input
                        type="hidden"
                        name="action"
                        value="process_payment"
                    >

                    <input
                        type="hidden"
                        name="package"
                        value="<?= htmlspecialchars($package) ?>"
                    >

                    <input
                        type="hidden"
                        name="full_name"
                        value="<?= htmlspecialchars($fullName) ?>"
                    >

                    <input
                        type="hidden"
                        name="email"
                        value="<?= htmlspecialchars($email) ?>"
                    >

                    <input
                        type="hidden"
                        name="contact"
                        value="<?= htmlspecialchars($contact) ?>"
                    >

                    <input
                        type="hidden"
                        name="travel_date"
                        value="<?= htmlspecialchars($travelDate) ?>"
                    >

                    <button
                        type="submit"
                        class="pay-btn"
                    >

                        <i class="fa-solid fa-lock"></i>

                        Process to Pay
                        ₹<?= number_format($total, 2) ?>

                    </button>

                </form>

                <p class="secure-payment">

                    <i class="fa-solid fa-shield-halved"></i>

                    Secure payment • Your information is protected

                </p>

            </div>

        <?php endif; ?>

        <!-- =================================================
             SUCCESS
        ================================================= -->

        <?php if (isset($_GET["success"])): ?>

            <div class="success-card">

                <div class="success-icon">

                    <i class="fa-solid fa-check"></i>

                </div>

                <h2>
                    Booking Confirmed!
                </h2>

                <p>
                    Your booking details have been submitted successfully.
                </p>

                <?php if (isset($_SESSION["booking"])): ?>

                    <div class="confirmation-details">

                        <div>

                            <span>
                                Package
                            </span>

                            <strong>
                                <?= htmlspecialchars(
                                    $_SESSION["booking"]["package"]
                                ) ?>
                            </strong>

                        </div>

                        <div>

                            <span>
                                Traveler
                            </span>

                            <strong>
                                <?= htmlspecialchars(
                                    $_SESSION["booking"]["full_name"]
                                ) ?>
                            </strong>

                        </div>

                        <div>

                            <span>
                                Travel Date
                            </span>

                            <strong>

                                <?= htmlspecialchars(
                                    date(
                                        "d M Y",
                                        strtotime(
                                            $_SESSION["booking"]["travel_date"]
                                        )
                                    )
                                ) ?>

                            </strong>

                        </div>

                        <div>

                            <span>
                                Total Paid
                            </span>

                            <strong>
                                ₹<?= number_format(
                                    $_SESSION["booking"]["total"],
                                    2
                                ) ?>
                            </strong>

                        </div>

                    </div>

                <?php endif; ?>

                <a
                    href="home.php"
                    class="home-btn"
                >

                    <i class="fa-solid fa-house"></i>

                    Back to Home

                </a>

            </div>

        <?php endif; ?>

    </div>

</main>

<script>

/* =========================================================
   PACKAGE SELECT
========================================================= */

const packageSelect =
    document.getElementById("package");

const packagePrice =
    document.getElementById("packagePrice");

const selectedPackageName =
    document.getElementById("selectedPackageName");

const selectedPackageInfo =
    document.getElementById("selectedPackageInfo");

if (packageSelect) {

    packageSelect.addEventListener(
        "change",
        function () {

            const selectedOption =
                this.options[this.selectedIndex];

            if (!selectedOption.value) {

                selectedPackageName.textContent =
                    "Please select a package";

                selectedPackageInfo.textContent =
                    "";

                packagePrice.textContent =
                    "₹0.00";

                return;
            }

            const price =
                parseFloat(
                    selectedOption.dataset.price
                );

            const location =
                selectedOption.dataset.location;

            const duration =
                selectedOption.dataset.duration;

            selectedPackageName.textContent =
                selectedOption.value;

            selectedPackageInfo.textContent =
                location + " • " + duration;

            packagePrice.textContent =
                "₹" +
                price.toLocaleString(
                    "en-IN",
                    {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }
                );

        }
    );
}

/* =========================================================
   CONTACT NUMBER
========================================================= */

const contactInput =
    document.getElementById("contact");

if (contactInput) {

    contactInput.addEventListener(
        "input",
        function () {

            this.value =
                this.value.replace(/\D/g, "");

        }
    );

}

</script>

<?php include "components/footer.php"; ?>

</body>

</html>