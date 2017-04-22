@extends('app')

@section('body')

	<div class="row">
		<h1 class="text-center">To Do List With Laravel</h1>
	</div>

	<div class="row">

		<div class="btn-group">
			<button type="button" class="btn btn-success new-item" data-toggle="modal" data-target="#create-item">
			Add New Item
			</button>
			<button type="submit" class="btn btn-default new-item" id="refresh">
			<i class="fa fa-refresh" aria-hidden="true"></i>
			</button>
		</div><br>

		<div id="table-loader" style="display: none">
			<div class="col-md-12">
		    	<div class="no-items loader-height">
					<div class="no-items-wrapper">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			</div>
		</div>
		<div class="table-container">
			@include('lists.table')
		</div>

		<!-- Create item modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Create item</h4>
					</div>
					<form action="lists" method="post" id="store-form">
						<div class="modal-body">
							<label for="title">Title</label>
							<input type="text" class="form-control" name="title" id="store-title">

							<label for="item">Item body</label>
							<textarea name="item" class="form-control" id="store-item" rows="6"></textarea>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" id="store-submit">Create Item</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Update item modal -->
		<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update item</h4>
					</div>
					<div class="modal-body" id="edit-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<form method="post" id="update-form">
					{{ method_field('PATCH') }}
					<input type="hidden" name="id" id="update-id">
						<div class="modal-body">
							<label for="title">Title</label>
							<input type="text" class="form-control" name="title" id="update-title">

							<label for="item">Item body</label>
							<textarea name="item" class="form-control" id="update-item" rows="6"></textarea>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success"  id="update-submit">Update Item</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Show item modal -->
		<div class="modal fade" id="show-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Show item</h4>
					</div>
					<div class="modal-body" id="show-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<div class="modal-body" id="view-data">
						<strong id="view-title">Title</strong>
						<br><strong id="view-item">Item body</strong>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

				<!-- Destroy item modal -->
		<div class="modal fade" id="destroy-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Destroy item</h4>
					</div>
					<div class="modal-body" id="destroy-loading-bar">
						<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active loading-bar" role="progressbar" aria-valuenow="100">
						</div>
						</div>
					</div>
					<div class="modal-body" id="remove-data">
						<h3 class="text-center">☣ Are you sure want to delete this item ☣</h3>
					</div>
					<div class="modal-footer">
						<form method="post" id="remove-form">
							{{ method_field('DELETE') }}
							<input type="hidden" name="id" id="remove-id">
							<button type="submit" class="btn btn-danger">Delete Item</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection