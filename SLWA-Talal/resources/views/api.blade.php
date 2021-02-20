@extends('layouts.app')

@section('content')


<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="template/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/css/main.css">
<!--===============================================================================================-->
	

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
                
					<table data-vertable="ver1">
						<thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1"></th>
								<th class="column100 column3" data-column="column3">Country</th>
								<th class="column100 column4" data-column="column4">City</th>
								<th class="column100 column5" data-column="column5">From</th>
								<th class="column100 column6" data-column="column6">To</th>
								<th class="column100 column8" data-column="column8"></th>
							</tr>
						</thead>
						<tbody>
                            <!-- foreach loop should be here -->
                            @foreach($movie as $item)
                            <form method="PUT" action="/api/button/{{$item->id}}" enctype="multipart/form-data">
							<tr class="row100">
								<td class="column100 column1" data-column="column1">{{$item->title}}</td>
								<td class="column100 column3" data-column="column3">{{$item->country}}</td>
								<td class="column100 column4" data-column="column4">{{$item->city}}</td>
								<td class="column100 column5" data-column="column5">{{$item->start}}</td>
								<td class="column100 column6" data-column="column6">{{$item->end}}</td>
								<td class="column100 column8" data-column="column8"> <input type="submit" value="Add"></input> </td>
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