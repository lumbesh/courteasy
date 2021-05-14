 
<?php 
session_start();
include('../includes/config.php');
include('../includes/_db.php');
error_reporting(0);

?>

<!DOCTYPE html>

<html>
<head>
    <title>CourtEasy</title>
	
    <style type="text/css">
    p, body, td { font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 10pt; }
    body { padding: 0px; margin: 0px; background-color: #ffffff; }
    a { color: #1155a3; }
    .space { margin: 10px 0px 10px 0px; }
    .header { background: #003267; background: linear-gradient(to right, #011329 0%,#00639e 44%,#011329 100%); padding:20px 10px; color: white; box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.75); }
    .header a { color: white; }
    .header h1 a { text-decoration: none; }
    .header h1 { padding: 0px; margin: 0px; }
    .main { padding: 30px 10px 10px 10px; }
  </style>


  <style>
    .navigator_default_cell.navigator-disabled-cell {
      background-color: #ddd !important;
      color: #888;
      cursor: not-allowed !important;
    }

    .main {
      display: flex;
    }

    .col-left {
      padding-right: 10px;
    }
    .col-main {
      flex: 1;
    }
  </style>

	<!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />
        <link type="text/css" rel="stylesheet" href="themes/calendar_g.css" />

	<!-- helper libraries -->
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

</head>
<body>

        <div id="header">
			<div class="bg-help">
				<div class="inBox">
					<h1 id="logo"><a href='main.php'>CourtEasy</a></h1>
					<hr class="hidden" />
				</div>
			</div>
        </div>
        <div class="shadow"></div>
        <div class="hideSkipLink">
        </div>
        <div class="main">
  <div class="col-left">
    <div id="nav"></div>
  </div>
  <div class="col-main">
    <div id="dp"></div>
  </div>
</div>
                <div class="space">
                    Theme: <select id="theme">
                        <option value="calendar_default">Default</option>
               
                        <option value="calendar_g">Google-Like</option>

                    </select>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
		<center>
<h1><a class="btn btn-info"  href="../court-listing.php">Back</a></h1></center>
		<center>

                </div>


            <script>
   
				var lastDate = null;
                var nav = new DayPilot.Navigator("nav");
                nav.showMonths = 3;
                nav.skipMonths = 3;
                nav.selectMode = "week";

     nav.onBeforeCellRender = function(args) {
      if (args.cell.day < DayPilot.Date.today()) {
        args.cell.cssClass = "navigator-disabled-cell";
      }
    };
   
    nav.onTimeRangeSelect = function(args) {
      if (args.day < DayPilot.Date.today()) {
        args.preventDefault();
        nav.select(lastDate, {dontNotify: true, dontFocus: true});
      }
      else {
        lastDate = args.start;
      }
    };


                nav.onTimeRangeSelected = function(args) {
                    dp.startDate = args.start;
                    dp.update();
                    loadEvents();
             

			   };
	


                nav.init();
        		
				
				// 
				
                var dp = new DayPilot.Calendar("dp");
                dp.viewType = "Week";

                dp.eventDeleteHandling = "Update";
                
                dp.onBeforeCellRender = function(args) {
      if (args.cell.start < DayPilot.Date.today()) {
        args.cell.disabled = true;
        args.cell.backColor = "#eee";
      }

    }




                dp.onEventDeleted = function(args) {
                    $.post("backend_delete8.php",
                        {
                            id: args.e.id()
                        },
                        function() {
                            console.log("Deleted.");
                        });
                };

                dp.onEventMoved = function(args) {
                    $.post("backend_move7.php",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString()
                            },
                            function() {
                                console.log("Moved.");
                            });
                };

                dp.onEventResized = function(args) {
                    $.post("backend_resize7.php",
                            {
                                id: args.e.id(),
                                newStart: args.newStart.toString(),
                                newEnd: args.newEnd.toString()
                            },
                            function() {
                                console.log("Resized.");
                            });
                };





               // event creating
              
                dp.onTimeRangeSelected = function(args) {
                    var name = confirm("DO YOU WANT TO FINALIZE YOUR SCHEDULE?(It cannot be undone)");
                    var wew = "<?php 
$email=@$_SESSION['User'];
$sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

   echo htmlentities($result->EmailId); }}?>"
               var asd = "<?php 
$email=@$_SESSION['User'];
$sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

   echo htmlentities($result->EmailId); 
   echo "<br>";
   echo "";

  }}?>"
             

          

                   
                   
                    var court = "21";
                
                    dp.clearSelection();
                
                
              
              
                    if (!name) return;
                    var e = new DayPilot.Event({
                        start: args.start,
                        end: args.end,
                        id: DayPilot.guid(),
                        resource: args.resource,
                        text : asd
                    })
                    ;
     
                  
                  
                  
                  
                    dp.events.add(e);

                    $.post("backend_create.php",
                            {
                                start: args.start.toString(),
                                end: args.end.toString(),
                                name: wew,
                                court: court,
                                etc: asd
                            },
                            function() {
                                console.log("Created.");
                                window.location.href = "../summary.php";
                            }
							);      

                   


                };
         
          


                dp.onEventClick = function(args) {
                    alert("clicked: " + args.e.id());
                };
   


    
                dp.init();

                loadEvents();

				
				
				
                function loadEvents() {
                    dp.events.load("backend_events8.php");
                }

				
				
            </script>

            <script type="text/javascript">
            $(document).ready(function() {
                $("#theme").change(function(e) {
                    dp.theme = this.value;
                    dp.update();
                });
            });
            </script>

			
			
			
			
        </div>
        <div class="clear">
        </div>

</body>
</html>

