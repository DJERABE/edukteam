<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Factures</title>

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Bootstrap and OneUI CSS framework -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.css')}}"> 
    </head>
    <body>  
        <div id="page-container" >  
        {{-- <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">   --}}

            <main id="main-container"> 

                <div class="content content-boxed"> 
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li> 
                                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul> 
                        </div>
                        <div class="block-content block-content-narrow"> 
                            <div class="row items-push-2x"> 
                                <div class="col-xs-4 col-sm-4 col-lg-2">
                                    <p class="h2 font-w400 "><img src="/images/Logo-IBSA.png" style="width:150px; height:150px; border-radius:50%; margin-right:25px;"></p> 
                                </div> 
                                <div class="col-xs-8 col-sm-4 col-sm-offset-4 col-lg-8 col-lg-offset-1">
                                    <p class="h6 font-w400 push-10">INTERNATIONAL BILINGUAL SCHOOLS OF AFRICA</p>
                                   <strong class="col-sm-offset-4"> {{ $student_bill->school->nom }}</strong>  {{ $student_bill->school->adresse }}
                                    <address class="col-sm-offset-6"> 
                                       Date: {{$student_bill->created_at}}<br>
                                        <table height="100" width="340">
                                            <tr>
                                                <td width=33% style="border:1px solid ;">
                                                Nom (Name)<br>
                                                Matricule:<br>
                                                Date Naissance:<br>
                                                Lieu Naissance:<br>
                                                </td>    
                                                <td style="border:1px solid ;">
                                                    {{ $student_bill->student->last_name}} {{$student_bill->student->given_names}}<br>
                                                    {{$student_bill->student->matricule}}<br>
                                                    {{ date('d-m-Y', strtotime($student_bill->student->dob)) }}<br>
                                                    {{$student_bill->student->place_birth}}
                                                </td>    
                                            </tr> 
                                        </table>
                                    </address>
                                </div> 
                            </div> 
                            <div class="table-responsive"> 
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Article</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Remise</th>
                                        <th>Montant attendu</th> 
                                    </tr>
                                    </thead> 
                                    <tbody>
                                        @foreach($student_bill->expense_configurations as $key => $student_bill_expense) 
                                            @if ($student_bill_expense->pivot->quantite ==1) 
                                                <tr>
                                                    <td >{{$student_bill_expense->expense->name }}</td>
                                                    <td>{{$student_bill_expense->pivot->quantite}}</td>
                                                    <td>{{number_format($student_bill_expense->pivot->unitaire)}}</td>
                                                    <td>{{$student_bill_expense->pivot->remise }} %</td>
                                                    <td>{{number_format($student_bill_expense->pivot->montant_attendu)}}</td> 
                                                </tr> 
                                            @endif
                                        @endforeach 
                                            <tr class="active">
                                                <td colspan="4" class="font-w700 text-uppercase">Montant total attendu:</td>
                                                <td class="font-w600 ">{{number_format($student_bill->montant_total_attendu)}} F</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                          
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
            </main> 
        </div>
        <!-- END Page Container --> 

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.appear.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.placeholder.min.js')}}"></script>
        <script src="{{asset('assets/js/core/js.cookie.min.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
</html>