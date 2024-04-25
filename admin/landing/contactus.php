<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | Baam GADGET</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="color.css">
  </head>
  <body id="top">

    <!-- Navbar -->
    <nav class="navbar py-3 navbar-expand-lg navbar-dark bg-dark" data-aos="fade-down" data-aos-delay="400">
        <div class="container">
            <img src="logo1.png" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav ms-auto">
    
                    <li class="nav-item">
                        <a class="nav-link" href="landing.php">Home</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="displaytrackingno.php">Trace</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus1.php">About Us</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact Us</a>
                    </li>
    
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contact -->
    <section id="contact" class="py-5">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row align-items-center mb-3" data-aos="fade-down" data-aos-delay="400">

                <!-- Col -->
                <div class="col-md-8">
                    <h6 class="text-primary">CONTACT</h6>
                    <h2 class="h3">Get in touch</h2>
                </div>

            </div>

            <!-- Row -->
            <div class="row">

                <!-- Col -->
                <div class="col-lg-6 d-grid" data-aos="fade-down" data-aos-delay="400">
                    <div class="d-grid">
                        <div class="border-custom p-4 d-flex">
                            <div class="icon"><i class="las la-phone"></i></div>
                            <div class="ms-3">
                                <h5>Phone</h5>
                                <p class="mb-0"><h4>017 - 4721403</h4></p>
                            </div>
                        </div>
                    </div>
                    <div class="border-custom p-4 d-flex">
                        <div class="icon"><i class="lar la-envelope"></i></div>
                        <div class="ms-3">
                            <h5>Email</h5>
                            <p class="mb-0"><h4>dnishshmim121@gmail.com</h4></p>
                        </div>
                    </div>
                    <div class="border-custom p-4 d-flex">
                        <div class="icon"><i class="las la-phone"></i></div>
                        <div class="ms-3">
                            <h5>Address</h5>
                            <p class="mb-0"><h4>K367, Jalan Stadium, Taman Stadium, 05100 Alor Setar, Kedah</h4></p>
                        </div>
                    </div>
                </div>

                <!-- Col -->
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="500">
                    <form action="contactusprogress.php" class="border-custom p-4" method="POST">
                        <div class="mb-3">
                            <label class="mb-2" for="name"><h5>Name</h5></label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="email"><h5>Email</h5></label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2" for="message"><h5>Message</h5></label>
                            <textarea rows="4" class="form-control" name="message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="add">Submit</button>
                    </form>
                </div>

            </div>

        </div>

    </section>

    <!-- Scroll to top -->
    <a href="#top" class="icon scroll-to-top"><i class="las la-arrow-up"></i></a>
    
    <script src="bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="app.js"></script>
  </body>
</html>