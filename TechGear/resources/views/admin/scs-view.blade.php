@extends('layouts.admin-main')

@section('middle')
    <div class="container">
        <div class="row mt-4">
          <div class="col-12 pt-1">
            <h4 class="text-center text-danger">Delete Data of <?php echo ucwords($scs);?><a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
          </div>          
        </div>
    </div>
    </br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <table class="table table-dark">
            <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Table Name</th>
                  <th scope="col">Product Id</th>
                  <th scope="col"><?php if($scs == "slider" || $scs == "static"){echo "Picture";} ?></th>
                  <th scope="col"><?php if($scs == "static"){echo "Info";} ?></th>
                  <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $d)
              <tr>
                  <td>{{$d->Id}}</td>
                  <td>{{$d->Table_Name}}</td>
                  <td>{{$d->Product_Id}}</td>
                  <td> 
                      @if($scs == "slider")
                      
                        <img src="{{$d->Picture}}" alt="No image" height=39 width=120>
                      @endif 
                      @if($scs == "static")
                      
                        <img src="{{$d->Picture}}" alt="No image" height=79 width=120>
                      @endif                    
                  </td>
                  <td>
                    @if($scs == "static")
                    {{$d->Info}}
                    @endif
                  </td>
                  <td><button class="btn btn-danger btn-del btn-block" value="{{$d->Id}}" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i></button></td>
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
            <h4 class="modal-title" id="myModalLabel">Are You Really Delete This</h4>
          </div>
          <form action="/admin/home-control/delete-data/<?php echo $scs; ?>" method="post">
              {{csrf_field()}}
            <div class="modal-footer">
              <input type="hidden" id="scs-id" name="scsId" value="">
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
          $("#scs-id").val($(this).val());
          //console.log($(this).val());
        });
      });
  </script>
@endsection