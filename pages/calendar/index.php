<?php
// Sprawdzenie aktywnej sesji
include("../../require/auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
<title>Kalendarz</title>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="../../style.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>

<script>
// Funkcje dotyczące wydarzeń dodawanie / usuwanie / edytowanie
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Nazwa wydarzenia:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add-event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Pomyślnie dodano wydarzenie!");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Pomyślnie zaktualizowano wydarzenie");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Czy aby napewno chcesz usunąć to wydarzenie?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "delete-event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Pomyślnie usunięto wydarzenie");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>
@font-face {
  font-family: MrDarcyRegular;
  src: url(../../mrdarcyregular.otf);
}
body:not(.sidebar .login-info .menu-sidebar button p ) {
    background: rgba(0, 0, 0, .60) url(../../img/background_db2.jpg) no-repeat center fixed;
    background-blend-mode: darken;
    box-shadow: #000;
    background-size: cover;
    margin-top: 50px;
    margin-left: 10%;
    text-align: center;
    font-size: 18px;
    font-family: MrDarcyRegular;
    color: white;
}
#calendar {
    width: 900px;
    margin: 0 auto;
}
.response {
    height: 60px;
}
.success {
    background: rgb(90, 32, 32);;
    padding: 10px 60px;
    border: rgba(0, 0, 0, 0.3) 1px solid;
    display: inline-block;
}
</style>
<!-- Sidebar -->
<div class="sidebar">
    <div class="login-info">
        <img src="../../img/avatar-placeholder.png">
            <p>Witaj<br> <?php echo $_SESSION['username']; ?>!</p>
            <a href="../../require/logout.php"><button id="button1" class="buttonstyle"><i class="fas fa-sign-out-alt"></i>Wyloguj</button></a>
            <hr class="hr-login-info">
    </div>
    <div class="menu-sidebar">
         <a href="../dashboard.php"><button id="button2" class="buttonstyle"><i class="fas fa-home"></i>Strona Główna</button></a><br><br>
         <a href="../calendar/index.php"><button id="button3" class="buttonstyle"><i class="fas fa-calendar-alt"></i>Kalendarz</button></a><br><br>
         <a href="../rulebook.php"><button id="button4" class="buttonstyle"><i class="fas fa-book"></i>Rulebook</button></a><br><br>
    </div>
</div>
<!-- Kalendarz -->
</head>
    <h2>Kalendarz zaplanowanych sesji RPG</h2>
    <div class="response"></div>
    <div id='calendar'></div>
</body>


</html>