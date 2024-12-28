<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patna-Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.min.css" rel="stylesheet" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/swiper-bundle.min.css">

    <!-- style.css -->
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
    <link rel="stylesheet" href="{{asset('front/assets/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/style.css')}}">

</head>

<body>

    <header class="bg-dark text-white header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p class="head-para">Sanjay Gandhi Biological Park</p>
                </div>
                <div class="col-md-6 text-center">
                    <p class="head-para">
                        <i class="fa-solid fa-gauge"></i><span class="numerial-font-family">Opening times : 10am - 03:30pm(Last entry at 02:30pm)</span>
                    </p>
                </div>
                <div class="col-md-3">
                    <!-- <form class="form-group">
                          <input type="text" name="search" placeholder="Search..">
                       </form> -->
                </div>
            </div>
        </div>
    </header>

    <section class="heading">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#"><img src="{{asset('front/assets/img/main-logo.png')}}" class="img-fluid logo-img" alt=""></a>
                <button
                    data-mdb-collapse-init
                    class="navbar-toggler"
                    type="button"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse heading-radius" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                aria-expanded="false">
                                About Us
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="about.php">About</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Director's Message</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href=""> History</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Vision and Mission</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Rescue Team</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Visitor Info</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="">Events</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown position-static ">
                            <a data-mdb-dropdown-init class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-mdb-toggle="dropdown" aria-expanded="false">
                                Animals
                            </a>

                            <div class="dropdown-menu mega-menu w-50 mt-0">
                                <div class="container">
                                    <div class="row my-4">
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <div class="list-group list-group-flush">
                                                <p class="mb-0 list-group-item text-uppercase font-weight-bold font-awesome">
                                                    <b>Mammals</b>
                                                </p>
                                                <a href="" class="list-group-item list-group-item-action">Chimpanzee</a>
                                                <a href="" class="list-group-item list-group-item-action">Giraffe</a>
                                                <a href="" class="list-group-item list-group-item-action">Hippopotamus</a>
                                                <a href="" class="list-group-item list-group-item-action">Leopard</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                            <div class="list-group list-group-flush">
                                                <p class="mb-0 list-group-item  font-weight-bold">
                                                    <!-- Mammals --> <br>
                                                </p>

                                                <a href="lion.php" class="list-group-item list-group-item-action">Lion</a>
                                                <a href="" class="list-group-item list-group-item-action">Rhinoceros</a>
                                                <a href="" class="list-group-item list-group-item-action"> Tiger</a>
                                                <a href="" class="list-group-item list-group-item-action"> Zebra </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                                            <div class="list-group list-group-flush">
                                                <p class="mb-0 list-group-item text-uppercase font-weight-bold">
                                                    <b>Birds</b>
                                                </p>
                                                <a href="" class="list-group-item list-group-item-action">EMU</a>
                                                <a href="" class="list-group-item list-group-item-action">Ostrich</a>
                                                <a href="" class="list-group-item list-group-item-action">Parrot</a>
                                                <a href="" class="list-group-item list-group-item-action">Peacock</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="list-group list-group-flush">
                                                <p class="mb-0 list-group-item text-uppercase">
                                                    <b>Reptiles</b>
                                                </p>
                                                <a href="" class="list-group-item list-group-item-action">Gharial</a>
                                                <a href="" class="list-group-item list-group-item-action">crocodile</a>
                                                <a href="" class="list-group-item list-group-item-action">Snakes</a>
                                                <a href="" class="list-group-item list-group-item-action">Turtles</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                aria-expanded="false">
                                Amusmements
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="Green-House.php">Green House</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Herbal-Green.php">Herbal Green</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Rose-garden.php">Rose Garden</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Children-park.php">Children Park</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="lake.php">LAKE</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Toy-train.php">Toy Train</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="Tree-house.php">Tree House</a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                data-mdb-dropdown-init
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="navbarDropdownMenuLink"
                                role="button"
                                aria-expanded="false">
                                Facilities
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">Canteen</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Battery Base Auto</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/tender">Tender</a>
                        </li>


                    </ul>
                    <a href="/ticket-booking" class="btn btn-primary book-btn">Book Ticket</a>
                </div>
                <a class="navbar-brand" href="#"><img src="{{asset('front/assets/img/Bihar-Govt-Logo.png')}}" class="img-fluid logo-img1" alt=""></a>
            </nav>
        </div>
    </section>

    <!-- Background image -->
    <div class="bg-image1" style="height: 100px;"></div>