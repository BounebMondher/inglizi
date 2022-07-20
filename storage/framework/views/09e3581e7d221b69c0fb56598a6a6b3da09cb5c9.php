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
                  <h4 class="card-title ">Units</h4>
                  <p class="card-category"> Here you can find all the available units <?php echo $grade ? "under the grade : <b>".$grade['grade']."</b>": ""; ?></p>
                </div>
                <div class="col-md-2">
                  <a class="round-button-filled float-right" href="<?php echo e(route('units.create', ['selectedGradeID' => $grade ? $grade['id'] : null])); ?>"><i class="material-icons">add</i></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="data-table" class="table">
                  <thead class=" text-primary">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Grade</th>
                  <th class="no-search">Status</th>
                  <th class="no-search">Actions</th>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($unit['id']); ?>

                      </td>
                      <td>
                        <?php echo e($unit['unit']); ?>

                      </td>
                      <td>
                        <?php echo e($unit['grade']); ?>

                      </td>
                      <td>
                        <?php if($unit['enabled'] === 1): ?>
                          <i class="material-icons material-icons-green">check_circle_outline</i>
                        <?php else: ?>
                          <i class="material-icons material-icons-red">highlight_off</i>
                        <?php endif; ?>
                      </td>
                      <td class="text-primary">
                        <a class="round-button" href="<?php echo e(route('lessons', ['selectedUnitID' => $unit['id']])); ?>"><i class="material-icons">view_list</i>Explore Lessons</a>
                        <a class="round-button" href="<?php echo e(route('units.edit', ['id' => $unit['id'], 'selectedGradeID' => $grade ? $grade['id'] : null])); ?>"><i class="material-icons">mode_edit</i>Edit</a>
                        <a class="round-button" href="" data-route="<?php echo e(route('units.destroy', ['id'=>$unit['id'], 'selectedGradeID' => $grade ? $grade['id'] : null])); ?>" onclick="delete_unit(this, '<?php echo e($unit['id']); ?>', event)"><i class="material-icons">delete_outline</i>Delete</a>
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
<?php echo $__env->make('layouts.app', ['activePage' => 'units', 'titlePage' => __('Units')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/units/units.blade.php ENDPATH**/ ?>