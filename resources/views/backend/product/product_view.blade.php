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
				  <h3 class="box-title">product</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Heading1</th>
								<th>Heading2</th>
								<th>Desp</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>                      
<tr>
	@foreach ($products as $product )
		
	

	<td>{{$product->heading1}}</td>
	<td>{{$product->heading2}}</td>
	<td>{{$product->desp}}</td>
	
	
	
<td width="20%">
<a href="{{route('product.edit',$product->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('product.delete',$product->id)}}" class="btn btn-danger btn-sm" id="delete" onclick="confirm('Are you sure ? want to Delete ?')" title="Delete Data"><i class="fa fa-trash"></i></a>
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