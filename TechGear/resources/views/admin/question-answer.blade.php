@extends('layouts.admin-main')

@section('title')
	<title>Questions Answers</title>
@endsection

@section('middle')
	<div class="container">
		<div class="row mt-2 mb-3">
			<div class="col-12  px-0">
		    	<h5 class="text-center">Question And Answers<a href="/admin/home" class="float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h5>
		  	</div>          
		</div>				
	</div>
	<div class="container-fluid">
		@if($opt == "new")
		<table class="table table-sm table-bordered  table-secondary table-striped">
		@else
		<table class="table table-sm table-bordered  table-secondary table-striped table-responsive">
		@endif
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>User Type</th>
					<th>Image</th>
					<th>Product</th>
					<th>Question</th>
					<th>Q DateTime</th>
					<th>Answer</th>
					<th>A DateTime</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($questionAnswer as $qa)
				<tr>
					<td>{{$qa->Id}}</td>
					<td>{{$qa->name}}</td>
					<td>{{$qa->email}}</td>
					<td>{{$qa->user_type}}</td>
					<td>
						<a href="/component/{{$qa->table_name}}/{{$qa->pid}}">
							<img src="{{$qa->picture}}" alt="No Image" height=50 width=50 class="border border-dark">
						</a>	
					</td>
					<td>
						<a href="/component/{{$qa->table_name}}/{{$qa->pid}}" style="text-decoration:none;color:seagreen">{{$qa->title}}</a>
					</td>
					<td>{{$qa->question}}</td>
					<td>{{$qa->qdate}} {{$qa->qtime}}</td>
					<td>
						@if($qa->answer != NULL)
						{{$qa->answer}}
						@else
						<button class="btn btn-sm btn-warning btn-rr btn-block"  op_id="{{$qa->Id}}" question="{{$qa->question}}" data-toggle="modal" data-target="#myModal">Answer</button>
						@endif
					</td>
					<td>{{$qa->adate}} {{$qa->atime}}</td>
					<td>
						<button class="btn btn-danger btn-del btn-block" value="{{$qa->Id}}" data-toggle="modal" data-target="#myModalDel"><i class="fas fa-trash-alt"></i></button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>				
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<div class="modal-dialog" role="document">
        	<div class="modal-content">
          		<div class="modal-header">
          			<h4 class="modal-title" id="myModalLabel">My Answer</h4>
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            			<span aria-hidden="true">&times;</span>
            		</button>
          		</div>
          		<div class="modal-body">
          			<form action="/admin/qa/add-answer" method="POST">
          				<p class="text-info" id="quMod"></p>        				
          		    	<textarea class="form-control mt-2" name="answer" placeholder="Write Your Answer" minlength="1" maxlength="150"></textarea>
          		    	<small class="form-text text-danger font-weight-bold font-italic">Note: Once You Submit, You can't change your dicision in future.</small>
          		    	<input type="hidden" name="op_id" id="op_id">         	
          		    	<hr class="row">
          		    	<button class="btn btn-secondary float-right" data-dismiss="modal">Close</button>
          		    	<button type="submit" class="btn btn-primary float-">Submit</button>
          		    </form>
          		</div>      
        	</div>
      	</div>
    </div>

    <div class="modal fade" id="myModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h4 class="modal-title" id="myModalLabel">Are You Really Delete This</h4>
          </div>
          <form action="/admin/qa/del-answer" method="post">
            <div class="modal-footer">
              <input type="hidden" id="scs-id" name="scsId">
              <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>  
@endsection

@section('script')
	<script>
		$(document).ready(function(){

			$('.btn-rr').click(function(){
				var op_id = $(this).attr('op_id');
				var question = $(this).attr('question');
				$('#op_id').val(op_id);			
				$('#quMod').text(question);			
			});

			$('#myModal').on('hidden.bs.modal', function (e) {
            	$(this).find('form').trigger('reset');
			});

			$('.btn-del').click(function(){
			  $("#scs-id").val($(this).val());
			});

		});
	</script>	
@endsection