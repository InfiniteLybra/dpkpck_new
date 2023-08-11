<script src="<?= base_url('assets/amcharts/js/') ?>all.js"></script>
<script src="<?= base_url('assets/amcharts/js/') ?>xy.js"></script>
<script src="<?= base_url('assets/amcharts/js/') ?>Animated.js"></script>

<!-- <script src="index.js"></script> -->

<script>
    var root = am5.Root.new("chartdiv");

    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        layout: root.verticalLayout
    }));

    var legend = chart.children.push(
        am5.Legend.new(root, {
            centerX: am5.p50,
            x: am5.p50
        })
    );

    var data = [{
        "transaksi": "<?= date('Y') - 1 ?>",
        "mkn": 2.5,
        "mnm": 2.5,
        "snck": 2.1,
    }, {
        "transaksi": "<?= date('Y') ?>",
        "mkn": 2.6,
        "mnm": 2.7,
        "snck": 2.2,
    }, {
        "transaksi": "<?= date('Y') + 1 ?>",
        "mkn": 2.8,
        "mnm": 2.9,
        "snck": 2.4,
    }]


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "transaksi",
        renderer: am5xy.AxisRendererX.new(root, {
            cellStartLocation: 0.03,
            cellEndLocation: 0.97
        }),
        tooltip: am5.Tooltip.new(root, {})
    }));

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        renderer: am5xy.AxisRendererY.new(root, {})
    }));


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    function makeSeries(name, fieldName) {
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
            name: name,
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: fieldName,
            categoryXField: "transaksi"
        }));

        series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}: {valueY}",
            width: am5.percent(90),
            tooltipY: 0
        });

        series.data.setAll(data);

        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();

        series.bullets.push(function() {
            return am5.Bullet.new(root, {
                locationY: 0,
                sprite: am5.Label.new(root, {
                    text: "{valueY}",
                    fill: root.interfaceColors.get("alternativeText"),
                    centerY: 0,
                    centerX: am5.p50,
                    populateText: true
                })
            });
        });

        legend.data.push(series);
    }

    makeSeries("Makanan", "mkn");
    makeSeries("Minuman", "mnm");
    makeSeries("Makanan Ringan", "snck");

    // Add scrollbar
    var scrollbar = am5.Scrollbar.new(root, {
        orientation: "horizontal"
    });

    var tooltip = am5.Tooltip.new(root, {});

    tooltip.get("background").setAll({
        fill: am5.color(0xeeeeee)
    })

    chart.appear(1000, 100);
</script>
<script src="<?= base_url('assets/amcharts/js/') ?>percent.js"></script>
<script>
    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("lingkaran");


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout
    }));


    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
        valueField: "value",
        categoryField: "category"
    }));


    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
    series.data.setAll([{
        value: 10,
        category: "Makanan"
    }, {
        value: 9,
        category: "Minuman"
    }, {
        value: 6,
        category: "Snack"
    }, ]);


    // Create legend
    // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
    var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.percent(50),
        x: am5.percent(50),
        marginTop: 15,
        marginBottom: 15,
    }));

    legend.data.setAll(series.dataItems);


    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);
</script>