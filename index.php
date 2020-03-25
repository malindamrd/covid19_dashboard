<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>COVID-19 Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<script src="function.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<body style="background-color:#2e2e2d;">
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">COVID-19 Statistics Dashboard</a>
    <form class="form-inline">
        <a class="navbar-brand">Developed by Malinda Deshapriya</a>
    </form>
</nav>



</br>
<div class="container text-white" style="font-weight: bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif" >
    <div class=" row" style="background-color:#636361; border-radius: 25px;">
        <div class="col-lg" style="text-align: center; margin:10px">
            <h5>Last Update</h5>
            <h5 id="last_update"></h5>
        </div>

    </div>
    </br>
    <h4> Sri Lankan Statistics</h4>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-primary" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="local_new" class="card-title"></h5>
                    <p class="card-text">Newly Reported Patients</p>

                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card bg-info" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="local_total_cases" class="card-title"></h5>
                    <p class="card-text">Total Reported Patients</p>

                </div>
            </div>
        </div>
        <div class="col-lg">

            <div class="card bg-success" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="local_recovered" class="card-title"></h5>
                    <p class="card-text">Total Recovered Patients</p>

                </div>
            </div>


        </div>
    </div>
    </br>
    <div class="row">
        <div hidden class="col col-lg-4">
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 id="local_total_number_of_individuals_in_hospitals" class="card-title"></h5>
                    <p class="card-text">Hospitalized Pations</p>
                </div>

            </div>
        </div>
        <div class="col col-lg-4">
            <div class="card bg-warning" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="local_new_deaths" class="card-title"></h5>
                    <p class="card-text">Newly Reported Deaths</p>

                </div>

            </div>
        </div>
        <div class="col col-lg-4">
            <div class="card bg-danger" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="local_deaths" class="card-title"></h5>
                    <p class="card-text">Total Reported Deaths</p>
                </div>

            </div>
        </div>
    </div>

</div>

</br>
</br>
<div class="container text-white" style="font-weight: bold; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
    <h4> Global Statistics</h4>
    <div class="row">
        <div class="col-lg">
            <div class="card bg-primary" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="global_new_cases" class="card-title"></h5>
                    <p class="card-text">Newly Reported Patients</p>

                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card bg-info" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="global_total_cases" class="card-title"></h5>
                    <p class="card-text">Total Reported Patients</p>

                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card bg-success" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="global_recovered" class="card-title"></h5>
                    <p class="card-text">Total Recovered Patients</p>

                </div>
            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col col-lg-4">
            <div class="card bg-warning" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="global_new_deaths" class="card-title"></h5>
                    <p class="card-text">Newly Reported Deaths</p>

                </div>
            </div>
        </div>
        <div class="col col-lg-4">
            <div class="card bg-danger" style="width: 18rem;">
                <div class="card-body">
                    <h5 id="global_deaths" class="card-title"></h5>
                    <p class="card-text">Total Reported Deaths</p>

                </div>
            </div>
        </div>
    </div>

</div>

</br>
<br/>

<div class="row" style="margin-left: 10%; margin-right: 10%">
    <div class="col-sm-6">
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>

    <div class="col-sm-6">
        <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
    </div>

</div>













</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>