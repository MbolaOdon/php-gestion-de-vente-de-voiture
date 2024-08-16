<script src="../js/Chart.min.js"></script>
<script src="../js/jquery-1.9.1.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>


    <script>

$(document).ready(function () {

    showGraph();

});


const showGraph = () => {

    {

        $.post("../crud/afficheChart.php",function (data)

        {

            console.log(data);

            var mois = [];

            var nombre_recettes = [];

            for (var i in data) {

                mois.push(data[i].mois);

                nombre_recettes.push(data[i].nombre_recettes);

            }

            var chartdata = {

                labels: mois,

                datasets: [

                    {

                        label: 'Recette',

                        backgroundColor: 'rgb(243, 202, 17)',

                        borderColor: '#46d5f1',

                        hoverBackgroundColor: 'rgb(241, 238, 10)',

                        hoverBorderColor: '#666666',

                        data: nombre_recettes

                    }

                ]

            };

            var graphTarget = $("#bargraph");


            var barGraph = new Chart(graphTarget, {

                type: 'bar',

                data: chartdata

            });
            var graphTarget = $("#dougnutgraph");


            var barGraph = new Chart(graphTarget, {

                type: 'doughnut',

                data: chartdata

            });

        });

    }

}

</script>