 @extends('admin.admin_master')
@section('main_content')

 {{-- Add About form here  --}}

            	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Product</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Heading1<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading1" class="form-control"  value="{{$products->heading1}}"  > 
		@error('heading')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	<div class="form-group">
        <h5>Heading2<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading2" class="form-control"  value="{{$products->heading2}}"  > 
		@error('heading')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>

	
    <div class="form-group">
        <h5>Description<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="desp"  class="form-control"  value="{{$products->desp}}"  > 
	@error('desp')
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