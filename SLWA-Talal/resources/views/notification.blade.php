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
								<th class="column100 column1" data-column="column1">Notifications</th>
							</tr>
						</thead>
						<tbody>
                            <!-- foreach loop should be here -->
                            @foreach($data as $item)
							<tr class="row100">
								<td class="column100 column1" data-column="column1">{{$item}}</td>
                            </tr>
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