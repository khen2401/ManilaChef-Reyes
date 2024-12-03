<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

if(isset($_GET['r']))
{
    $reservation_no = $_GET['r'];

    $reservationData = checkValidReservation($reservation_no);
    if(mysqli_num_rows($reservationData) < 0)
    {
        ?>
            <h4>Something went wrong</h4>
        <?php
        die();
    } 
}
else
{
    ?>
        <h4>Something went wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($reservationData);

$events = getAll("event");
$eventMap = [];
foreach ($events as $event) {
    $eventMap[$event['id']] = $event['name'];
}

$venues = getAll("venue");
$venueMap = [];
foreach ($venues as $venue) {
    $venueMap[$venue['id']] = $venue['name'];
}

$menus = getAll("menu");
$menuMap = [];
foreach ($menus as $menu) {
    $menuMap[$menu['id']] = $menu['name'];
}

?>
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <span class="text-white fs-3">View Details</span>
                        <a href="my-reservations.php" class="btn btn-warning float-end"><i class="fa fa-reply"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Reservation Details</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3 mt-2">
                                        <label class="fw-bold">Name</label>
                                        <div class="border p-1">
                                            <?= $data['name']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 mt-2">
                                        <label class="fw-bold">Email</label>
                                        <div class="border p-1">
                                                <?= $data['email']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Contact Number</label>
                                        <div class="border p-1">
                                                <?= $data['contact_no']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Celebrant's Name</label>
                                        <div class="border p-1">
                                                <?= $data['celebrant']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Pax (Number of Person Attending)</label>
                                        <div class="border p-1">
                                                <?= $data['pax']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Selected Event Type</label>
                                        <div class="border p-1">
                                            <?= isset($eventMap[$data['event_id']]) ? $eventMap[$data['event_id']] : 'Event Type not found'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Selected Venue</label>
                                        <div class="border p-1">
                                            <?= isset($venueMap[$data['venue_id']]) ? $venueMap[$data['venue_id']] : 'Venue not found'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Reservation Date</label>
                                        <div class="border p-1">
                                                <?= $data['date']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Selected Package Type</label>
                                        <div class="mt-3">
                                            <label class="radio-container me-3">Deluxe: 
                                                <input type="radio" class="ms-1" name="menuType" value="0" disabled
                                                onclick="toggleFields(this.value)" <?php echo ($data['package'] == 0) ? 'checked' : ''; ?> />
                                                
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container me-3">Special: 
                                                <input type="radio" class="ms-1" name="menuType" value="1" disabled
                                                onclick="toggleFields(this.value)" <?php echo ($data['package'] == 1) ? 'checked' : ''; ?> />
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3 ">
                                        <label class="fw-bold">Time Start</label>
                                        <div class="border p-1">
                                                <?= $data['time']?>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3 ">
                                        <label class="fw-bold">Time End</label>
                                        <div class="border p-1">
                                                <?= $data['endtime']?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="fw-bold">Main Dish 1</label>
                                        <div class="border p-1">
                                                <?= isset($menuMap[$data['dish_one']]) ? $menuMap[$data['dish_one']] : 'Dish not found'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="fw-bold">Main Dish 2</label>
                                        <div class="border p-1">
                                                <?= isset($menuMap[$data['dish_two']]) ? $menuMap[$data['dish_two']] : 'Dish not found'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="fw-bold">Main Dish 3</label>
                                        <div class="border p-1">  
                                                <?= isset($menuMap[$data['dish_three']]) ? $menuMap[$data['dish_three']] : 'Dish not found'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="fw-bold">Soup</label>
                                        <div class="border p-1">
                                                <?= isset($menuMap[$data['soup']]) ? $menuMap[$data['soup']] : 'Dish not found'; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="deluxeFields">      
                                    <div class="col-md-6 mb-3 ">
                                        <label class="fw-bold">Vegetables or Pasta/Noodles</label>
                                        <div class="border p-1">
                                                <?= isset($menuMap[$data['veggies']]) ? $menuMap[$data['veggies']] : 'Dish not found'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 ">
                                        <label class="fw-bold">Dessert</label>
                                        <div class="border p-1">
                                                <?= isset($menuMap[$data['dessert']]) ? $menuMap[$data['dessert']] : 'Dish not found'; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="specialFields">
                                    <div class="col-md-6 mb-3 ">
                                            <label class="fw-bold">Vegetables</label>
                                            <div class="border p-1">
                                                    <?= isset($menuMap[$data['veggies']]) ? $menuMap[$data['veggies']] : 'Dish not found'; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3 ">
                                            <label class="fw-bold">Pasta</label>
                                            <div class="border p-1">
                                                    <?= isset($menuMap[$data['pasta']]) ? $menuMap[$data['pasta']] : 'Dish not found'; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3 ">
                                            <label class="fw-bold">Dessert</label>
                                            <div class="border p-1">
                                                    <?= isset($menuMap[$data['dessert']]) ? $menuMap[$data['dessert']] : 'Dish not found'; ?>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Additional Message for Event</label>
                                        <div class="border p-1">
                                            <?= $data['add_msg'] ? $data['add_msg'] : 'No Additional Message Entered'; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Additional Message for Menu</label>
                                        <div class="border p-1">
                                            <?= $data['add_msg_menu'] ? $data['add_msg_menu'] : 'No Additional Message Entered'; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Status: </label>
                                        <div class="border p-1">
                                            <?php
                                                if($data['status'] == 0)
                                                {
                                                    echo "Reserved";
                                                }
                                                else if($data['status'] == 1)
                                                {
                                                    echo "Completed";
                                                }
                                                else if($data['status'] == 2)
                                                {
                                                    echo "Cancelled";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

<script>
    // Function to show/hide fields based on the selected package
    function toggleFields(packageValue) {
        if (packageValue == '0') {
            document.getElementById('deluxeFields').style.display = 'flex';
            document.getElementById('specialFields').style.display = 'none';
        } else if (packageValue == '1') {
            document.getElementById('deluxeFields').style.display = 'none';
            document.getElementById('specialFields').style.display = 'flex';
        }
    }

    // Call toggleFields on page load to set the initial visibility based on the database value
    window.onload = function() {
        toggleFields('<?php echo $data['package']; ?>');
    };
</script>
<?php
include('includes/footer.php')
?>    
