 
<?php $__env->startSection('style'); ?>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
 <section class="content" style="padding:20px">
     <div class="row">
         <div class="col-md-6">
             <div class="box box-primary">

                 <form action="<?php echo e(route('category.update',$category->id)); ?>" method="post" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('PUT'); ?>
                     <div class="box-header with-border">
                         <h3 class="box-title">Edit Category</h3>
                     </div>

                     <div class="box-body">
                         <div class="row">
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Category name*</label>
                                     <input type="text" name="name" class="form-control" placeholder="Category name" value="<?php echo e($category->name); ?>" required />
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Category Slug*</label>
                                     <input type="text" name="slug" class="form-control" placeholder="Category slug" value="<?php echo e($category->slug); ?>" required />
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Category Description</label>
                                     <textarea name="desc" id="description" class="form-control" placeholder="Category description"><?php echo e($category->description); ?></textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Meta Title </label>
                                     <textarea name="meta_title" class="form-control" placeholder="Meta Title"><?php echo e($category->meta_title); ?></textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Meta Description</label>
                                     <textarea name="meta_content" class="form-control" placeholder="Meta description"><?php echo e($category->meta_content); ?></textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">

                                     <label>Select parent category*</label>
                                     <select type="text" name="parent_id" class="form-control">
                                         <?php if($category->parent_id!=""): ?>
                                         <option value="<?php echo e($category->parent_id); ?>">-<?php echo e($category->parent->name); ?>-</option>
                                         <?php else: ?>
                                         <option value="" selected disabled>Select a Category</option>
                                         <?php endif; ?>
                                         <?php if($parents): ?>
                                         <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php $dash = ''; ?>
                                         <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                         <?php if(count($cat->subcategory)): ?>
                                         <?php echo $__env->make('category.subcategoryList-option',['subcategories' => $cat->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

                    </div>  -->
             <div class="image-upload-one ">
                 <div class="center">
                     <div class="form-input">
                         <label for="file-ip-1">
                             <img id="file-ip-1-preview" src=" <?php echo e(asset('image/add-img-02.jpg')); ?>" style="cursor:pointer; height: 40vh; width:auto; margin: 2px;">
                         </label>
                         <input type="file" name="tumb" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                     </div>
                     <img src=" <?php echo e(asset('storage/'. $category->tumb)); ?>" style=" width:50%; margin: 2px;">
                     <div class="form-group">
                         <strong>Alt:</strong>
                         <input type="text" name="image_alt" value="<?php echo e($category->image_alt); ?>" class="form-control" placeholder="Alt">
                     </div>
                 </div>
             </div>
             </form>
         </div>

     </div>
 </section>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('script'); ?>
<script>
    CKEDITOR.replace('desc', {
        height: 400,
    });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/category/edit.blade.php ENDPATH**/ ?>