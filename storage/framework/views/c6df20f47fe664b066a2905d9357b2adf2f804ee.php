
<?php $__env->startSection('style'); ?>
<!-- <script src="https://cdn.tiny.cloud/1/w8f188m9n8lk28qvepfp9lmxz72dwrjdzpbkmpo19qbvkxn2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
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
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                <textarea class="form-control" rows="6" name="description" placeholder="next line using text'<br>'"></textarea>
            </div>
        </div> -->



            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <!-- <textarea name="description"></textarea> -->
                    <textarea name="desc"></textarea>
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option:</strong>
                <textarea class="form-control" rows="8" name="option" ></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>package:</strong>
                <textarea class="form-control" name="package" ></textarea>
            </div>
        </div> -->
        </div>
        <div class="col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>video_link:</strong>
                    <input type="text" name="video_link" class="form-control" placeholder="SRC CODE">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Category</strong>
                    <select type="text" name="category" class="form-control">
                        <option value="">None</option>
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
                    <strong>model_no:</strong>
                    <input type="text" name="model_no" class="form-control" placeholder="Name">
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div> -->
            <div class="image-upload-one px-4 ">
                <div class="center">
                    <div class="form-input">
                        <label for="file-ip-1">
                            <img id="file-ip-1-preview" src="<?php echo e(asset('image/add-img-02.jpg')); ?>" style=" height: auto; width:100%; margin: 2px;">
                        </label>
                        <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                    </div>

                    <div class="form-group">
                        <strong>Alt:</strong>
                        <input type="text" name="image_alt" class="form-control" placeholder="Alt">
                    </div>

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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/product/create.blade.php ENDPATH**/ ?>