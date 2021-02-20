@extends('layouts.app')
    


@section('content')

    <link rel="stylesheet" type="text/css" href="/css/main.css">
	
	</script>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Add Event</h2>
                    <form method="POST" action="/home/create">
                    @csrf
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Event Name" name="title">
                        </div>
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="Event Start" name="start">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                        <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="Event End" name="end">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Event Description" name="description">
                                </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="/vendor/select2/select2.min.js"></script>
    <script src="/vendor/datepicker/moment.min.js"></script>
    <script src="/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

@endsection