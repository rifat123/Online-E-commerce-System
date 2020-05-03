@extends('layouts.user-main')

@section('title')
	<title>My Address Book</title>
@endsection

@section('main')
	<h5 class="text-center">Address Book Entries <a href="/user/add-address/ab" class="btn btn-sm btn-info float-right">New Address</a></h5>
	</br>
	<table class="table table-bordered">
		<tbody>
			@foreach($address as $ua)
	    	<tr style="font-size:13.5px">
	      		<td>
	      			<?php 
	      				if($ua->name != null) {echo"$ua->name</br>";}
	      				if($ua->company != null) {echo"$ua->company</br>";}
	      				if($ua->address_1 != null) {echo"$ua->address_1</br>";}
	      				if($ua->address_2 != null) {echo"$ua->address_2</br>";}
	      				if($ua->thana != null) {echo"$ua->thana</br>";}
	      				if($ua->district != null) {echo"$ua->district</br>";}
	      				if($ua->division != null) {echo"$ua->division</br>";}
	      				if($ua->post_code != null) {echo"$ua->post_code";}
	      			?>
	      		</td>
	      		<td>
	      			@if($ua->default_address != null)
	      			Default Shipping Address
	      			@endif
	      		</td>
	      		<td>
	      			<a href="/user/address-book/ab/{{$ua->id}}" class="btn btn-sm btn-primary">Edit</a>
      				<button type="button" class="btn btn-sm btn-danger btn-del" value="{{$ua->id}}" data-toggle="modal" data-target="#myModal">Delete</button>
	      		</td>
	    	</tr>
	    	@endforeach
		</tbody>
	</table>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h4 class="modal-title" id="myModalLabel">Are You Sure Delete the Address</h4>
          </div>
          <form action="/user/address-book" method="post">
            <div class="modal-footer">
              <input type="hidden" id="address-id" name="aid" value="">
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
          $("#address-id").val($(this).val());
          //console.log($(this).val());
        });
      });
  </script>>
@endsection