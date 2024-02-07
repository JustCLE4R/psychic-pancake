<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futuristic Landing Page</title>
    <!-- Bootstrap CSS link -->
    <link href="bootstrap-5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for a futuristic look -->
    <style>
        body {
            background-color: #151515;
            color: #fff;
        }

        .navbar {
            background-color: #1c1c1c;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff;
        }

        .hero-section {
            background: linear-gradient(to bottom, #1c1c1c, #252525);
            padding: 100px 0;
            color: #fff;
        }

        .hero-section h1,
        .hero-section p {
            margin-bottom: 20px;
        }

        .hero-section a.btn-primary {
            background-color: #00bcd4;
            border-color: #00bcd4;
        }

        .features-section {
            background-color: #1c1c1c;
            padding: 80px 0;
            color: #fff;
        }

        .features-section h2 {
            color: #00bcd4;
            margin-bottom: 40px;
        }

        .features-section h3 {
            color: #00bcd4;
        }

        .features-section p {
            margin-bottom: 20px;
        }

        .contact-section {
            background: linear-gradient(to bottom, #1c1c1c, #252525);
            padding: 100px 0;
            color: #fff;
        }

        .contact-section h2 {
            color: #00bcd4;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Futuristic Brand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Discover the Future with Us</h1>
            <p class="lead">Revolutionary solutions for a connected world.</p>
            <a href="#" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </header>

    <!-- Features Section -->
    <section class="features-section text-center">
        <div class="container">
            <h2>Key Features</h2>
            <div class="row">
                <div class="col-lg-4">
                    <h3>Immersive Experience</h3>
                    <p>Engage with our cutting-edge technology for a truly immersive experience.</p>
                </div>
                <div class="col-lg-4">
                    <h3>Advanced Analytics</h3>
                    <p>Unlock insights with our advanced analytics tools and make informed decisions.</p>
                </div>
                <div class="col-lg-4">
                    <h3>Seamless Integration</h3>
                    <p>Integrate seamlessly with your existing systems and workflows for maximum efficiency.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section text-center">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Ready to shape the future together? Contact us now!</p>
            <a href="#" class="btn btn-primary btn-lg">Contact Now</a>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js scripts -->
    <script src="bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
