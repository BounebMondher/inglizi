<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-md-10">
                <h4 class="card-title ">Grades</h4>
                <p class="card-category"> Here you can find all the available grades</p>
              </div>
              <div class="col-md-2">
                <a class="round-button-filled float-right" href="#"><i class="material-icons">add</i></a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    N° units
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      1
                    </td>
                    <td>
                      4th Grade
                    </td>
                    <td>
                      250
                    </td>
                    <td class="text-primary">
                      <a class="round-button" href="#"><i class="material-icons">edit_outline</i>Edit</a>
                      <a class="round-button" href="#"><i class="material-icons">delete_outline</i>Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      2
                    </td>
                    <td>
                      5th Grade
                    </td>
                    <td>
                      260
                    </td>
                    <td class="text-primary">
                      <a class="round-button" href="#"><i class="material-icons">edit_outline</i>Edit</a>
                      <a class="round-button" href="#"><i class="material-icons">delete_outline</i>Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      3
                    </td>
                    <td>
                      5th Grade
                    </td>
                    <td>
                      268
                    </td>
                    <td class="text-primary">
                      <a class="round-button" href="#"><i class="material-icons">edit_outline</i>Edit</a>
                      <a class="round-button" href="#"><i class="material-icons">delete_outline</i>Delete</a>
                    </td>
                  </tr>
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
<?php echo $__env->make('layouts.app', ['activePage' => 'grades', 'titlePage' => __('Grades')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp72\htdocs\inglizi\resources\views/pages/lessons.blade.php ENDPATH**/ ?>