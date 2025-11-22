<h2 class="dashboard__heading"><?php echo $title; ?></h2>
<div class="dashboard__container-button">
    <a href="/admin/events/register" class="dashboard__button">
        <i class="fa-solid fa-circle-plus"></i>
        Add Event
    </a>
</div>
<div class="dashboard__container">
    <?php if(!empty($events)) : ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Event</th>
                    <th scope="col" class="table__th">Category</th>
                    <th scope="col" class="table__th">Date and Time</th>
                    <th scope="col" class="table__th">Speaker</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead> <!-- .table__thead -->
            <tbody class="table__body">
                <?php foreach($events as $event) : ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $event->name; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td">
                            <?php echo $event->category->name; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td">
                            <?php echo $event->day->name . ", " . $event->time->time; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td">
                            <?php echo $event->speaker->name . " " . $event->speaker->lastname; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td--actions">
                            <a class="table__action table__action--edit" href="/admin/events/edit?id=<?php echo $event->id; ?>">
                                <i class="fa-solid fa-pencil"></i>
                                Edit
                            </a> 
                            <form method="POST" action="/admin/events/delete" class="table__form">
                                <input type="hidden" name="id" value="<?php echo $event->id; ?>">
                                <button class="table__action table__action--delete" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Delete
                                </button>
                            </form> <!-- .table__form -->
                        </td> <!-- .table__td--actions -->
                    </tr> <!-- .table__tr -->
                <?php endforeach; ?>
            </tbody> <!-- .table__body -->
        </table> <!-- .table -->
    <?php else : ?>
        <p class="text-center">No Conferences/Workshops registered yet</p>
    <?php endif; ?>
</div> <!-- .dashboard__container -->
<?php 
    echo $pager;
?>