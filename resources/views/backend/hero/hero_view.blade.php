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
				  <h3 class="box-title">Hero Section</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Heading1</th>
								<th>Heading2</th>
								<th>Heading3</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                           
                                
                          
<tr>
	@foreach ($heros as $hero )
		
	
	<td><img src="{{asset($hero->img)}}" alt="" style="width:70px; height:40px;"></td>
	<td>{{$hero->heading1}}</td>
	<td>{{$hero->heading2}}</td>
	<td>{{$hero->heading3}}</td>
	
	
	
	
<td width="20%">
<a href="{{route('hero.edit',$hero->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('hero.delete',$hero->id)}}" class="btn btn-danger btn-sm" id="delete" onclick="confirm('Are you sure ? want to Delete ?')" title="Delete Data"><i class="fa fa-trash"></i></a>
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