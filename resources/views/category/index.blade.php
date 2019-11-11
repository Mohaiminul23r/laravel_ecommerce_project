@extends('admin.layout')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
@endsection
@section('body')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add+
</button>
<!-- modal for adding category -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel" align="center">Add Product Category</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
        <div class="box-content">
		<form class="form-horizontal" method="POST" action="{{ url('categories') }}"> 
			{{ csrf_field() }}
			<fieldset>
			  <div class="control-group">
				<label class="control-label" for="cat_name"><b>Category Name:</b></label>
				<div class="controls">
				  <input class="input-xlarge focused" id="cat_name" type="text" name="cat_name" placeholder="enter category name">
				</div>
			  </div>
			  <div class="control-group hidden-phone">
			  <label class="control-label" for="description"><b>Description:</b></label>
			  <div class="controls">
				<textarea class="cleditor" id="cat_description" name="cat_description" placeholder="Type the category description here..." rows="3"></textarea>
			  </div>
			</div>
			 <div class="control-group">
				<label class="control-label" for="status"><b>Category Status:</b></label>
				<div class="controls">
				  <label class="checkbox">
					<input type="checkbox" id="status"  name="status" value="1">
					Available
				  </label>
				  <label class="checkbox">
					<input type="checkbox" id="status"  name="status" value="0">
					Not Available
				  </label>
				</div>
			  </div>
			  <div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <button type="reset" class="btn" data-dismiss="modal">Cancel</button>
			  </div>
			</fieldset>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>List of all Categories</h2>
		</div>
		<div>
			<p class="alert-success">
				<?php
					$message = Session::get('message');
					echo $message;
					if($message){
						Session::put('message', null);
					}
				?>
			</p>
		</div>
		<div class="box-content">
			<table class="table table-striped" id="cat-table" align="center">
			  <thead>	
				  <tr>
					  <th style="text-align:center;">SL</th>
					  <th style="text-align:center;">Cat. Name</th>
					  <th style="text-align:center;">Description</th>
					  <th style="text-align:center;">Status</th>
					  <th style="text-align:center;">Action</th>
				  </tr>
			  </thead>
			  <tbody>  	
				  <?php 
			  		$i = 1;
			  	   ?>
				  @foreach($categories as $category)
				  <tr>
					  <td style="text-align:center;">{{ $i++ }}</td>
					  <td style="text-align:center;">{{$category->cat_name}}</td>
					  <td style="text-align:center;">{{$category->description}}</td>
					  @if($category->status == 1)
					   <td style="text-align:center;">Active</td>
					   @else 
					   <td style="text-align:center;">Inactive</td>
					   @endif
					  <td style="text-align:center;">
				  	 	<a class="btn btn-primary" href="">
							<i class="halflings-icon white zoom-in"></i>  
						</a>
						<a class="btn btn-info" href="{{ route('categories.edit', $category->id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="#">
							<i class="halflings-icon white trash"></i> 
						</a>
					  </td>
				  </tr>
				  @endforeach  
			   </tbody>
		  </table>            	
		</div>
	</div><!--/span-->
</div><!--/row-->
@endsection
@section('javascripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script>
	$(document).ready( function () {
    $('#cat-table').DataTable();
} );
</script>
@endsection

