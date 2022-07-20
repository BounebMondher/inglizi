<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php if(session('success')): ?>
          <div class="alert alert-success">
            <?php echo e(session('success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-md-10">
                <h4 class="card-title ">Grades</h4>
                <p class="card-category"> Here you can find all the available grades</p>
              </div>
              <div class="col-md-2">
                <a class="round-button-filled float-right" href="<?php echo e(route('grades.create')); ?>"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="data-table" class="table">
                <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th class="no-search">Status</th>
                  <th class="no-search">Actions</th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <?php echo e($grade['id']); ?>

                    </td>
                    <td>
                      <?php echo e($grade['grade']); ?>

                    </td>
                    <td>
                      <?php if($grade['enabled'] === 1): ?>
                        <i class="material-icons material-icons-green">check_circle_outline</i>
                        <?php else: ?>
                        <i class="material-icons material-icons-red">highlight_off</i>
                      <?php endif; ?>
                    </td>
                    <td class="text-primary">
                      <a class="round-button" href="<?php echo e(route('units', ['selectedGradeID' => $grade['id']])); ?>"><i class="material-icons">view_list</i>Explore Units</a>
                      <a class="round-button" href="<?php echo e(route('grades.edit', ['id' => $grade['id']])); ?>"><i class="material-icons">mode_edit</i>Edit</a>
                      <a class="round-button" href="" data-route="<?php echo e(route('grades.destroy', ['id'=>$grade['id']])); ?>" onclick="delete_grade(this, '<?php echo e($grade['id']); ?>', event)"><i class="material-icons">delete_outline</i>Delete</a>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'grades', 'titlePage' => __('Grades')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/grades/grades.blade.php ENDPATH**/ ?>