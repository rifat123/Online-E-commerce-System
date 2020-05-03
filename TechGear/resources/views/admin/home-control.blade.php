@extends('layouts.admin-main')

@section('middle')
<div class="container">
  	<div class="row">
    	<div class="col-12 p-3 mb-2">
      		<h4 class="text-center text-danger">This is the Home Control Panel Where You Customize Home</h4>
    	</div>
  	</div>
    </br></br>

    <div class="row" style="height:350px">
    	<div class="text-center col-4 bg-secondary text-white">
      	</br><h5 class="text-white">Slider Control</h5>
    		</br><a href="/admin/home-control/add-data/slider" type="submit" class="btn-block btn  btn-info">Add Data to Slider</a>
    		</br><a href="/admin/home-control/delete-data/slider" type="submit" class="btn-block btn  btn-info">Delete Data of Slider</a>
    		<!-- </br><button type="submit" class="btn-block btn  btn-info">Disable Slider</button> -->
        </br></br>
        @if (session('hMessage'))
        <div class="text-center alert alert-success">
          {{ session('hMessage') }}
        </div>
        @endif
      </div>

    	<div class="col-4  bg-dark text-white">
      		</br><h5 class="text-center text-white">Collection Control</h5>
    		</br><a href="/admin/home-control/add-data/collection" type="submit" class="btn-block btn  btn-info">Add Data to Collection</a>
    		</br><a href="/admin/home-control/delete-data/collection" type="submit" class="btn-block btn  btn-info">Delete Data of Collection</a>
    		<!-- </br><button type="submit" class="btn-block btn  btn-info">Disable Collection</button> -->
        </br></br>
        @if (session('cMessage'))
        <div class="text-center alert alert-success">
          {{ session('cMessage') }}
        </div>
        @endif
    	</div>

    	<div class="col-4 bg-secondary text-white">
      		</br><h5 class="text-center text-white">Static Image Control</h5>
      	</br><a href="/admin/home-control/add-data/static" type="submit" class="btn-block btn  btn-info">Add Data to Static</a>
    		</br><a href="/admin/home-control/delete-data/static" type="submit" class="btn-block btn  btn-info">Delete Data of Static</a>
    		<!-- </br><button type="submit" class="btn-block btn  btn-info">Disable Static</button> -->
        </br></br>
        @if (session('sMessage'))
        <div class="text-center alert alert-success">
          {{ session('sMessage') }}
        </div>
        @endif
    	</div>
	</div>
</div>
@endsection