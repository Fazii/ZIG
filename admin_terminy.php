<?php
    session_start();

    if (!isset($_SESSION['logged'])){//NEED TO BE FIXED
        header('Location: http://localhost/admin_log.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="PL-pl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Panel Administracyjny</title>

    <link rel="stylesheet" href="css/style.css"/>

    <script src='lib/jquery.min.js'></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>


    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link rel='stylesheet' href='css/fullcalendar.css'/>
    <script src='lib/moment.min.js'></script>
    <script src='lib/fullcalendar.js'></script>
    <script src='lib/pl.js'></script>

    <script src='js/dbConnection.js'></script>

    <!--variables-->
    <script>
        var $currentTable = 'klimatyzacje';
        var $popOver = null;
        var $newEventName = null;
        var $currentEvent = null;
        var $changed = false;

    </script>

    <!--callbacks for db interactions-->
    <script>
        function getEventsCallback(responseJson){
            var json = JSON.parse(responseJson);
            $('#calendar-element').fullCalendar('removeEvents');
            $('#calendar-element').fullCalendar('addEventSource', json);
            console.log("test");
        }
        function postEventCallback(response){
            getEvents($currentTable, getEventsCallback);
            console.log(response);
        }
        function deleteEventCallback(response){
            getEvents($currentTable, getEventsCallback);
        }

    </script>

    <!--TODO add green notification that changes are saved when postEventCallback fires-->
    <!--TODO reload after changes-->
    <script>
        function updateEventName(){
            var eventID = $currentEvent.id;
            var eventStart = $currentEvent.start.format('YYYY-MM-DD HH:mm:ss');
            var eventEnd = $currentEvent.end.format('YYYY-MM-DD HH:mm:ss');
            var eventTitle = $newEventName;
            postEvent($currentTable, eventID, eventStart, eventEnd, eventTitle, postEventCallback);

            $popOver.popover('destroy');
            $popOver = null;
            $currentEvent = null;
            $changed = false;
        }

        function handleEventNameInput(input){
            if(event.keyCode == 13 && $changed){
                updateEventName();
            }
            $newEventName = input.value;
            $changed = true;
        }

        function removeEvent(){
            var eventID = $currentEvent.id;
            deleteEvent($currentTable, eventID, deleteEventCallback);
            $popOver.popover('destroy');
            $popOver = null;
            $currentEvent = null;
            $changed = false;
        }

        function onEventClick(event, jsEvent, view){
            $(this).popover({
                html: true,
                title: 'Podaj nazwę',
                placement: 'top',
                container: 'body',

                content: `
                    <input class="form-control" type="text" onkeyup="handleEventNameInput(this)" value=" ` + event.title + ` ">
                    <button type="button" class="btn btn-info btn-md" style="margin-top: 10px; width: 100%;" onclick="removeEvent()"><span class="glyphicon glyphicon-trash"></span> Usuń </a>
                    `,
            });

            if($popOver == null){
                $popOver = $(this).popover('show');
            }
            else if($(this)[0] === $popOver[0]){
                if($changed)
                    updateEventName();
                else{
                    $popOver.popover('destroy');
                    $popOver = null;
                    $currentEvent = null;
                }
            }
            else if($popOver){
                if($changed)
                    updateEventName();
                else{
                    $popOver.popover('destroy');
                    $popOver = $(this).popover('show');
                }
            }

            $currentEvent = event;
        }

        <!--TODO popover for title-->
        function onSelect ( start, end, jsEvent, view){
            var eventID = 'NULL';
            var eventStart = start.format('YYYY-MM-DD HH:mm:ss');
            var eventEnd = end.format('YYYY-MM-DD HH:mm:ss');
            var eventTitle = 'Zajęte';
            postEvent($currentTable, eventID, eventStart, eventEnd, eventTitle, postEventCallback);
            $('#calendar-element').fullCalendar('unselect');
        }

        function onEventDrop( event, delta, revertFunc, jsEvent, ui, view ) {
            var eventID = event.id;
            var eventStart = event.start.format('YYYY-MM-DD HH:mm:ss');
            var eventEnd = event.end.format('YYYY-MM-DD HH:mm:ss');
            var eventTitle = event.title;
            postEvent($currentTable, eventID, eventStart, eventEnd, eventTitle, postEventCallback);
        }

        function onEventResize( event, delta, revertFunc, jsEvent, ui, view ) {
            var eventID = event.id;
            var eventStart = event.start.format('YYYY-MM-DD HH:mm:ss');
            var eventEnd = event.end.format('YYYY-MM-DD HH:mm:ss');
            var eventTitle = event.title;
            postEvent($currentTable, eventID, eventStart, eventEnd, eventTitle, postEventCallback);
        }


    </script>

    <script>
        $(document).ready(function () {
            $('#calendar-element').fullCalendar({
                editable: true,

                //selecting new event
                selectable: true,
                selectHelper: true,
                select: onSelect,

                //changing eventTitle
                eventClick: onEventClick,

                //changing event start
                eventDrop: onEventDrop,

                //changing event duration
                eventResize: onEventResize,

                //calendar settings
                defaultView: 'agendaWeek',
                allDayDefault: false,
                allDaySlot: false,
                minTime: "06:00:00",
                maxTime: "22:00:00",
                firstDay: 1,
                businessHours: {
                    start: '7:00',
                    end: '20:00',
                    dow: [1, 2, 3, 4, 5, 6]
                },
                height: "auto",
                lang: "pl",
                hiddenDays: [0],
                header: {
                    left:  'today prev,next',
                    right: 'agendaWeek, month'
                }
            })
            getEvents($currentTable, getEventsCallback);


            $('#ogolne-button').click(function(){
                $currentTable = 'ogolne';
                getEvents($currentTable, getEventsCallback);
                if($popOver){
                    $popOver.popover('destroy');
                    $popOver = null;
                    $currentEvent = null;
                    $changed = false;
                }
            });

            $('#klimatyzacje-button').click(function(){
                $currentTable = 'klimatyzacje';
                getEvents($currentTable, getEventsCallback);
                if($popOver){
                    $popOver.popover('destroy');
                    $popOver = null;
                    $currentEvent = null;
                    $changed = false;
                }
            });

        });

    </script>

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <h4>Panel Administracyjny</h4>
            </li>
            <li>
                <a href="admin_cennik.php">Modyfikuj usługi</a>
            </li>
            <li>
                <a class="active" href="admin_terminy.php">Podgląd i edycja terminarza</a>
            </li>
            <li>
                <a href="admin_jumbotron.php">Zmień jumbotron</a>
            </li>
            <li>
                <hr>
            </li>
            <li>
                <a href="php/logout.php">Wyloguj</a>
            </li>

        </ul>
    </div>
    <!-- /#sidebar-wrapper -->
    <button href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span
            class="glyphicon glyphicon-menu-hamburger"></span></button>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="slots-picker">
                        <div id="slots-picker-title"><h2>Wybierz stanowisko</h2></div>
                        </br>
                        <button type="button" class="btn btn-primary btn-xl" id="ogolne-button">Ogólne</button>
                        <button type="button" class="btn btn-primary btn-xl" id="klimatyzacje-button">Klimatyzacja
                        </button>
                        </br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id='calendar-element' class="col-lg-12"></div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


</script>

</body>

</html>
