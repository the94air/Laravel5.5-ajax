@extends('app')

@section('body')

<a href="https://github.com/the94air/Laravel-ajax" target="_blank" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#333333; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

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