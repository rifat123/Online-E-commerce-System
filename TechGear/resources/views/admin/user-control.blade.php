@extends('layouts.admin-main')

@section('middle')
    <div class="container">
          <div class="row mt-4">
              <div class="col-12 pt-1">
                  <h4 class="text-center text-danger">Data of Users<a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
              </div>          
          </div>

      </br>
      <div class="row">
    		<div class="col-12">
    			<table class="table table-dark">
  					<thead>
    					<tr>
      						<th scope="col">#</th>
      						<th scope="col">Name</th>
      						<th scope="col">Email</th>
      						<th scope="col">Password</th>
      						<th scope="col">Address</th>
      						<th scope="col">Operations</th>
    					</tr>
  					</thead>
  					<tbody>
  						@foreach($user as $u)
    					<tr>
      						<td>{{$u->id}}</td>
      						<td>{{$u->name}}</td>
      						<td>{{$u->email}}</td>
      						<td>
                    <span id="user{{$u->id}}"><?php $length = strlen($u->password); for($i=0; $i<$length; $i++) echo "*"; ?></span>
                    <button class="btn btn-sm text-info float-right pass_show_hide" show="yes" spanId="user{{$u->id}}" value="{{$u->password}}" value1="<?php for($i=0; $i<$length; $i++) echo "*"; ?>"><i class="fas fa-eye"></i></button>
                  </td>
      						<td>{{$u->address}}</td>
      						<td>
      							<a href="/admin/user-control/edit/{{$u->id}}" class="btn btn-sm btn-primary">Edit</a>
      							<button type="button" class="btn btn-sm btn-danger btn-del" value="{{$u->id}}" data-toggle="modal" data-target="#myModal">Delete</button>
      						</td>
    					</tr>
    					@endforeach					
  					</tbody>
				</table>
    		</div>
    	</div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h4 class="modal-title" id="myModalLabel">Are You Really Delete the User</h4>
          </div>
          <form action="/admin/user-control" method="post">
              {{csrf_field()}}
            <div class="modal-footer">
              <input type="hidden" id="user-id" name="uid" value="">
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

        $('.btn-del').click(function(){
          $("#user-id").val($(this).val());
          //console.log($(this).val());
        });

        $('.pass_show_hide').click(function(){
          var value = $(this).val();
          var spanId = $(this).attr('spanId');
          var value1 = $(this).attr('value1');
          var show = $(this).attr('show');
          
          if(show == "yes")
          {
            $('#'+spanId).text(value);
            $(this).attr('show', 'no')
          }          
          else
          {
            $('#'+spanId).text(value1);
            $(this).attr('show', 'yes')
          }
        });

      });
  </script>>
@endsection