<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

?>
<div class="py-4">
    <div class="container">
        <h2>Reservation</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="functions/placereservation.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Reservation Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" required name="name" placeholder="Enter your Full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" required name="email" placeholder="Enter your Email" class="form-control"  pattern="[^@\s]+@(?:gmail\.com|yahoo\.com|hotmail\.com)">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Contact Number</label>
                                    <input type="tel" required  name="contact_no" placeholder="Enter your Contact Number" class="form-control"  pattern="09\d{9}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Pax (Number of Person Attending)</label>
                                    <input type="number" required  name="pax" placeholder="Enter Pax" class="form-control" min="0">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Select Event Type</label>
                                        <select name= "event_id" required class="form-select">
                                            <option value="" disabled selected>Select Event Type</option>
                                            <?php 
                                                $event = getALL("event");

                                                if (mysqli_num_rows($event) > 0)
                                                {
                                                    foreach($event as $item)
                                                    {
                                                        ?>
        
                                                        <option value="<?= $item['id']; ?>" ><?= $item['name']; ?></option>
        
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    echo "No Event Type available";
                                                }
                                            ?>
                                        </select> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Select Venue</label>
                                            <select name= "venue_id" required class="form-select">
                                                <option value="" disabled selected>Select Venue</option>
                                                <?php 
                                                    $venue = getALL("venue");

                                                    if (mysqli_num_rows($venue) > 0)
                                                    {
                                                        foreach($venue as $item)
                                                        {
                                                            ?>
            
                                                            <option value="<?= $item['id']; ?>" ><?= $item['name']; ?></option>
            
                                                            <?php
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "No Venue available";
                                                    }
                                                ?>
                                            </select> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Select Package Type</label>
                                        <select name= "package" required class="form-select">
                                            <option value="" disabled selected>Select Package Type</option>
                                            <option value="Deluxe Package">Deluxe Package</option>
                                            <option value="Special Package">Special Package</option>
                                        </select> 
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Reservation Date</label>
                                    <input type="date" required  name="date" placeholder="Select Reservation date" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Time</label>
                                    <input type="time" required  name="time" placeholder="Select Time" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Additional Message</label>
                                    <textarea name="addMessage" class="form-control" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Menus</h5>
                            <hr>
                                <?php $items = getCartItems();
                                $fee = 0;
                                    foreach ($items as $citem)
                                    {
                                        ?>
                                            <div class="card shadow-sm mb-3">
                                                <div class="row align-items-center m-3">
                                                    <div class="col-md-4">
                                                        <img src="uploads/<?= $citem['image']?>" alt="Image" width="100%">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h6><?= $citem['name']?></h6>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        $fee = $citem['reservation_fee'];
                                    }
                                ?>
                            <hr>
                            <h5>Reservation Fee:<span class="float-end fw-bold">₱<?=$fee?></span></h5>  
                            <div class="">
                                <input type="hidden" name="payment_mode" value="Paid with PayMongo">
                                
                                <button type="submit" name="placeReserveBtn" class="btn btn-primary mb-3 mt-3 w-100">Confirm and Place Reservation</button>
                            </div> 
                            <p><strong>Note:</strong> The amount payable is only the reservation fee and not the total amount of the catering service. 
                                Please head to the events page or contact us for the correct pricing.</p> 
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>    

