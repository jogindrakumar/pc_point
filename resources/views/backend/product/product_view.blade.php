@extends('admin.admin_master')
@section('main_content')


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">About</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Heading</th>
								<th>Desp</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                           
                                
                          
<tr>
	@foreach ($abouts as $about )
		
	
	<td><img src="{{asset($about->img)}}" alt="" style="width:70px; height:40px;"></td>
	<td>{{$about->heading}}</td>
	<td>{{$about->desp}}</td>
	
	
	
<td width="20%">
<a href="{{route('about.edit',$about->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('about.delete',$about->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
</td>
      @endforeach      
        </tr>
         
							
						</tbody>
					
					  </table>
					</div>
				</div>
				
			  </div>
			        
			</div>



           
  

@endsection