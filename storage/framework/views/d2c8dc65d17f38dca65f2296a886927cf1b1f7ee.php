

<?php $__env->startSection('content'); ?>
<section class="content" style="padding:20px 30%;">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <form role="form" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="box-header with-border">
                        <h3 class="box-title">Create Category</h3>
                    </div>


                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category name" value="<?php echo e(old('name')); ?>" required />
                                </div>
                            </div>
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Category Slug*</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Category name" value="<?php echo e(old('slug')); ?>" required />
                                </div>
                            </div>
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Category Description*</label>
                                    <textarea name="description" class="form-control" placeholder="Category description"><?php echo e(old('description')); ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control">
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
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save & Publish</button>
                            </div>

                        </div>
                    </div>


                    <?php if($errors->any()): ?>
                    <div>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="alert alert-danger"><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                    <?php if(\Session::has('error')): ?>
                    <div>
                        <li class="alert alert-danger"><?php echo \Session::get('error'); ?></li>
                    </div>
                    <?php endif; ?>

                    <?php if(\Session::has('success')): ?>
                    <div>
                        <li class="alert alert-success"><?php echo \Session::get('success'); ?></li>
                    </div>
                    <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 py-5">
            <!-- <div class="col-sm-12">
                        <div class="form-group">
                            <label>tumb image*</label>
                            <input type="file" name="tumb" class="form-control" placeholder="" value="" required />
                        </div>

                    </div> -->
            <div class="image-upload-one ">
                <div class="center">
                    <div class="form-input">
                        <label for="file-ip-1">
                            <img id="file-ip-1-preview" src="<?php echo e(asset('image/add-img-02.jpg')); ?>" style=" height: 40vh; width:auto; margin: 2px;">
                        </label>
                        <input type="file" name="tumb" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                    </div>
                    <div class="form-group">
                        <strong>Alt:</strong>
                        <input type="text" name="image_alt" value="" class="form-control" placeholder="Alt">
                    </div>
                </div>
            </div>


            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/category/create-category.blade.php ENDPATH**/ ?>