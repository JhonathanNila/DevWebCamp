<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__link <?php echo current_page('/dashboard') ? 'dashboard__link--current' : '';?>">
            <i class="fa-solid fa-house dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Home
            </span> <!-- .dashboard__menu-text -->
        </a> <!-- .dashboard__link -->
        <a href="/admin/speakers" class="dashboard__link <?php echo current_page('/speakers') ? 'dashboard__link--current' : '';?>">
            <i class="fa-solid fa-microphone dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Speakers
            </span> <!-- .dashboard__menu-text -->
        </a> <!-- .dashboard__link -->
        <a href="/admin/events" class="dashboard__link <?php echo current_page('/events') ? 'dashboard__link--current' : '';?>">
            <i class="fa-solid fa-calendar dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Events
            </span> <!-- .dashboard__menu-text -->
        </a> <!-- .dashboard__link -->
        <a href="/admin/attendees" class="dashboard__link <?php echo current_page('/attendees') ? 'dashboard__link--current' : '';?>">
            <i class="fa-solid fa-users dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Attendees
            </span> <!-- .dashboard__menu-text -->
        </a> <!-- .dashboard__link -->
        <a href="/admin/gifts" class="dashboard__link <?php echo current_page('/gifts') ? 'dashboard__link--current' : '';?>">
            <i class="fa-solid fa-gift dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Gifts
            </span> <!-- .dashboard__menu-text -->
        </a> <!-- .dashboard__link -->
    </nav> <!-- .dashboard__menu -->
</aside> <!-- .dashboard__sidebar -->