<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        /* Add some custom styles */
        .text-center{
            text-align: center;
        }
        /* Add some padding to the top */
        .pt-5{
            padding-top: 5%;
        }
        /* Add some padding to the bottom */
        .pb-5{
            padding-bottom: 5%;
        }
        /* Add some margin to the left and right */
        .mx-auto{
            margin-left: auto;
            margin-right: auto;
        }
        /* Add some border radius to the image */
        img{
            border-radius: 50%;
        }
        /* Add some custom font styles */
        h2, h4{
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
        }
        /* Add some custom color to the table head */
        th{
            background-color: #5DADE2;
            color: white;
            font-weight: bold;
        }
        /* Add some custom color to the table data */
        td{
            background-color: #F5F5DC;
        }
        /* Add some custom color to the Pass Note */
        .pass{
            color: green;
            font-weight: bold;
        }
        /* Add some custom color to the Fail Note */
        .fail{
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{asset('vendor/home')}}/img/logo/logo.png" alt="School Logo" width="200" height="200" class="mx-auto">
                <h2 class="pt-3">SMA Kartika XIX-1</h2>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12 text-center">
                <h4>Academic Report</h4>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <th>Student ID</th>
                        <td>{{$studentId->student_id}}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>{{$academicReport[0]->semester}}</td>
                    </tr>
                    <tr>
                        <th>Class</th>
                        <td>{{$studentId->current_grade}} {{$classgroup->name}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Final Score</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($academicReport as $report)
                        <tr>
                            <td>{{ $report->subject_name }}</td>
                            <td>{{ $report->finalterm_score }}</td>
                            @php
                                $assignment_weight = 0.2;
                                $midterm_weight = 0.25;
                                $finalterm_weight = 0.4;
                                $attendance_weight = 0.15;
                                $finalScore = ($report->assignment_score * $assignment_weight) + ($report->midterm_score * $midterm_weight) + ($report->finalterm_score * $finalterm_weight) + ($report->attendance_score * $attendance_weight);
                            @endphp
                            <td>{{strval($finalScore)}}</td>
                                @if($finalScore >= 60)
                            <td class="pass">
                                Pass
                            </td>
                                @else
                            <td class="fail">
                                Fail
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    $(document).ready(function() {
        window.print();
    });
});

</script>




</html>
