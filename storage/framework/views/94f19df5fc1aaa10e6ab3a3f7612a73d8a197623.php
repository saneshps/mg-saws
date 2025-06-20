

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>"> Create New Product</a>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <table class="table table-bordered" id="product_tbl">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID</th>
                <th>name & Model</th>
                <th>category</th>
                <th>alt</th>
                <th>image</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e(++$i); ?></td>
                <td><?php echo e($product->id); ?></td>
                <td style="width:500px;">
                    <strong><?php echo e($product->model_no); ?></strong>
                    <a class="" href="<?php echo e(route('products.show',$product->id)); ?>">
                        <p><?php echo e($product->name); ?></p>
                    </a>
                    <strong><?php echo e($product->status? 'Active': 'Inactive'); ?></strong>
                </td>

                <td><?php echo e($product->category); ?></td>
                <td><?php echo e($product->image_alt); ?></td>
                <td><img src="<?php echo e(url('/storage/'.$product->image)); ?>" width="100px"></td>
                <td>
                    <div class="row">
                        <a class="btn btn-primary" href="<?php echo e(route('products.show',$product->id)); ?>"><i class="fa fa-eye"></i></a>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-info" href="<?php echo e(route('products.edit',$product->id)); ?>"><i class="fa fa-pencil-square-o"></i></a>
                        &nbsp;&nbsp;&nbsp;
                        <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </div>
                </td>


            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php echo $data->links(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/product/index.blade.php ENDPATH**/ ?>