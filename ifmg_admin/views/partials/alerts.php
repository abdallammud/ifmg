<?php if (Session::has('error')): ?>
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl">
        <?php echo Session::flash('error'); ?>
    </div>
<?php endif; ?>

<?php if (Session::has('success')): ?>
    <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl">
        <?php echo Session::flash('success'); ?>
    </div>
<?php endif; ?>