		@if (count($lists) > 0)
			<table class="table table-striped">
				<thead>
					<th class="text-center">#</th>
					<th class="text-center">Title</th>
					<th class="text-center">Created At</th>
					<th class="text-center">Updated At</th>
					<th class="text-center"></th>
					<th class="text-center"></th>
				</thead>
				<tbody>
					@foreach($lists as $list)
						<tr>
							<th class="text-center">{{ $list->id }}</th>
							<td class="text-center">{{ substr($list->title, 0, 60) }} {{ strlen($list->title) > 60 ? '...': '' }}</td>
							<td class="text-center col-xs-2"">{{ $list->created_at->diffForHumans() }}</td>
							@if($list->updated_at->eq($list->created_at))
								<td class="text-center col-xs-2">---</td>
							@else
								<td class="text-center col-xs-2">{{ $list->updated_at->diffForHumans() }}</td>
							@endif
							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="btn btn-primary btn-block btn-sm edit-btn" data-toggle="modal" data-target="#edit-item">
								Edit Item
								</button>
							</td>
							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="btn btn-info btn-block btn-sm show-btn" data-toggle="modal" data-target="#show-item">
								View Item
								</button>
							</td>
							<td class="text-center col-xs-1">
								<button type="button" value="{{ $list->id }}" class="btn btn-danger btn-block btn-sm remove-btn" data-toggle="modal" data-target="#destroy-item">
								Delete Item
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
	    	<hr>
	    	<div class="no-items">
				<div class="no-items-wrapper">
					<h1 class="text-center cup">☕️</h1>
					<h4 class="text-center">Great, You have no thing to do. Just take a cub of tea</h4>
				</div>
			</div>
		@endif