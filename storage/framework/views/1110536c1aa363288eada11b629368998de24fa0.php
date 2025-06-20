

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('category.create')); ?>"> Create New Category</a>
        </div>
    </div>
</div>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID</th>
            <th>name</th>
            <th>slug</th>
            <th>tumb</th>
            <th>Parent category</th>

            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($i++); ?></td>
            <td><?php echo e($category->id); ?></td>

            <td><?php echo e($category->name); ?></td>
            <td><?php echo e($category->slug); ?></td>
            <td> <img src="<?php echo e(url('/storage/'.$category->tumb)); ?>" width="100px"></td>
            <td><?php echo e($category->parent); ?></td>

            <td>
                <form action="<?php echo e(route('category.destroy',$category->id)); ?>" method="POST">
                    <a class="btn btn-info" href="<?php echo e(route('category.edit',$category->id)); ?>"><i class="fa fa-pencil-square-o"></i></a>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php echo $data->links(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/category/index.blade.php ENDPATH**/ ?>