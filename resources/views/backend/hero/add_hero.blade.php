 @extends('admin.admin_master')
@section('main_content')

 {{-- Add About form here  --}}

            	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Hero</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('hero.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Heading1<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading1" class="form-control"  value=""  > 
		@error('heading1')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	<div class="form-group">
        <h5>Heading2<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading2" class="form-control"  value=""  > 
		@error('heading2')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
		<div class="form-group">
        <h5>Heading3<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading3" class="form-control"  value=""  > 
		@error('heading3')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
		<div class="form-group">
        <h5>Heading4<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading4" class="form-control"  value=""  > 
		@error('heading4')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	<div class="form-group">
        <h5>Image<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img"  class="form-control"  value=""  > 
	@error('img')
		<span class="text-danger">{{$message}}</span>
		@enderror
	</div>
    </div>

    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>
      @endsection