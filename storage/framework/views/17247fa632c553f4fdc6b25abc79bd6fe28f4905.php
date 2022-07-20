<div class="sidebar" data-color="orange" data-background-color="white" data-image="<?php echo e(asset('material')); ?>/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      <?php echo e(__('INGLIZI')); ?>

    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item<?php echo e($activePage == 'dashboard' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('home')); ?>">
          <i class="material-icons">dashboard</i>
            <p><?php echo e(__('Dashboard')); ?></p>
        </a>
      </li>

      <li class="nav-item<?php echo e($activePage == 'grades' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('grades')); ?>">
          <i class="material-icons">content_paste</i>
            <p><?php echo e(__('Grades')); ?></p>
        </a>
      </li>
      <li class="nav-item<?php echo e($activePage == 'units' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('units')); ?>">
          <i class="material-icons">table_rows</i>
          <p><?php echo e(__('Units')); ?></p>
        </a>
      </li>
      <li class="nav-item<?php echo e($activePage == 'lessons' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('lessons')); ?>">
          <i class="material-icons">library_books</i>
          <p><?php echo e(__('Lessons')); ?></p>
        </a>
      </li>
      <li class="nav-item<?php echo e($activePage == 'sections' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('sections')); ?>">
          <i class="material-icons">view_list</i>
          <p><?php echo e(__('Sections')); ?></p>
        </a>
      </li>
    </ul>
  </div>
</div><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>