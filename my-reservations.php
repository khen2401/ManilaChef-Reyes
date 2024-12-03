<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

?>
<div class="py-4">
    <div class="container">
        <h2>My Reservations</h2>
        <hr>
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Reservation No.</th>
                                <th>Event Type</th>
                                <th>Venue</th>
                                <th>Placed On</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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


                            $reservations = getReservations();

                            if(mysqli_num_rows($reservations) > 0)
                                {
                                    foreach ($reservations as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $item['reservation_no']?></td>
                                            <td>
                                                <?= isset($eventMap[$item['event_id']]) ? $eventMap[$item['event_id']] : 'Event Type not found'; ?>
                                            </td>
                                            <td>
                                                <?= isset($venueMap[$item['venue_id']]) ? $venueMap[$item['venue_id']] : 'Venue not found'; ?>
                                            </td>
                                            <td><?= $item['created_at']?></td>
                                            <td>
                                                <a href="view-reservation.php?r=<?= $item['reservation_no']?>" class="btn btn-primary">View Details</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr>
                                            <td colspan="5">No Reservation Available</td>
                                        </tr>

                                        <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?>    
