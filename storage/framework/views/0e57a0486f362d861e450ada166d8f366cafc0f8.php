

<?php $__env->startSection('style'); ?>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo e(route('events.create')); ?>"> Create New Events</a>
        </div>
    </div>
</div>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p><?php echo e($message); ?></p>
</div>
<?php endif; ?>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Slug</th>
		<th>Alt</th>
        <!-- <th>Details</th> -->
        <th width="280px">Action</th>
    </tr>
    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e(++$i); ?></td>
        <td><img src="<?php echo e(url('/storage/'.$event->image)); ?>" width="100px"></td>
        <td><?php echo e($event->name); ?></td>
        <td><?php echo e($event->slug); ?></td>
		<td><?php echo e($event->image_alt); ?></td>
        <!-- <td><?php echo e($event->detail); ?></td> -->
        <td>
            <form action="<?php echo e(route('events.destroy',$event->id)); ?>" method="POST">

                <!-- <a class="btn btn-info" href="<?php echo e(route('events.show',$event->id)); ?>"><i class="fa fa-desktop"></i></a> -->

                <a class="btn btn-primary" href="<?php echo e(route('events.edit',$event->id)); ?>"><i class="fa fa-pencil"></i></a>

                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>

                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo $events->links(); ?>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/events/index.blade.php ENDPATH**/ ?>