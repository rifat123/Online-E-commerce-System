<?php $__env->startSection('middle'); ?>		
	<section>
		<div class="container mt-3" >
            <h2 class="text-center mb-3 col-sm-9 offset-sm-3">Features Items</h1>
			<div class="row">
                <?php if($count != 0): ?>				
				<div class="col-sm-3 pt-3 pl-3  rounded align-self-baseline" style="background-color:silver">
                    <?php for($i=0; $i<$count; $i++): ?>
                    <h5 class="text-center"><?php echo e(ucwords(str_replace('_', ' ', $fillName[$i]))); ?></h5>
                    <?php $new = explode("##", $filterArr[$i]); $t = 0; ?> 
                    <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input common_selector <?php echo e($fillName[$i]); ?>" id="<?php echo e($i.$t); ?>" value="<?php echo e($n); ?>">
                        <label class="custom-control-label" for="<?php echo e($i.$t); ?>"><?php echo e(ucfirst($n)); ?></label>
                    </div>
                    <?php $t++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                    <?php endfor; ?>
				</div><!--filter end-->
				<?php endif; ?>
				<div class="col-sm-9">											
				    <div class="row" id="filter_data">                    
                    </div> 					
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script>
	$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        <?php 
            for($i=0; $i<$count; $i++)
            {
                echo "var $fillName[$i] = get_filter('$fillName[$i]');";
            }
        ?>

        $.ajax({
            url:"/test/1",
            method:"POST",
            data:{
                <?php 
                    for($i=0; $i<$count; $i++)
                    {
                        echo "$fillName[$i]:$fillName[$i], ";
                    }
                    echo "table:'$table'";
                ?>                
            },
            success:function(data){
              $('#filter_data').html(data);
               //console.log(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    

});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>