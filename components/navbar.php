<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggedIn = isset($_SESSION["user_id"]);
$username = $_SESSION["username"] ?? "Traveler";

?>

<style>

.navbar {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 100;

    background: #061812;

    border-bottom: 1px solid rgba(255, 255, 255, 0.12);
}

.nav-container {
    max-width: 1400px;
    margin: auto;
    min-height: 76px;

    padding: 0 40px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 30px;
}

.logo {
    display: flex;
    align-items: center;

    gap: 10px;

    color: #fff;

    font-size: 19px;
    font-weight: 700;

    white-space: nowrap;

    text-decoration: none;
}

.logo-icon {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: linear-gradient(
        135deg,
        #f6a623,
        #d85c18
    );

    display: flex;
    align-items: center;
    justify-content: center;

    color: #fff;

    font-size: 22px;
}

.nav-menu {
    display: flex;
    align-items: center;

    gap: 27px;
}

.nav-menu a {
    color: rgba(255, 255, 255, 0.92);

    font-size: 14px;
    font-weight: 500;

    transition: 0.25s;

    text-decoration: none;
}

.nav-menu a:hover,
.nav-menu a.active {
    color: #ffad45;
}

.nav-account {
    display: flex;
    align-items: center;

    gap: 12px;
}

.welcome-user {
    color: #fff;

    font-size: 13px;
}

.login-btn {
    padding: 11px 23px;

    background: #e97621;

    color: #fff;

    border-radius: 6px;

    font-size: 14px;
    font-weight: 600;

    transition: 0.3s;

    text-decoration: none;
}

.login-btn:hover {
    background: #c95d0e;

    transform: translateY(-2px);
}

.logout-btn {
    background: #333;

    cursor: pointer;
}

.logout-btn:hover {
    background: #222;
}

.footer {
    padding-top: 55px;

    background: #121d24;

    color: #fff;
}

.footer-container {
    width: min(1200px, 90%);

    margin: 0 auto;

    display: grid;

    grid-template-columns:
        2fr 1fr 1fr 1fr;

    gap: 50px;

    padding-bottom: 45px;
}

.footer-logo {
    margin-bottom: 12px;

    color: #fff;

    font-size: 20px;
    font-weight: 700;
}

.footer-column p {
    max-width: 300px;

    color: #9ca7ac;

    font-size: 14px;

    line-height: 1.7;
}

.footer-column h3 {
    margin-bottom: 16px;

    color: #fff;

    font-size: 16px;
}

.footer-column a {
    display: block;

    margin-bottom: 10px;

    color: #9ca7ac;

    font-size: 13px;

    transition: color 0.2s ease;

    text-decoration: none;
}

.footer-column a:hover {
    color: #ffad4c;
}

.footer-bottom {
    padding: 20px;

    border-top:
        1px solid rgba(255, 255, 255, 0.1);

    color: #778289;

    font-size: 12px;

    text-align: center;
}

@media (max-width: 1100px) {

    .nav-menu {
        gap: 16px;
    }

    .nav-menu a {
        font-size: 13px;
    }

}

@media (max-width: 850px) {

    .nav-container {
        padding: 15px 25px;

        flex-wrap: wrap;
    }

    .nav-menu {
        order: 3;

        width: 100%;

        justify-content: center;

        flex-wrap: wrap;

        padding-bottom: 5px;
    }

}

@media (max-width: 600px) {

    .nav-container {
        padding: 12px 15px;

        gap: 15px;
    }

    .logo {
        font-size: 16px;
    }

    .logo-icon {
        width: 34px;
        height: 34px;

        font-size: 19px;
    }

    .nav-menu {
        gap: 12px;
    }

    .nav-menu a {
        font-size: 12px;
    }

    .welcome-user {
        display: none;
    }

    .login-btn {
        padding: 9px 16px;

        font-size: 12px;
    }

}

</style>


<nav class="navbar">

    <div class="nav-container">

        <!-- LOGO -->

        <a href="home.php" class="logo">

            <span class="logo-icon">
                <i class="fa-solid fa-plane"></i>
            </span>

            <span>
                My Travel Mate
            </span>

        </a>


        <!-- NAVIGATION -->

        <div class="nav-menu">

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

            <a href="Booking Form.php">
                Booking Form
            </a>

            <a href="Contact.php">
                Contact
            </a>

        </div>


        <!-- ACCOUNT -->

        <div class="nav-account">

            <?php if ($isLoggedIn): ?>

                <span class="welcome-user">
                    Welcome,
                    <?= htmlspecialchars(
                        $username,
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>
                </span>

                <!-- LOGOUT -->

                <a
                    href="logout.php"
                    class="login-btn logout-btn"
                >
                    Logout
                </a>

            <?php endif; ?>

        </div>

    </div>

</nav>