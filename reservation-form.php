<?php
ob_start();
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');
ob_end_flush();
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            Reservation Form
        </div>
        <div class="card-body">
            <form id="reservationForm" action="functions/placereservation.php" method="POST">
                <!-- Step 1: Event Details -->
                <div class="step" style="display:none;">
                <div class="text-center mb-3 fw-bold">
                    Step 1 : Basic Details
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Name" class="form-label">Customer's Name</label>
                                <input type="text" required  name="name" placeholder="Enter your Full name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact No.</label>
                                <input type="text"  required name="contact_no" placeholder="Enter your Contact Number (ex: 09...)" class="form-control" pattern="09\d{9}">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="text" required name="email" placeholder="Enter your Email (accepted email address: gmail, yahoo, and hotmail)" class="form-control" pattern="[^@\s]+@(?:gmail\.com|yahoo\.com|hotmail\.com)">
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="celebrant" class="form-label">Celebrant's Name</label>
                                <input type="text" required name="celebrant" placeholder="Enter Celebrant's Name (If wedding, type Mr. and Mrs. Last Name)" class="form-control">
                            </div>
                        </div>   
                    </div>
                </div>

                <!-- Step 2: Event and Venue Selection -->
            <div class="step" style="display:none;">
                <div class="text-center mb-3 fw-bold">
                    Step 2 : Event and Venue Selection
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold mb-2">Select Event Type</label>
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="fw-bold">Reservation Date</label>
                                <input type="date" required  id="eventDate" name="date" placeholder="Select Reservation date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="eventTimeStart" class="form-label">Event Start Time</label>
                                <input type="time" required class="form-control" id="eventTimeStart" name="time" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="eventTimeEnd" class="form-label">Event End Time</label>
                                <input type="time" required class="form-control" id="eventTimeEnd" name="end" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Special Request (Optional)</label>
                            <textarea name="addMessage" class="form-control" rows="4" placeholder="i.e. Themes"></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pax" class="form-label">Number of Guests</label>
                                <input type="number" required id="numGuests"  name="pax" placeholder="Enter number of guests" class="form-control" min="1">
                            </div>
                        </div>
                    </div>
            </div>

                <!-- Step 3: Menu -->
                <div class="step" style="display:none;">
                    <div class="text-center mb-3">
                        Step 3 : Menu Selection
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="menuType" class="form-label">Package Type:</label>
                                <div class="col-md-6 mt-2">
                                    <label class="radio-container me-3">Deluxe: 
                                        <input type="radio" required class="ms-1" name="package" value="0" onclick="text(0)"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container me-3">Special: 
                                        <input type="radio" required class="ms-1" name="package" value="1" onclick="text(1)"/>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="row" id="hidecode">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Main1" class="form-label">Main Dish 1: Chicken</label>
                                <select class="form-select" required id="Main1" name="deluxe_dish_one">
                                    <option value="">Select Main Dish </option>
                                        <?php 
                                            $menu = getDeluxeChicken("menu");

                                            if (mysqli_num_rows($menu) > 0)
                                            {
                                                foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="soup" class="form-label">Soup</label>
                                <select class="form-select" required id="soup" name="deluxe_soup">
                                    <option value="">Select Soup</option>
                                    <?php 
                                            $menu = getAllSoup("menu");

                                            if (mysqli_num_rows($menu) > 0)
                                            {
                                                foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Main2" class="form-label">Main Dish 2: Fish</label>
                                <select class="form-select" required id="Main2" name="deluxe_dish_two">
                                    <option value="">Select Main Dish</option>
                                    <?php 
                                            $menu = getDeluxeFish("menu");

                                            if (mysqli_num_rows($menu) > 0)
                                            {
                                                foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            <label for="dessert" class="form-label">Dessert</label>
                                <select class="form-select" required id="dessert" name="deluxe_dessert">
                                    <option value="">Select Dessert</option>
                                    <?php 
                                            $menu = getAllDessert("menu");

                                            if (mysqli_num_rows($menu) > 0)
                                            {
                                                foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Main3" class="form-label">Main Dish 3: Pork</label>
                                <select class="form-select" required id="Main3" name="deluxe_dish_three">
                                    <option value="">Select Main Dish</option>
                                    <?php 
                                            $menu = getDeluxePork("menu");

                                            if (mysqli_num_rows($menu) > 0)
                                            {
                                                foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="veggies" class="form-label">Vegetables or Pasta/Noodles</label>
                                <select class="form-select" required id="veggies" name="deluxe_veggies">
                                    <option value="">Select Vegetables or Pasta/Noodles</option>
                                    <?php 
                                            $menu = getDeluxeVeggies("menu");

                                            if (mysqli_num_rows($menu) > 0)
                                            {
                                                foreach($menu as $item)
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
                        </div>
                    </div>    

                    <div class="row" id="showcode" style="display: none">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Main1" class="form-label">Main Dish 1: Chicken</label>
                            <select class="form-select" required id="Main1" name="special_dish_one">
                                <option value="">Select Main Dish </option>
                                    <?php 
                                        $menu = getAllChicken("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="soup" class="form-label">Soup</label>
                            <select class="form-select" required id="soup" name="special_soup">
                                <option value="">Select Soup</option>
                                <?php 
                                        $menu = getAllSoup("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Main2" class="form-label">Main Dish 2: Fish</label>
                            <select class="form-select" required id="Main2" name="special_dish_two">
                                <option value="">Select Main Dish</option>
                                <?php 
                                        $menu = getAllFish("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                        <label for="dessert" class="form-label">Dessert</label>
                            <select class="form-select" required id="dessert" name="special_dessert">
                                <option value="">Select Dessert</option>
                                <?php 
                                        $menu = getAllDessert("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                    </div>
                    <div class="col-md-6">
                            <div class="mb-3">
                                <label for="Main3" class="form-label">Main Dish 3: Pork or Beef</label>
                                <select class="form-select" required id="Main3" name="special_dish_three">
                                    <option value="">Select Main Dish</option>
                                    <?php 
                                        $menu = getAllPork("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="veggies" class="form-label">Vegetables </label>
                                <select class="form-select" required id="veggies" name="special_veggies">
                                    <option value="">Select Vegetables</option>
                                    <?php 
                                        $menu = getAllVeggies("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pasta" class="form-label">Pasta/noodles</label>
                                <select class="form-select" required id="pasta" name="special_pasta">
                                    <option value="">Select Pasta</option>
                                    <?php 
                                        $menu = getAllPasta("menu");

                                        if (mysqli_num_rows($menu) > 0)
                                        {
                                            foreach($menu as $item)
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
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Special Request (Optional)</label>
                                <textarea name="addMessage_menu" class="form-control" rows="4" placeholder="i.e. additional menu"></textarea>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="payment" class="form-label">Payment (Reservation Fee will be deducted to )</label>
                                    <select class="form-select" id="payment" name="payment">
                                        <option value="">Select Payment Price</option>
                                        <option value="2000">Reservationg Fee: 2000</option>
                                        <option value="5000">Low Downpayment: 5000</option>
                                        <option value="10000">High Downpayment: 10,000</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>

                        <div class="col-md-6 mb-3 ms-2">
                            <label>
                                <input type="checkbox" name="agree" required> I agree to the <a href="rules.php" target="_blank">Function Guidelines/Rules</a>
                            </label>
                        </div>
                    </div>

                <!-- Navigation Buttons -->
                <div class="d-flex justify-content-between mt-3">
                    <button type="button" class="btn btn-secondary" id="prevBtn" onclick="changeStep(-1)" disabled>Previous</button>
                    <button type="submit" name="placeReserveBtn" class="btn btn-primary" style="display:none;" id="submitBtn">Submit</button>
                    <button type="button" class="btn btn-primary" id="nextBtn" onclick="changeStep(1)">Next</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Get the current date
    let today = new Date();
    let yearFromToday = new Date();

    // Add 14 days (2 weeks) to the current date
    today.setDate(today.getDate() + 14);    

    // Set the date one year in the future
    yearFromToday.setFullYear(today.getFullYear() + 1);

    // Format dates as YYYY-MM-DD
    let todayStr = today.toISOString().split('T')[0];
    let yearFromTodayStr = yearFromToday.toISOString().split('T')[0];

    // Set the min and max attributes on the date input
    document.getElementById('eventDate').setAttribute('min', todayStr);
    document.getElementById('eventDate').setAttribute('max', yearFromTodayStr);
</script>

<script>
    function text(x) {
        // Get the elements
        var hidecode = document.getElementById("hidecode");
        var showcode = document.getElementById("showcode");

        // If Deluxe package is selected (x == 0)
        if (x == 0) {
            hidecode.style.display = "flex";
            showcode.style.display = "none";
            
            // Add required attributes to deluxe menu fields
            Array.from(hidecode.getElementsByTagName('select')).forEach(function(select) {
                select.setAttribute('required', 'required');
            });
            
            // Remove required attributes from special menu fields
            Array.from(showcode.getElementsByTagName('select')).forEach(function(select) {
                select.removeAttribute('required');
            });
        }
        // If Special package is selected (x == 1)
        else if (x == 1) {
            hidecode.style.display = "none";
            showcode.style.display = "flex";
            
            // Add required attributes to special menu fields
            Array.from(showcode.getElementsByTagName('select')).forEach(function(select) {
                select.setAttribute('required', 'required');
            });
            
            // Remove required attributes from deluxe menu fields
            Array.from(hidecode.getElementsByTagName('select')).forEach(function(select) {
                select.removeAttribute('required');
            });
        }
    }
</script>


<script>
  document.getElementById('eventTimeStart').addEventListener('change', function() {
    const startTimeInput = document.getElementById('eventTimeStart');
    const endTimeInput = document.getElementById('eventTimeEnd');

    // Get the start time as a Date object
    let startTime = new Date(`1970-01-01T${startTimeInput.value}:00`);

    // Add 4 hours to the start time
    startTime.setHours(startTime.getHours() + 4);

    // Format the time to HH:MM for input value
    let endTime = startTime.toTimeString().slice(0, 5);

    // Set the calculated end time
    endTimeInput.value = endTime;
  });
</script>

<script>
  document.getElementById('numGuests').addEventListener('input', function() {
    const guestInput = document.getElementById('numGuests');

    if (guestInput.value < 1) {
      guestInput.value = 1; // Set to 1 if input is less than 1
    }
  });
</script>



<script>
    let currentStep = 0;
showStep(currentStep);

function showStep(step) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((el, index) => {
        el.style.display = (index === step) ? 'block' : 'none';
    });

    // Disable "Previous" button on first step
    document.getElementById("prevBtn").disabled = (step === 0);

    // Show/Hide "Next" and "Submit" buttons appropriately
    document.getElementById("nextBtn").style.display = (step === steps.length - 1) ? 'none' : 'inline-block';
    document.getElementById("submitBtn").style.display = (step === steps.length - 1) ? 'inline-block' : 'none';
}

function changeStep(stepChange) {
    const steps = document.querySelectorAll('.step');
    
    // If going backwards (stepChange is negative), ignore validation
    if (stepChange < 0) {
        currentStep += stepChange;
        showStep(currentStep);
        return;
    }

    // Otherwise, validate the current step
    const currentStepElement = steps[currentStep];
    const inputs = currentStepElement.querySelectorAll('input, select');
    for (let input of inputs) {
        if (!input.checkValidity()) {
            input.reportValidity();
            return; // Prevent moving to the next step if any input is invalid
        }
    }

    // Proceed to the next step
    currentStep += stepChange;
    showStep(currentStep);
}

</script>



<?php
include('includes/footer.php')
?>    