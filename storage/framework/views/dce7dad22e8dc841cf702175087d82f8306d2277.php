
<?php $__env->startSection('style'); ?>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <form action="<?php echo e(route('products.update',$product->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?php echo e(route('products.index')); ?>"> Back</a>
                    <button type="submit" class="btn btn-primary">Save & Publish</button>
                </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>


    <div class="row">
        <div class="col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo e($product->name); ?>">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>description:</strong>
                    <!-- <textarea class="form-control" rows="6" name="description" placeholder="Detail"><?php echo e($product->description); ?></textarea> -->
                    <textarea name="desc"><?php echo e($product->desc); ?></textarea>
                </div>
            </div>
            <?php if($datasheet): ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Datasheet</strong>
                    <div class="row mt-2">
                        <div class="col-md-10">
                            <a class="btn btn-info" style="width:100%" target="_blank" href="<?php echo e(asset('storage/'.$datasheet->file_name)); ?>">View Datasheet</a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-danger" width="100%" href="<?php echo e(route('removeDatasheet',$datasheet->id)); ?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Datasheet</strong>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-outline-info mt-2" style="width:100%; border-style:dashed;border-width:3px;" href="<?php echo e(url('pdf/create/'.$product->id)); ?>">Add Datasheet <i class="fa fa-plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Graph</strong>
                    <div class="col-md-12">
                        <div class="row">
                            <?php $__currentLoopData = $graphs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 text-center">
                                <a href="<?php echo e(asset('storage/'.$graph->graph)); ?>" target="_blank"><img src=" <?php echo e(asset('storage/'.$graph->graph)); ?>" width="100%" height="auto" style="object-fit:cover;" class="py-2"></a>
                                <a href="<?php echo e(route('removeGraph',$graph->id)); ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(sizeof($graphs) < 3): ?> <div class="col-md-4">
                                <a href="<?php echo e(url('graphs/create/'.$product->id)); ?>"><img src="<?php echo e(asset('assets/images/add-image.png')); ?>" class="py-2" alt="" width="25%"></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>video Link:</strong>
                <input type="text" name="video_link" class="form-control" placeholder="Video Link" value="<?php echo e($product->video_link); ?>">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <strong>Category</strong>
                <select type="text" name="category" class="form-control">
                    <option value="<?php echo e($product->category); ?>"><?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($cat->name); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></option>
                    <?php if($categories): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $dash = ''; ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                    <?php if(count($category->subcategory)): ?>
                    <?php echo $__env->make('category.subcategoryList-option',['subcategories' => $category->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" class="form-control" placeholder="Slug" value="<?php echo e($product->slug); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>model No:</strong>
                <input type="text" name="model_no" class="form-control" placeholder="Name" value="<?php echo e($product->model_no); ?>">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Title:</strong>
                <!-- <textarea class="form-control" rows="6" name="description" placeholder="Detail"><?php echo e($product->description); ?></textarea> -->
                <textarea name="metatitle" class="form-control"><?php echo e($product->metatitle); ?></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Meta Description:</strong>
                <!-- <textarea class="form-control" rows="6" name="description" placeholder="Detail"><?php echo e($product->description); ?></textarea> -->
                <textarea name="metadescription" rows="6" class="form-control"><?php echo e($product->metadescription); ?></textarea>
            </div>
        </div>
        <div class="image-upload-one">
            <strong>Change Image</strong>
            <div class="center">
                <div class="form-input">
                    <label for="file-ip-1">
                        <img id="file-ip-1-preview" src="<?php echo e(url('/storage/'.$product->image)); ?>" style=" height: auto; width:100%; padding: 10px;">
                    </label>
                    <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                </div>
                <div class="form-group">
                    <strong>Alt:</strong>
                    <input type="text" name="image_alt" class="form-control" value="<?php echo e($product->image_alt); ?>" placeholder="Alt">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="row">
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <a href="<?php echo e(asset('storage/'.$image->file_name)); ?>" target="_blank"><img class="py-2" src="<?php echo e(asset('storage/'.$image->file_name)); ?>" width="100%" style="object-fit:cover; height:10vh"></a>
                    <a href="<?php echo e(route('removeImage',$image->id)); ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(sizeof($images) < 4): ?> <div class="col-md-3">
                    <a href="<?php echo e(url('images/create/'.$product->id)); ?>"><img src="<?php echo e(asset('assets/images/add-image.png')); ?>" class="py-2" alt="" width="35%"></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">

</div>
</div>

</form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    CKEDITOR.replace('desc', {
        height: 400,
    });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/product/edit.blade.php ENDPATH**/ ?>