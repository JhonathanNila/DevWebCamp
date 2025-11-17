<h2 class="dashboard__heading"><?php echo $title; ?></h2>
<div class="dashboard__container-button">
    <a href="/admin/speakers/register" class="dashboard__button">
        <i class="fa-solid fa-circle-plus"></i>
        Add Speaker
    </a>
</div>
<div class="dashboard__container">
    <?php if(!empty($speakers)) : ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Name</th>
                    <th scope="col" class="table__th">Location</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead> <!-- .table__thead -->
            <tbody class="table__body">
                <?php foreach($speakers as $speaker) : ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $speaker->name . ' ' . $speaker->lastname; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td">
                            <?php echo $speaker->city . ', ' . $speaker->contry; ?>
                        </td> <!-- .table__td -->
                        <td class="table__td--actions">
                            <a class="table__action table__action--edit" href="/admin/speakers/edit?id=<?php echo $speaker->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Edit
                            </a> 
                            <form method="POST" action="/admin/speakers/delete" class="table__form">
                                <input type="hidden" name="id" value="<?php echo $speaker->id; ?>">
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
        <p class="text-center">No speakers registered yet</p>
    <?php endif; ?>
</div> <!-- .dashboard__container -->
<?php 
    echo $pager;
?>