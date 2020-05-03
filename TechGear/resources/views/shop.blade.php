@extends('layouts.main')

@section('middle')		
	<section>
		<div class="container mt-3" >
            <h2 class="text-center mb-3 col-sm-9 offset-sm-3">Features Items</h1>
			<div class="row">
                @if($count != 0)				
				<div class="col-sm-3 pt-3 pl-3  rounded align-self-baseline" style="background-color:silver">
                    @for($i=0; $i<$count; $i++)
                    <h5 class="text-center">{{ ucwords(str_replace('_', ' ', $fillName[$i])) }}</h5>
                    <?php $new = explode("##", $filterArr[$i]); $t = 0; ?> 
                    @foreach($new as $n)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input common_selector {{$fillName[$i]}}" id="{{$i.$t}}" value="{{$n}}">
                        <label class="custom-control-label" for="{{$i.$t}}">{{ ucfirst($n) }}</label>
                    </div>
                    <?php $t++; ?>
                    @endforeach
                    <hr>
                    @endfor
				</div><!--filter end-->
				@endif
				<div class="col-sm-9">											
				    <div class="row" id="filter_data">                    
                    </div> 					
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
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
@endsection