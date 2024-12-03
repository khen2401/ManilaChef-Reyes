<?php
session_start();
include('includes/header.php');
?>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php
                    if(isset($_SESSION['message']))
                    {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>    
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    } 
                ?>
            </div>
        </div>
    </div>

    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="./ManilaChefPic/1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    <h1 class="display-2 text-white mb-5 animated slideInRight"></h1>
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">One of the best
                                        food catering and events services
                                    </h1>
                                    <a href="reservation-form.php" class="btn btn-secondary btn-lg me-2">Reserve Now</a>
                                    <a href="calendar.php" class="btn btn-primary btn-lg">View Events</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="./ManilaChefPic/2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 text-start">
                                    
                                    <h1 class="display-1 text-white mb-5 animated slideInRight">Stands out as one of the best catering services.</h1>
                                    <a href="reservation-form.php" class="btn btn-secondary btn-lg me-2">Reserve Now</a>
                                    <a href="calendar.php" class="btn btn-primary btn-lg">View Events</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-6">
                    <div class="row g-2">
                        <div class="col-6 position-relative wow fadeIn" data-wow-delay="0.7s">
                            <div class="about-experience bg-secondary rounded">
                                <h1 class="display-1 mb-0">17</h1>
                                <small class="fs-5 fw-bold">Years Experience</small>
                            </div>
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded" src="./ManilaChefPic/service1.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                            <img class="img-fluid rounded" src="./ManilaChefPic/service2.jpg">
                        </div>
                        <div class="col-6 wow fadeIn" data-wow-delay="0.5s">
                            <img class="img-fluid rounded" src="./ManilaChefPic/service3.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title bg-white text-start text-primary pe-3">About Us</p>
                    <h1 class="mb-4">Know About Manila Chef Creative Cuisine Inc.</h1>
                    <p class="mb-4">Manila Chef Creative Cuisine Inc. is a well-regarded catering company based in the Philippines. They specialize in providing a wide array of catering solutions for various events, including weddings, corporate functions, and private parties. Known for their exceptional service and delicious food, Manila Chef Creative Cuisine Inc. Catering Services aims to make every event memorable by offering customized menus and creative culinary presentations.</p>
                    <div class="row g-5 pt-2 mb-5">
                    <div class="col-sm-6">
                        <img class="img-fluid mb-4" src="img/service.png" alt="">
                        <h5 class="mb-3">Dedicated Services</h5>
                        <span>Manila Chef Creative Cuisine Inc. Include catering for weddings, corporate events, private parties, and other special gatherings. They provide customized menus that can feature a range of cuisines, tailored to the client's preferences. Their offerings are characterized by high-quality ingredients, creative culinary presentations, and professional service.</span>
                    </div>
                    <div class="col-sm-6">
                        <img class="img-fluid mb-4" src="img/product.png" alt="">
                        <h5 class="mb-3">Healthy Foods</h5>
                        <span>Each dish is crafted with the finest ingredients to ensure a balanced and delightful dining experience. Choose Manila Chef Catering for healthy, flavorful meals at your next event.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-start text-primary pe-3">Why Us!</p>
                    <h1 class="mb-4">Few Reasons Why People Choosing Us!</h1>
                    <p class="mb-4">People choose Manila Chef Creative Cuisine Inc. for its delicious Filipino cuisine, convenient location, friendly service, and affordable prices.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Exceptional Quality: We use only the freshest, highest-quality ingredients to create delicious, memorable dishes.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Customized Menus: Tailor-made menus to fit your specific event needs and dietary preferences, ensuring a personalized culinary experience.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Professional Service: Our experienced chefs and dedicated staff provide impeccable service, ensuring your event runs smoothly.</p>
                    
                </div>
                <div class="col-lg-6">
                    <div class="rounded overflow-hidden">
                        <div class="row g-0">
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-primary py-5 px-10">
                                    <img class="img-fluid mb-4" src="./ManilaChefPic/foodsafety.png" alt="">
                                    <span class="fs-5 fw-semi-bold text-secondary">SAFETY IS OUR PRIORITY</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary py-5 px-15">
                                    <img class="img-fluid mb-4" src="./ManilaChefPic/extraordinaryservice.png" alt="">
                                    <span class="fs-5 fw-semi-bold text-primary">EXTRAORDINARY SERVICE</span>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-secondary" style="padding: 48px 15px;">
                                    <img class="img-fluid mb-4" src="./ManilaChefPic/deliciousfood.png" alt="">
                                    <span class="fs-5 fw-semi-bold text-primary">DELICIOUS FOOD</span>
                                </div>  
                            </div>
                            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
                                <div class="text-center bg-primary py-5 px-15">
                                    <img class="img-fluid mb-1" src="./ManilaChefPic/creativepresentation (2).png" alt="">
                                    <span class="fs-5 fw-semi-bold text-secondary">CREATIVE PRESENTATION</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->



    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Services</p>
                <h1 class="mb-5">Services That We Offer</h1>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="./ManilaChefPic/event.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="./ManilaChefPic/iconofevent.png" alt="">
                            </div>
                            <h5 class="mb-3">Event Catering</h4>
                            <p class="mb-4">Comprehensive catering services for weddings, corporate events, private parties, and other special occasions, tailored to meet the specific needs of each event.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="./ManilaChefPic/customizedmenuplanning.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="./ManilaChefPic/iconofcustomizedmenuplanning.png" alt="">
                            </div>
                            <h5 class="mb-3">Customized Menu Planning</h5>
                            <p class="mb-4">Personalized menu selection featuring a wide range of cuisines, accommodating dietary preferences and requirements to ensure a unique culinary experience.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="./ManilaChefPic/iconfullservice.jpg" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img class="img-fluid rounded-circle" src="./ManilaChefPic/iconoffullservicec.jpg" alt="">
                            </div>
                            <h5 class="mb-3">Full-Service Coordination</h5>
                            <p class="mb-4">Professional support including event planning, setup, and service, ensuring seamless execution and a memorable experience for all guests.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Service End -->


    <!-- Gallery Start -->
    <div class="container-xxl py-5 px-0">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Our Gallery</p>
                <h1 class="mb-5">Everlasting Memories</h1>
            </div>
            <div class="row g-0">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery1.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery1.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery2.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery2.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery3.png" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery3.png" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery5.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery5.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery7.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery7.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery10.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery10.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="row g-0">
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery9.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery9.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-12">
                            <a class="d-block" href="./ManilaChefPic/gallery4.jpg" data-lightbox="gallery">
                                <img class="img-fluid" src="./ManilaChefPic/gallery4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->
    <script>
        document.querySelectorAll('img').forEach(function(image) {
            image.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
            });
        });
    </script>

<?php
include('includes/footer.php')
?>    
