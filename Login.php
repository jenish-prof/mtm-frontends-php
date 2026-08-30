
<?php
session_start();

$message = "";
$activeTab = "login";

/* =========================================================
   AVATARS
========================================================= */

$avatars = [
    "male" => range(1, 5),
    "female" => range(1, 5)
];

/* =========================================================
   TEMPORARY REGISTERED USER
   Demo version - stores user information in session.
========================================================= */

$registeredUser = $_SESSION["registered_user"] ?? null;

/* =========================================================
   REDIRECT URL
========================================================= */

$redirect = $_GET["redirect"] ?? "home.php";

if (
    strpos($redirect, "://") !== false ||
    strpos($redirect, "//") === 0
) {
    $redirect = "home.php";
}

/* =========================================================
   FORM PROCESSING
========================================================= */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $type = $_POST["form_type"] ?? "";

    /* =====================================================
       LOGIN
    ===================================================== */

    if ($type === "login") {

        $activeTab = "login";

        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";

        $redirect = $_POST["redirect"] ?? "home.php";

        if (
            strpos($redirect, "://") !== false ||
            strpos($redirect, "//") === 0
        ) {
            $redirect = "home.php";
        }

        /* -------------------------------------------------
           EMPTY CHECK
        ------------------------------------------------- */

        if ($email === "" || $password === "") {

            $message = "
                <div class='alert error'>
                    Please enter email and password.
                </div>
            ";

        }

        /* -------------------------------------------------
           EMAIL FORMAT
        ------------------------------------------------- */

        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $message = "
                <div class='alert error'>
                    Please enter a valid email address.
                </div>
            ";

        }

        /* -------------------------------------------------
           GMAIL CHECK
        ------------------------------------------------- */

        elseif (!preg_match(
            '/^[a-zA-Z0-9._%+-]+@gmail\.com$/i',
            $email
        )) {

            $message = "
                <div class='alert error'>
                    Please use a valid Gmail address ending with @gmail.com.
                </div>
            ";

        }

        /* -------------------------------------------------
           PASSWORD LENGTH
        ------------------------------------------------- */

        elseif (strlen($password) < 6) {

            $message = "
                <div class='alert error'>
                    Password must be at least 6 characters.
                </div>
            ";

        }

        /* -------------------------------------------------
           CHECK REGISTERED USER
        ------------------------------------------------- */

        elseif (!$registeredUser) {

            $message = "
                <div class='alert error'>
                    No account found. Please register first.
                </div>
            ";

        }

        /* -------------------------------------------------
           CHECK EMAIL
        ------------------------------------------------- */

        elseif (
            strtolower($email) !==
            strtolower($registeredUser["email"])
        ) {

            $message = "
                <div class='alert error'>
                    Email address is not registered. Please use your registered Gmail.
                </div>
            ";

        }

        /* -------------------------------------------------
           CHECK PASSWORD
        ------------------------------------------------- */

        elseif (
            !password_verify(
                $password,
                $registeredUser["password"]
            )
        ) {

            $message = "
                <div class='alert error'>
                    Incorrect password. Please try again.
                </div>
            ";

        }

        /* -------------------------------------------------
           LOGIN SUCCESS
        ------------------------------------------------- */

        else {

            $_SESSION["user_id"] = time();

            $_SESSION["username"] =
                $registeredUser["username"];

            $_SESSION["email"] =
                $registeredUser["email"];

            $_SESSION["mobile"] =
                $registeredUser["mobile"];

            $_SESSION["gender"] =
                $registeredUser["gender"];

            $_SESSION["avatar"] =
                $registeredUser["avatar"];

            /* Login successful */

            header("Location: home.php");
            exit;
        }
    }

    /* =====================================================
       REGISTER
    ===================================================== */

    elseif ($type === "register") {

        $activeTab = "register";

        $username =
            trim($_POST["username"] ?? "");

        $email =
            trim($_POST["reg_email"] ?? "");

        $mobile =
            trim($_POST["mobile"] ?? "");

        $gender =
            $_POST["gender"] ?? "";

        $avatar =
            $_POST["avatar"] ?? "";

        $password =
            $_POST["reg_password"] ?? "";

        $redirect =
            $_POST["redirect"] ?? "home.php";

        if (
            strpos($redirect, "://") !== false ||
            strpos($redirect, "//") === 0
        ) {
            $redirect = "home.php";
        }

        /* -------------------------------------------------
           EMPTY CHECK
        ------------------------------------------------- */

        if (
            !$username ||
            !$email ||
            !$mobile ||
            !$gender ||
            !$avatar ||
            !$password
        ) {

            $message = "
                <div class='alert error'>
                    Please fill in all registration fields.
                </div>
            ";

        }

        /* -------------------------------------------------
           USERNAME
        ------------------------------------------------- */

        elseif (strlen($username) < 3) {

            $message = "
                <div class='alert error'>
                    Username must contain at least 3 characters.
                </div>
            ";

        }

        /* -------------------------------------------------
           EMAIL FORMAT
        ------------------------------------------------- */

        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $message = "
                <div class='alert error'>
                    Please enter a valid email address.
                </div>
            ";

        }

        /* -------------------------------------------------
           GMAIL CHECK
        ------------------------------------------------- */

        elseif (!preg_match(
            '/^[a-zA-Z0-9._%+-]+@gmail\.com$/i',
            $email
        )) {

            $message = "
                <div class='alert error'>
                    Please register using a valid Gmail address ending with @gmail.com.
                </div>
            ";

        }

        /* -------------------------------------------------
           PASSWORD
        ------------------------------------------------- */

        elseif (strlen($password) < 6) {

            $message = "
                <div class='alert error'>
                    Password must be at least 6 characters.
                </div>
            ";

        }

        /* -------------------------------------------------
           MOBILE
        ------------------------------------------------- */

        elseif (!preg_match('/^[0-9]{10}$/', $mobile)) {

            $message = "
                <div class='alert error'>
                    Mobile number must contain exactly 10 digits.
                </div>
            ";

        }

        /* -------------------------------------------------
           GENDER
        ------------------------------------------------- */

        elseif (!in_array(
            $gender,
            ["male", "female"],
            true
        )) {

            $message = "
                <div class='alert error'>
                    Please select a valid gender.
                </div>
            ";

        }

        /* -------------------------------------------------
           REGISTER SUCCESS
        ------------------------------------------------- */

        else {

            /*
               Store registered user temporarily.

               Password is hashed instead of storing
               plain text.
            */

            $_SESSION["registered_user"] = [

                "username" => $username,

                "email" => $email,

                "mobile" => $mobile,

                "gender" => $gender,

                "avatar" => $avatar,

                "password" => password_hash(
                    $password,
                    PASSWORD_DEFAULT
                )
            ];

            /*
               IMPORTANT:
               Do NOT create login session here.

               User must login after registration.
            */

            $message = "
                <div class='alert success'>
                    Registration successful! Please login with your Gmail and password.
                </div>
            ";

            /*
               Show login form after registration.
            */

            $activeTab = "login";
        }
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
        My Travel Mate - Login & Register
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
        href="css/Login.css"
    >

</head>

<body>

<?php if ($message): ?>

    <?= $message ?>

<?php endif; ?>

<?php include "components/navbar.php"; ?>


<div class="auth-container">

    <!-- =====================================================
         TRAVEL PANEL
    ====================================================== -->

    <div class="travel-panel">

        <div class="travel-content">

            <h1>Welcome</h1>

            <p class="subtitle">
                Login to continue your journey
            </p>

            <div class="benefit">

                <div class="benefit-icon">
                    <i class="fa-solid fa-star"></i>
                </div>

                <span>
                    Save your favorite places
                </span>

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    <i class="fa-solid fa-heart"></i>
                </div>

                <span>
                    Get personalized recommendations
                </span>

            </div>


            <div class="benefit">

                <div class="benefit-icon">
                    <i class="fa-solid fa-check"></i>
                </div>

                <span>
                    Book your trips easily
                </span>

            </div>

        </div>

    </div>


    <!-- =====================================================
         FORM PANEL
    ====================================================== -->

    <div class="form-panel">


        <!-- TABS -->

        <div class="tabs">

            <button
                type="button"
                class="tab <?= $activeTab === 'login' ? 'active' : '' ?>"
                id="loginTab"
                onclick="showLogin()"
            >
                Login
            </button>


            <button
                type="button"
                class="tab <?= $activeTab === 'register' ? 'active' : '' ?>"
                id="registerTab"
                onclick="showRegister()"
            >
                Register
            </button>

        </div>


        <!-- =================================================
             LOGIN FORM
        ================================================== -->

        <form
            method="POST"
            class="auth-form <?= $activeTab === 'login' ? 'active' : '' ?>"
            id="loginForm"
        >

            <input
                type="hidden"
                name="form_type"
                value="login"
            >

            <input
                type="hidden"
                name="redirect"
                value="<?= htmlspecialchars($redirect) ?>"
            >


            <h2 class="form-title">
                Login
            </h2>


            <!-- EMAIL -->

            <div class="input-group">

                <label>
                    Gmail Address
                </label>

                <div class="input-wrapper">

                    <span>
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your Gmail address"
                        pattern="[a-zA-Z0-9._%+-]+@gmail\.com"
                        title="Please enter a valid Gmail address"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="input-group">

                <label>
                    Password
                </label>

                <div class="input-wrapper password-wrapper">

                    <span>
                        <i class="fa-solid fa-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="password"
                        id="loginPassword"
                        placeholder="Enter your password"
                        minlength="6"
                        required
                    >

                    <i
                        class="fa-solid fa-eye password-toggle"
                        onclick="togglePassword('loginPassword', this)"
                    ></i>

                </div>

            </div>


            <!-- REMEMBER -->

            <div class="remember-row">

                <label>

                    <input
                        type="checkbox"
                        name="remember"
                    >

                    Remember me

                </label>

                <a
                    href="#"
                    class="forgot"
                >
                    Forgot Password?
                </a>

            </div>


            <!-- LOGIN BUTTON -->

            <button
                class="submit-btn"
                type="submit"
            >
                Login
            </button>


            <div class="or-divider">
                or continue with
            </div>


            <div class="social-buttons">

                <button
                    type="button"
                    class="social-btn google"
                >
                    G
                </button>

                <button
                    type="button"
                    class="social-btn facebook"
                >
                    f
                </button>

            </div>


            <div class="bottom-text">

                Don't have an account?

                <button
                    type="button"
                    onclick="showRegister()"
                >
                    Register now
                </button>

            </div>

        </form>


        <!-- =================================================
             REGISTER FORM
        ================================================== -->

        <form
            method="POST"
            class="auth-form <?= $activeTab === 'register' ? 'active' : '' ?>"
            id="registerForm"
        >

            <input
                type="hidden"
                name="form_type"
                value="register"
            >

            <input
                type="hidden"
                name="redirect"
                value="<?= htmlspecialchars($redirect) ?>"
            >


            <h2 class="form-title">
                Create Account
            </h2>


            <!-- USERNAME -->

            <div class="input-group">

                <label>
                    Username
                </label>

                <div class="input-wrapper">

                    <span>
                        <i class="fa-solid fa-user"></i>
                    </span>

                    <input
                        type="text"
                        name="username"
                        placeholder="Enter your username"
                        minlength="3"
                        required
                    >

                </div>

            </div>


            <!-- EMAIL -->

            <div class="input-group">

                <label>
                    Gmail Address
                </label>

                <div class="input-wrapper">

                    <span>
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <input
                        type="email"
                        name="reg_email"
                        placeholder="Enter your Gmail address"
                        pattern="[a-zA-Z0-9._%+-]+@gmail\.com"
                        title="Please enter a valid Gmail address"
                        required
                    >

                </div>

            </div>


            <!-- MOBILE -->

            <div class="input-group">

                <label>
                    Mobile Number
                </label>

                <div class="input-wrapper">

                    <span>
                        <i class="fa-solid fa-phone"></i>
                    </span>

                    <input
                        type="tel"
                        name="mobile"
                        placeholder="Enter 10 digit mobile number"
                        pattern="[0-9]{10}"
                        maxlength="10"
                        required
                    >

                </div>

            </div>


            <!-- GENDER -->

            <div class="gender-avatar-section">

                <label class="main-label">
                    Gender
                </label>

                <select
                    name="gender"
                    id="gender"
                    class="gender-select"
                    required
                >

                    <option value="">
                        Select Gender
                    </option>

                    <option value="male">
                        Male
                    </option>

                    <option value="female">
                        Female
                    </option>

                </select>

            </div>


            <!-- MALE AVATARS -->

            <div
                class="avatar-section"
                id="maleAvatarSection"
            >

                <label class="avatar-title">
                    Choose Your Avatar
                </label>

                <div class="avatar-grid">

                    <?php foreach ($avatars["male"] as $n): ?>

                        <label class="avatar-option">

                            <input
                                type="radio"
                                name="avatar"
                                value="male<?= $n ?>"
                            >

                            <img
                                src="images/male<?= $n ?>.jpg"
                                alt="Male Avatar <?= $n ?>"
                            >

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- FEMALE AVATARS -->

            <div
                class="avatar-section"
                id="femaleAvatarSection"
            >

                <label class="avatar-title">
                    Choose Your Avatar
                </label>

                <div class="avatar-grid">

                    <?php foreach ($avatars["female"] as $n): ?>

                        <label class="avatar-option">

                            <input
                                type="radio"
                                name="avatar"
                                value="female<?= $n ?>"
                            >

                            <img
                                src="images/female<?= $n ?>.jpg"
                                alt="Female Avatar <?= $n ?>"
                            >

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="input-group">

                <label>
                    Password
                </label>

                <div class="input-wrapper password-wrapper">

                    <span>
                        <i class="fa-solid fa-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="reg_password"
                        id="registerPassword"
                        placeholder="Create a password"
                        minlength="6"
                        required
                    >

                    <i
                        class="fa-solid fa-eye password-toggle"
                        onclick="togglePassword('registerPassword', this)"
                    ></i>

                </div>

            </div>


            <!-- REGISTER -->

            <button
                class="submit-btn"
                type="submit"
            >
                Create Account
            </button>


            <div class="bottom-text">

                Already have an account?

                <button
                    type="button"
                    onclick="showLogin()"
                >
                    Login now
                </button>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="footer">

    <div class="footer-container">

        <div class="footer-column">

            <h3>
                My Travel Mate
            </h3>

            <p>
                Explore amazing destinations, discover new places,
                and make every journey unforgettable.
            </p>

        </div>


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

        </div>


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


        <div class="footer-column">

            <h4>
                Follow Us
            </h4>

            <div class="footer-social">

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


    <div class="footer-bottom">

        © <?= date("Y") ?>
        My Travel Mate. All Rights Reserved.

    </div>

</footer>


<script>

/* =========================================================
   FORM ELEMENTS
========================================================= */

const loginForm =
    document.getElementById("loginForm");

const registerForm =
    document.getElementById("registerForm");

const loginTab =
    document.getElementById("loginTab");

const registerTab =
    document.getElementById("registerTab");

const gender =
    document.getElementById("gender");

const maleAvatar =
    document.getElementById("maleAvatarSection");

const femaleAvatar =
    document.getElementById("femaleAvatarSection");


/* =========================================================
   SHOW LOGIN
========================================================= */

function showLogin() {

    loginForm.classList.add("active");

    registerForm.classList.remove("active");

    loginTab.classList.add("active");

    registerTab.classList.remove("active");
}


/* =========================================================
   SHOW REGISTER
========================================================= */

function showRegister() {

    registerForm.classList.add("active");

    loginForm.classList.remove("active");

    registerTab.classList.add("active");

    loginTab.classList.remove("active");
}


/* =========================================================
   GENDER / AVATAR
========================================================= */

gender.addEventListener("change", function() {

    maleAvatar.classList.toggle(
        "show",
        this.value === "male"
    );

    femaleAvatar.classList.toggle(
        "show",
        this.value === "female"
    );

    document
        .querySelectorAll('[name="avatar"]')
        .forEach(input => {
            input.checked = false;
        });

});


/* =========================================================
   PASSWORD SHOW / HIDE
========================================================= */

function togglePassword(id, icon) {

    const input =
        document.getElementById(id);

    if (input.type === "password") {

        input.type = "text";

        icon.classList.replace(
            "fa-eye",
            "fa-eye-slash"
        );

    } else {

        input.type = "password";

        icon.classList.replace(
            "fa-eye-slash",
            "fa-eye"
        );
    }
}


/* =========================================================
   REGISTER VALIDATION
========================================================= */

registerForm.addEventListener(
    "submit",
    function(e) {

        if (!gender.value) {

            e.preventDefault();

            alert("Please select your gender.");

            gender.focus();

            return;
        }

        if (
            !document.querySelector(
                '[name="avatar"]:checked'
            )
        ) {

            e.preventDefault();

            alert("Please choose an avatar.");

            return;
        }

    }
);


/* =========================================================
   LOGIN GMAIL VALIDATION
========================================================= */

loginForm.addEventListener(
    "submit",
    function(e) {

        const email =
            loginForm
                .querySelector('input[name="email"]')
                .value
                .trim();

        const gmailPattern =
            /^[a-zA-Z0-9._%+-]+@gmail\.com$/i;

        if (!gmailPattern.test(email)) {

            e.preventDefault();

            alert(
                "Please enter a valid Gmail address ending with @gmail.com."
            );

            return;
        }

    }
);

</script>

</body>
</html>
