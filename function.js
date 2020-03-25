

var request = new XMLHttpRequest()

request.open('GET', 'https://hpb.health.gov.lk/api/get-current-statistical', true)
request.onload = function() {
  var data = JSON.parse(this.response)

  if (request.status >= 200 && request.status < 400) {


    var local_new = data['data']["local_new_cases"]
    var local_total_cases = data['data']["local_total_cases"]
    var local_total_number_of_individuals_in_hospitals = data['data']["local_total_number_of_individuals_in_hospitals"]
    var local_deaths = data['data']["local_deaths"]
    var local_new_deaths = data['data']["local_new_deaths"]
    var local_newlocal_recovered_cases = data['data']["local_recovered"]

    var global_new_cases = data['data']["global_new_cases"]
    var global_total_cases = data['data']["global_total_cases"]
    var global_deaths = data['data']["global_deaths"]
    var global_new_deaths = data['data']["global_new_deaths"]
    var global_recovered = data['data']["global_recovered"]

    var update_date_time = data['data']["update_date_time"]

    console.log(update_date_time)

    document.getElementById("local_new").innerHTML = local_new.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("local_total_cases").innerHTML = local_total_cases.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("local_total_number_of_individuals_in_hospitals").innerHTML = local_total_number_of_individuals_in_hospitals.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("local_deaths").innerHTML = local_deaths.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("local_new_deaths").innerHTML = local_new_deaths.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("local_recovered").innerHTML = local_newlocal_recovered_cases.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");


    document.getElementById("global_new_cases").innerHTML = global_new_cases.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("global_total_cases").innerHTML = global_total_cases.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("global_deaths").innerHTML = global_deaths.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("global_new_deaths").innerHTML = global_new_deaths.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById("global_recovered").innerHTML = global_recovered.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");


    var mal = global_total_cases.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    console.log(mal);



    document.getElementById("last_update").innerHTML = update_date_time;



    var requestt = new XMLHttpRequest()

    //requestt.open('GET', 'https://coronadashboard.000webhostapp.com/new/backend/getPreviousData.php?last_update='+update_date_time+'&local_new='+local_new+'&local_total='+local_total_cases+'&local_recovered='+local_newlocal_recovered_cases+'&local_new_deaths='+local_new_deaths+'&local_deaths='+local_deaths+'&global_cases='+global_total_cases, true)
    //requestt.open('GET', 'http://localhost/corona/backend/getPreviousData.php?last_update='+update_date_time+'&local_new='+local_new+'&local_total='+local_total_cases+'&local_recovered='+local_newlocal_recovered_cases+'&local_new_deaths='+local_new_deaths+'&local_deaths='+local_deaths+'&global_cases='+global_total_cases, true)
    requestt.open('GET', 'https://coronadashboard.000webhostapp.com/backend/getPreviousData.php?last_update='+update_date_time+'&local_new='+local_new+'&local_total='+local_total_cases+'&local_recovered='+local_newlocal_recovered_cases+'&local_new_deaths='+local_new_deaths+'&local_deaths='+local_deaths+'&global_cases='+global_total_cases, true)
    requestt.onload = function() {
      var data = JSON.parse(this.response)

      data = data['data'];
      var dataPoints = [];

      $.each(data, function(key, value){
        dataPoints.push({label: value['update_time'], y: parseInt(value['local_total_cases'])});
      });



      var chart = new CanvasJS.Chart("chartContainer", {
        backgroundColor: "white",
        title:{
          text: "Local Cases",
          fontColor: "black",
        },
        data: [
          {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "line",
            dataPoints: dataPoints
          }
        ]
      });
      chart.render();

      var dataPoints = [];

      $.each(data, function(key, value){
        dataPoints.push({label: value['update_time'], y: parseInt(value['global_cases'])});
      });

      var chart = new CanvasJS.Chart("chartContainer1", {
        backgroundColor: "white",
        title:{
          text: "Global Cases",
          fontColor: "black",
        },
        data: [
          {
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "line",
            dataPoints: dataPoints
          }
        ]
      });
      chart.render();

      $.get('https://www.cloudflare.com/cdn-cgi/trace', function(data) {
        console.log(data)
      })


    }

  } else {
    console.log('error')
  }

  requestt.send()
}

request.send()












