<?php
session_start();
include('includes/header.php');
?>

<div class="container">
    <h1 class="text-center mb-5">Events Showcase</h1>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="ManilaChefPic/wedding.jpg" class="card-img-top" alt="Wedding">
                <div class="card-body">
                    <h5 class="card-title">Wedding</h5>
                    <p class="card-text">A beautiful ceremony to celebrate love and unity. Join us for a memorable wedding experience.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="ManilaChefPic/birthday.jpg" class="card-img-top" alt="Debut/Birthday Party">
                <div class="card-body">
                    <h5 class="card-title">Debut/Birthday Party</h5>
                    <p class="card-text">Celebrate milestones and special moments with a grand debut or birthday party.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="ManilaChefPic/baptismal.webp" class="card-img-top" alt="Baptismal/Kiddie Party">
                <div class="card-body">
                    <h5 class="card-title">Baptismal/Kiddie Party</h5>
                    <p class="card-text">A joyous occasion for your little ones, filled with fun and cherished memories.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <img src="ManilaChefPic/foralloccations.jpg" class="card-img-top" alt="For All Occasions">
                <div class="card-body">
                    <h5 class="card-title">For All Occasions</h5>
                    <p class="card-text">Perfectly planned events for any occasion, tailored to your needs and preferences.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>    
