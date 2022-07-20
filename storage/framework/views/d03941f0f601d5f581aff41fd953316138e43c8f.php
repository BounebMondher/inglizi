

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('grades.update', ['id' => $grade['id']])); ?>" autocomplete="off" class="form-horizontal">
                        <?php echo csrf_field(); ?>

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title"><?php echo e(__('Edit Grade')); ?></h4>
                                <p class="card-category"><?php echo e(__('Grade information')); ?></p>
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
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Grade')); ?></label>
                                    <div class="col-sm-7">
                                        <div class="form-group<?php echo e($errors->has('grade') ? ' has-danger' : ''); ?>">
                                            <input class="form-control<?php echo e($errors->has('grade') ? ' is-invalid' : ''); ?>" name="grade" id="input-name" type="text" placeholder="<?php echo e(__('Grade')); ?>" value="<?php echo e(old('grade', $grade['grade'])); ?>" required="true" aria-required="true"/>
                                            <?php if($errors->has('grade')): ?>
                                                <span id="name-error" class="error text-danger" for="input-name"><?php echo e($errors->first('grade')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label"><?php echo e(__('Status')); ?></label>
                                    <div class="col-sm-7">
                                            <div class="form-group">
                                             <input class="form-control" name="enabled" id="input-enabled" type="checkbox" <?php echo e($grade['enabled'] ? "checked" : ""); ?> />
                                        </div>
                                    </div>
                                </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'grades', 'titlePage' => __('Edit Grade')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/grades/edit.blade.php ENDPATH**/ ?>