@extends('layouts.admin-main')

@section('title')
    <title>Add Product | <?php echo ucfirst($scs);?></title>
@endsection

@section('middle')
    <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12 pt-1">
            <h4 class="text-center text-danger mb-3">Add a Product For <?php echo ucfirst($scs);?><a href="/admin/home-control/add-data/<?php echo $scs;?>" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
          </div>          
        </div>
    </div>
    
    </br>
    <div class="container-fluid">
      <div class="row">
        <div class="table-responsive">
          <table class="table table-dark table-bordered table-hover">
            <thead>
              <tr style="white-space: nowrap">
                  @foreach($columns as $c)
                  <th scope="col">{{ucWords(str_replace('_', ' ', $c->Column_Name))}}</th>
                  @endforeach 
                  <th scope="col">Operation</th>
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

                  @if($cs == 0)
                  <td>
                    <a href="/admin/home-control/add-data/<?php echo $scs; ?>/<?php echo $table; ?>/{{$d->Id}}" class="btn btn- btn-success btn-block"><i class="fas fa-plus"></i></a>
                  </td>
                  @endif
                  @if($cs == 1)
                  <td>
                    <form method="POST">
                      <input type="hidden" name="Id" value="{{$d->Id}}">
                      <button class="btn btn-success btn-block"><i class="fas fa-plus"></i></button>
                    </form>
                  </td>
                  @endif
                  @if($cs == 2)
                  <td> 
                    <a href="/admin/home-control/add-data-to/static/<?php echo $table.'_'.$d->Id; ?>" class="btn btn- btn-success btn-block"><i class="fas fa-plus"></i></a>
                  </td>
                  @endif
              </tr>
              @endforeach         
            </tbody>
        </table>
        </div>
      </div>
    </div>
@endsection