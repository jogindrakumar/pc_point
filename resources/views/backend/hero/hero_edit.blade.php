 @extends('admin.admin_master')
@section('main_content')

 {{-- Add About form here  --}}

            	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Hero</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('hero.update',$heros->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      
     <div class="form-group">
        <h5>Heading1<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading1" class="form-control"  value="{{$heros->heading1}}"  > 
		@error('heading1')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	<div class="form-group">
        <h5>Heading2<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading2" class="form-control"  value="{{$heros->heading2}}"  > 
		@error('heading2')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
		<div class="form-group">
        <h5>Heading3<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading3" class="form-control"  value="{{$heros->heading3}}"  > 
		@error('heading3')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
		<div class="form-group">
        <h5>Heading4<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading4" class="form-control"  value="{{$heros->heading4}}"  > 
		@error('heading4')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	<div class="form-group">
		<img src="" alt="">
	</div>

	<input type="hidden" name="old_img" value="{{$heros->img}}">
	<div class="form-group">
        <h5>Image<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img"  class="form-control"  value="{{$heros->img}}"  > 
	@error('img')
		<span class="text-danger">{{$message}}</span>
		@enderror
	</div>
    </div>
	

    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-warning mb-5" value="Update">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>
      @endsection