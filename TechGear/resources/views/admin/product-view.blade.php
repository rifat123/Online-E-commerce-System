@extends('layouts.admin-main')

@section('title')
    <title>View Product</title>
@endsection

@section('middle')
    <div class="container-fluid">
          <div class="row mt-4">
            <div class="col-12 pt-1">
              <h4 class="text-center text-danger mb-3">Products of <?php echo ucfirst($table);?><a href="/admin/product-control/vud-product" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
            </div>          
          </div>

      </br>
      <div class="row">
    		<div class="table-responsive">
    			<table class="table table-dark table-bordered">
  					<thead>
    					<tr style="white-space: nowrap">
                  @foreach($columns as $c)
      						<th scope="col">{{ucWords(str_replace('_', ' ', $c->Column_Name))}}</th>
                  @endforeach 
                  <th scope="col">Action</th>
    					</tr>
  					</thead>
  					<tbody>
  						@foreach($data as $d)
    					<tr style="white-space: nowrap">
                  @foreach($columns as $c)
                  <?php $temp = $c->Column_Name; $lol = $d->$temp;?>
      						@if($c->Column_Type == 'file')
                    @if($lol != null)
                      <td><img src="{{ $lol }}" alt="No Image" height=50 width=50></td>
                    @else
                      <td></td>
                    @endif
                  @else
                  <td>{{ $lol }}</td>
                  @endif
      						@endforeach

                 
      						<td>
      							<a href="/admin/product-control/edit/<?php echo $table; ?>/{{$d->Id}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
      						  <button type="button" class="btn btn-sm btn-danger btn-del" value="{{$d->Id}}" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i></button>
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
            <h4 class="modal-title" id="myModalLabel">Are You Really Delete this</h4>
          </div>
          <form action="/admin/product-control/view-product/<?php echo $table; ?>" method="post">
              {{csrf_field()}}
            <div class="modal-footer">
              <input type="hidden" id="product-id" name="pid" value="">
              <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </form>
        </div>
      </div>
@endsection

@section('script')
  <script>
      $(document).ready(function(){
        $('.btn-del').click(function(){
          $("#product-id").val($(this).val());
          //console.log($(this).val());
        });
      });
  </script>>
@endsection