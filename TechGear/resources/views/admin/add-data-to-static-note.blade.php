@extends('layouts.admin-main')

@section('middle')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 pt-1">
                <h4 class="text-center text-danger">Add Note To Static<a href="/admin/home" class=" float-right btn btn-danger btn-sm"><i class="fas fa-backward"> Back</i></a></h4>
            </div>          
        </div>        
        </br>
        <div class="row">
            <?php if(isset($data)){ ?>
            <div class="col-7 bg-dark p-5 offset-1">
            <?php } ?>
            <?php if(!isset($data)){ ?>
            <div class="col-12 bg-dark p-5">
            <?php } ?>                
                <?php if(isset($data)){ ?>
                @foreach($data as $d)
                <h6 class="text-white">Title: {{$d->Title}}</h6>
                <h6 class="text-white">Brand: {{$d->Brand}}</h6>
                @endforeach
                </br>
                <?php } ?>

                <form method="POST" enctype="multipart/form-data">
                    <?php if(!isset($data)){ ?>
                        <h5 class="text-danger mb-0">****</h5>
                        <textarea style="width:100%;" rows="7" name="note"  placeholder="Type your note..." required></textarea>
                    <?php } ?>

                    <div class="text-success mt-2" style="width:220px">
                        <h5 class="text-danger mb-0">****</h5>
                        <input type="file" class="form-control-file" name="picture" accept="image/png,image/jpeg,image/gif" required>
                    </div>
                    <small class="form-text text-warning">File type should be JPEG or PNG and size should be 371x245</small>
                    </br>
                    <div>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>

                @if ($errors->any())
                </br>
                <div>
                    @foreach ($errors->all() as $error)
                    <h6 class="text-danger">{{ $error }}</h6>
                    @endforeach                    
                </div>
                @endif
            </div>

            <?php if(isset($data)){ ?>
            <div class="col-3 p-1 bg-dark">
                @foreach($data as $d)
                <image src="{{$d->Picture_1}}" class="img-fluid">
                @endforeach
            </div>
            <?php } ?>
        </div>
    </div>
@endsection