<h2 class="dashboard__heading"><?php echo $title; ?></h2>
<div class="dashboard__container">
    <?php if(!empty($attendees)) : ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Name</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Pass</th>
                </tr>
            </thead> <!-- .table__thead -->
            <tbody class="table__body">
                <?php foreach($attendees as $attendee) : ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $attendee->user->name . ' ' . $attendee->user->lastname; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td">
                            <?php echo $attendee->user->email; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td">
                            <?php echo $attendee->bundle->name; ?>
                        </td> <!-- .table__td -->
                    </tr> <!-- .table__tr -->
                <?php endforeach; ?>  <!-- PHP: foreach -->
            </tbody> <!-- .table__body -->
        </table> <!-- .table -->
    <?php else : ?> <!-- PHP: if(else) -->
        <p class="text-center">No Attendees registered yet</p>
    <?php endif; ?> <!-- PHP: if -->
</div> <!-- .dashboard__container -->
<?php 
    echo $pager;
?>