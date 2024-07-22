<?php
session_start();
require_once "MyReport.php";
$report = new MyReport;
$report->run();
?>
<?php
if (isset($_POST['command2']) && $_POST['command2'] = "randomize") {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
    exit();
}
?>
<?php
if (isset($_POST['command1']) && $_POST['command1'] = "smooth") {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
    exit();
}
?>
<?php
if (!isset($_POST['command1']) && !isset($_POST['command2'])) {
?>
    <div id='report_render'>
        <?php
        $report->render();
        ?>
    </div>
<?php
}
?>

<html>

<head>
    <title>
        area > boundaries | Chart.js sample
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .content {
            max-width: 800px;
            margin: auto;
            padding: 16px 32px;
        }

        .wrapper {
            min-height: 400px;
            padding: 16px 0;
            position: relative;
        }

        .wrapper.col-2 {
            display: inline-block;
            min-height: 256px;
            width: 49%;
        }

        .toolbar {
            display: flex;
        }

        .toolbar>* {
            margin: 0 8px 0 0;
        }

        canvas {
            min-height: 256px;
        }
    </style>
</head>

<body>

    <script>
        $(document).ready(function() {
            $("#smooth").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    data: {
                        command1: "smooth"
                    },
                    success: function(response) {
                        $('#report_render').html(response);
                    }
                })
            })
            $("#randomize").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    data: {
                        command2: "randomize"
                    },
                    success: function(response) {
                        $('#report_render').html(response);
                    }
                })
            })
        })
    </script>
    <div class="content">
        <div id="report_render"></div>
        <div class="toolbar">
            <button id="smooth">Smooth</button>
            <button id="randomize">Randomize</button>
        </div>
    </div>
</body>

</html>