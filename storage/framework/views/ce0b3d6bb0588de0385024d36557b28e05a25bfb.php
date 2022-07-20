

<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?php echo e(route('contents.update', ['id' => $content['id']])); ?>" autocomplete="off" enctype="multipart/form-data" class="form-horizontal edit-content">
                        <?php echo csrf_field(); ?>

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title"><?php echo e(__('Edit Content')); ?></h4>
                                <p class="card-category"><?php echo e(__('Content information')); ?></p>
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
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Content title')); ?></label>
                                    <div class="col-sm-7">
                                        <div class="form-group<?php echo e($errors->has('contentTitle') ? ' has-danger' : ''); ?>">
                                            <input class="form-control<?php echo e($errors->has('contentTitle') ? ' is-invalid' : ''); ?>" name="contentTitle" id="input-contentTitle" type="text" placeholder="<?php echo e(__('content Title')); ?>" value="<?php echo e(old('contentTitle', $content['content_title'])); ?>" required="true" aria-required="true"/>
                                            <?php if($errors->has('contentTitle')): ?>
                                                <span id="name-error" class="error text-danger" for="input-contentTitle"><?php echo e($errors->first('contentTitle')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Content Type')); ?></label>
                                    <div class="col-sm-7">
                                        <div class="<?php echo e($errors->has('contentType') ? ' has-danger' : ''); ?>">
                                            <select class="<?php echo e($errors->has('contentType') ? ' is-invalid' : ''); ?>" name="contentType" data-live-search="true" id="input-contentType">
                                                <option <?php echo e($content['content_type'] == "text" ? "selected" : ""); ?> value="text">Rich Text</option>
                                                <option <?php echo e($content['content_type'] == "question" ? "selected" : ""); ?> value="question">Question</option>
                                            </select>
                                            <?php if($errors->has('contentType')): ?>
                                                <span id="name-error" class="error text-danger" for="input-contentType"><?php echo e($errors->first('contentType')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row hide" id="answerTypeRow">
                                        <label class="col-sm-2 col-form-label"><?php echo e(__('Answer Type')); ?></label>
                                        <div class="col-sm-7">
                                            <div class="<?php echo e($errors->has('answerType') ? ' has-danger' : ''); ?>">
                                                <select class="<?php echo e($errors->has('answerType') ? ' is-invalid' : ''); ?>" name="answerType" data-live-search="true" id="input-answerType">
                                                    <option <?php echo e($content['answer_type'] == "text" ? "selected" : ""); ?> value="text">Text</option>
                                                    <option <?php echo e($content['answer_type'] == "image" ? "selected" : ""); ?> value="image">Images</option>
                                                </select>
                                                <?php if($errors->has('answerType')): ?>
                                                    <span id="name-error" class="error text-danger" for="input-answerType"><?php echo e($errors->first('answerType')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row hide" id="textAnswersRow" >
                                        <label class="col-sm-2 col-form-label"><?php echo e(__('Answers')); ?></label>
                                        <div class="col-sm-7">

                                        </div>
                                    </div>
                                    <div class="row hide" id="imageAnswersRow" >
                                        <label class="col-sm-2 col-form-label"><?php echo e(__('Answers')); ?></label>
                                        <div class="col-sm-7">

                                        </div>
                                    </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"><?php echo e(__('Content')); ?></label>
                                    <div class="col-sm-7" id="content-div">
                                        <div class="form-group<?php echo e($errors->has('content') ? ' has-danger' : ''); ?>">
                                            <textarea class="summernote-textarea" class="form-control<?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>" name="content" id="input-content" required="true" aria-required="true"><?php echo e(old('content', $content['content'])); ?></textarea>
                                            <?php if($errors->has('content')): ?>
                                                <span id="name-error" class="error text-danger" for="input-content"><?php echo e($errors->first('content')); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="selectedSectionID" value="<?php echo e($selectedSectionID); ?>"/>
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
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'sections', 'titlePage' => __('Edit Content')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/contents/edit.blade.php ENDPATH**/ ?>