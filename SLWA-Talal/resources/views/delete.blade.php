@extends('layouts.app')

@section('content')


<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/template/css/util.css">
	<link rel="stylesheet" type="text/css" href="/template/css/main.css">
<!--===============================================================================================-->
	

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
                
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1"></th>
								<th class="column100 column3" data-column="column3"></th>
								<th class="column100 column4" data-column="column4">Start</th>
								<th class="column100 column5" data-column="column5"></th>
								<th class="column100 column6" data-column="column6">End</th>
								<th class="column100 column8" data-column="column8"></th>
							</tr>
						</thead>
						<tbody>
                            <!-- foreach loop should be here -->
                            @foreach($event as $item)
                            <form method="PUT" action="/home/delete2/{{$item->id}}" enctype="multipart/form-data">
							<tr class="row100">
								<td class="column100 column1" data-column="column1">{{$item->title}}</td>
								<td class="column100 column3" data-column="column3"></td>
								<td class="column100 column4" data-column="column4">{{$item->start}}</td>
								<td class="column100 column5" data-column="column5"></td>
								<td class="column100 column6" data-column="column6">{{$item->end}}</td>
								<td class="column100 column8" data-column="column8"> <input type="submit" value="Delete"></input> </td>
                            </tr>
                            </form>
                            @endforeach
						</tbody>
                    </table>
                
				</div>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="template/js/main.js"></script>


	@endsection