 @extends('admin.admin_master')
@section('main_content')

 {{-- Add About form here  --}}

            	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit About</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('about.update',$abouts->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Heading<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading" class="form-control"  value="{{$abouts->heading}}"  > 
		@error('heading')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	

	
    <div class="form-group">
        <h5>Description<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="desp"  class="form-control"  value="{{$abouts->desp}}"  > 
	@error('desp')
		<span class="text-danger">{{$message}}</span>
		@enderror
	</div>
    </div>
	<input type="hidden" name="old_img" value="{{$abouts->img}}">
    <div class="form-group">
        <img src="{{asset($abouts->img)}}" alt="" style="height: 50px; width:50px;" >
    </div>
	<div class="form-group">
        <h5>Image<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img"  class="form-control"  value="{{$abouts->img}}"  > 
	@error('img')
		<span class="text-danger">{{$message}}</span>
		@enderror
	</div>
    </div>

    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="update ">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>
      @endsection