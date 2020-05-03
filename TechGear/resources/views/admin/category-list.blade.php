@extends('layouts.admin-main')

@section('title')
	<title>Disable | Category</title>
@endsection

@section('middle')
	<div class="container">
		<div class="row mt-2 mb-3">
		  <div class="col-12 pt-1">
		    <a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a>
		  </div>          
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-10 mx-auto">
				<h4 class="text-center text-info mb-3">Category List</h4>
			</div>
		</div>
		<div class="row">
			<div class="col-10 mx-auto ">
				<div class="table-responsive">				
					<table class="table table-hover table-dark table-sm">
					  <thead>
					    <tr style="white-space: nowrap">
					      <th scope="col">#</th>
					      <th scope="col">Parent Category</th>
					      <th scope="col">Child Category</th>
					      <th scope="col">Handle</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php $i=1; ?>
					  	@foreach($result as $res)
					    <tr style="white-space: nowrap">
					      <th>{{$i}}</th>
					      
					      @if(is_numeric($res->Category))
					      <td></td>
					      @else
					      <td>{{ucwords($res->Category)}}</td>
					      @endif

					      <td>{{ucwords(str_replace('_',' ',$res->Table_Name))}}</td>
					      
					      @if($res->Deleted == null)
					      
					      	<td><button class="btn btn-danger btn-sm btn-block disable" value="{{$res->Id}}">Disable</button></td>
					      	@else
					      	<td><button class="btn btn-success btn-sm btn-block enable" value="{{$res->Id}}">Enable</button></td>
					      	@endif
					      
					    </tr>
					    <?php $i++; ?>
					    @endforeach
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			
			$('.disable').click(function(){
				var id = $(this).val();				
				console.log(id);
				$.ajax({
					url: "/test/3",
					method: "POST",
					data: {id:id, opt:'disable'},
					success: function(result){						
						if(result == "fine")
						{
							location.reload();
						}
					}
				});
			});

			$('.enable').click(function(){
				var id = $(this).val();				
				console.log(id);
				$.ajax({
					url: "/test/3",
					method: "POST",
					data: {id:id, opt:'enable'},
					success: function(result){						
						if(result == "fine")
						{
							location.reload();
						}
					}
				});
			});

		});
	</script>
@endsection