

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('lessons.update', ['id' => $lesson['id']])); ?>" autocomplete="off" class="form-horizontal">
                        <?php echo csrf_field(); ?>

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title"><?php echo e(__('Edit Lesson')); ?></h4>
                                <p class="card-category"><?php echo e(__('Lesson information')); ?></p>
                            </div>
                            <div class="card-body ">
                                <?php if(session('success')): ?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span><?php echo e(session('success')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Lesson')); ?></label>
                                    <div class="col-sm-7">
                                        <div class="form-group<?php echo e($errors->has('lesson') ? ' has-danger' : ''); ?>">
                                            <input class="form-control<?php echo e($errors->has('lesson') ? ' is-invalid' : ''); ?>" name="lesson" id="input-lesson" type="text" placeholder="<?php echo e(__('Lesson')); ?>" value="<?php echo e(old('lesson', $lesson['lesson'])); ?>" required="true" aria-required="true"/>
                                            <?php if($errors->has('lesson')): ?>
                                                <span id="name-error" class="error text-danger" for="input-lesson"><?php echo e($errors->first('lesson')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Grade')); ?></label>
                                    <div class="col-sm-7">
                                        <div class="<?php echo e($errors->has('grade') ? ' has-danger' : ''); ?>">
                                            <select class="<?php echo e($errors->has('grade') ? ' is-invalid' : ''); ?>" name="grade" data-live-search="true" id="input-grade-lessons">
                                                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($grade['id'] == $lessonUnit['grade_id'] ? "selected" : ""); ?> value="<?php echo e($grade['id']); ?>"><?php echo e($grade['grade']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('grade')): ?>
                                                <span id="name-error" class="error text-danger" for="input-grade"><?php echo e($errors->first('grade')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Unit')); ?></label>
                                    <div class="col-sm-7">
                                        <div class="<?php echo e($errors->has('unit') ? ' has-danger' : ''); ?>">
                                            <select class="<?php echo e($errors->has('unit') ? ' is-invalid' : ''); ?>" name="unit" data-live-search="true" id="input-unit-lessons">
                                                <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($unit['id'] == $lesson['unit_id'] ? "selected" : ""); ?> value="<?php echo e($unit['id']); ?>"><?php echo e($unit['unit']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('unit')): ?>
                                                <span id="name-error" class="error text-danger" for="input-unit"><?php echo e($errors->first('unit')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label"><?php echo e(__('Status')); ?></label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <input class="form-control" name="enabled" id="input-enabled" type="checkbox" <?php echo e($unit['enabled'] ? "checked" : ""); ?> />
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" name="selectedUnitID" value="<?php echo e($selectedUnitID); ?>"/>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var grades = <?php echo json_encode($grades); ?>;
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'lessons', 'titlePage' => __('Edit Lesson')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/lessons/edit.blade.php ENDPATH**/ ?>