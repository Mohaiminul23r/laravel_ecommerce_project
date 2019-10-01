@extends('admin.layout')
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
		<div class="box-content">

	<script type="text/javascript">
		//datatable for showing categories	
		$(document).ready(function(){
		 $('#example').DataTable();
	});
	</script>
	
		</div>
	</div><!--/span-->
</div><!--/row-->
@endsection