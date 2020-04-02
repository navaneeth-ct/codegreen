<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-0"><?php echo e(auth()->user()->username); ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Born on <?php echo e(date('F j, Y', strtotime(auth()->user()->details->dob))); ?></li>
                            <li class="list-group-item">From <?php echo e(auth()->user()->details->city); ?></li>
                            <li class="list-group-item"><a href="mailto:<?php echo e(auth()->user()->details->email); ?>"><?php echo e(auth()->user()->details->email); ?></a></li>
                        </ul>
                        <div class="card-body">
                            <a href="<?php echo e(route('edit')); ?>" class="card-link">Edit</a>

                            <a href="<?php echo e(route('destroy')); ?>" class="card-link" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>
                            <form id="delete-form" method="POST" action="<?php echo e(route('destroy')); ?>" style="display: none;">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\My Files\Projects\Codegreen\resources\views/home.blade.php ENDPATH**/ ?>