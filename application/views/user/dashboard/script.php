<script>
			(function () {
				var e = document.getElementById("kt_charts_widget_1_chart");
				if (e) {
					var t = { self: null, rendered: !1 },
						a = function () {
							var a = parseInt(KTUtil.css(e, "height")),
								o = KTUtil.getCssVariableValue("--bs-gray-500"),
								r = KTUtil.getCssVariableValue("--bs-gray-200"),
								s = {
									series: [
										{ name: "Berkas Terselesaikan", data: [44, 55, 57, 56, 130, 58, 44, 55, 57, 56, 130, 58] },
									],
									chart: {
										fontFamily: "inherit",
										type: "bar",
										height: a,
										toolbar: { show: !1 },
									},
									xaxis: {
										categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Okt", "Nov", "Des"],
										axisBorder: { show: !1 },
										axisTicks: { show: !1 },
										labels: { style: { colors: o, fontSize: "12px" } },
									},
									plotOptions: {
										bar: {
											columnWidth: "45%", // Lebar kolom batang
											borderRadius: 10, // Sudut melengkung pada batang
										},
									},
								};
							t.self = new ApexCharts(e, s), t.self.render(), (t.rendered = !0);
						};
					a(), KTThemeMode.on("kt.thememode.change", function () {
						t.rendered && t.self.destroy(), a();
					});
				}
			})();
			
		</script>