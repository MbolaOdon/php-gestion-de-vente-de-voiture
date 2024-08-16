<script src="../js/Chart.min.js"></script>
<script src="../js/jquery-1.9.1.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>


    <script>

$(document).ready(function () {

    showGraph();

});


const showGraph = () => {

    {

        $.post("../crud/chartDynamic.php",function (data1)

        {

            console.log(data1);

            var moisd = [];

            var nombre_recettesd = [];

            for (var i in data1) {

                moisd.push(data1[i].moisd);

                nombre_recettesd.push(data1[i].nombre_recettesd);

            }

            var chartdatad = {

                labels: moisd,

                datasets: [

                    {

                        label: 'Recette',

                        backgroundColor: 'rgb(243, 202, 17)',

                        borderColor: '#46d5f1',

                        hoverBackgroundColor: 'rgb(241, 238, 10)',

                        hoverBorderColor: '#666666',

                        data: nombre_recettesd

                    }

                ]

            };

            var graphTargetd = $("#bargraphDynamic");


            var barGraphd = new Chart(graphTargetd, {

                type: 'bar',

                data: chartdatad

            });
            

        });

    }

}

</script>