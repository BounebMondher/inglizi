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
                  <h4 class="card-title ">Contents</h4>
                  <p class="card-category"> Here you can find all the available contents <?php echo "under the section : ".$selectedSection['section'].", under the lesson : <b>".$selectedLesson['lesson']."</b> (unit : ".$selectedUnit['unit'].", grade : ".$selectedGrade['grade']." )"; ?></p>
                </div>
                <div class="col-md-2">
                  <a class="round-button-filled float-right" href="<?php echo e(route('contents.create', ['selectedSectionID' => $selectedSection['id']])); ?>"><i class="material-icons">add</i></a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="data-table" class="table">
                  <thead class=" text-primary">
                  <th>ID</th>
                  <th>Title</th>
                  <th>Type</th>
                  <th class="no-search">Status</th>
                  <th class="no-search">Actions</th>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td>
                        <?php echo e($content['id']); ?>

                      </td>
                      <td>
                        <?php echo e($content['content_title']); ?>

                      </td>
                      <td>
                        <?php echo e($content['content_type']); ?>

                      </td>
                      <td>
                        <?php if($content['enabled'] === 1): ?>
                          <i class="material-icons material-icons-green">check_circle_outline</i>
                        <?php else: ?>
                          <i class="material-icons material-icons-red">highlight_off</i>
                        <?php endif; ?>
                      </td>
                      <td class="text-primary">
                        <a class="round-button" href="<?php echo e(route('contents.edit', ['id' => $content['id'], 'selectedSectionID' => $selectedSection['id']])); ?>"><i class="material-icons">mode_edit</i>Edit</a>
                        <a class="round-button" href="" data-route="<?php echo e(route('contents.destroy', ['id'=>$content['id'], 'selectedSectionID' => $selectedSection['id']])); ?>" onclick="delete_content(this, '<?php echo e($content['id']); ?>', event)"><i class="material-icons">delete_outline</i>Delete</a>
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
<?php echo $__env->make('layouts.app', ['activePage' => 'sections', 'titlePage' => __('Contents')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/contents/contents.blade.php ENDPATH**/ ?>