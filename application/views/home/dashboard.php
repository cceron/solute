<div class="row">
	<div class="col-12 col-lg-12 d-flex">
		<div class="card flex-fill w-100">
			<div class="card-header">
				<div class="card-actions float-end">
					<div class="dropdown position-relative">
						<a href="#" data-bs-toggle="dropdown" data-bs-display="static"><i class="align-middle" data-feather="more-horizontal"></i></a>

						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>
				<h5 class="card-title mb-0">Precio de la UF los ultimos 30 dias</h5>
				<hr>
				<form id="frm-chartuf" class="row row-cols-md-auto align-items-center ">
					<div class="col-12">
						<div class="input-group mb-2 mr-sm-2">
							<div class="input-group-text">Fecha Inicial</div>
							<input type="date" id="inidate" name="inidate" value="<?php echo $inidate?>" class="form-control"  placeholder="Fecha Inicial">

							<div class="input-group-text">Fecha Final</div>
							<input type="date" id="findate" name="findate" value="<?php echo $findate?>" class="form-control"  placeholder="Fecha Final">
						</div>

					</div>

					<div class="col-12">
						<button type="submit" class="btn btn-primary mb-2">Filttar</button>
					</div>
				</form>
			</div>
			<div class="card-body d-flex w-100">
				<div class="align-self-center chart chart-lg dv-canvas"><canvas id="chartjs-dashboard-bar"></canvas></div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		let canvas='<canvas id="chartjs-dashboard-bar"></canvas>';
		let frmfiluf=document.getElementById("frm-chartuf")

		//console.log()
		//console.log(frmfiluf[0].value)
		//console.log(frmfiluf[1].value)
		frmfiluf.addEventListener("submit",function(evt){
			document.getElementById("chartjs-dashboard-bar").remove()
			
            let btn_submit=frmfiluf.querySelector("button[type='submit']");
            btn_submit_ori=btn_submit.innerHTML;
            btn_submit.setAttribute("disabled",true);
            btn_submit.innerHTML="<span class='spinner-border text-light' style='height:1rem;width:1rem;'></span> Filtrando...";

            let json_data={};
            let frm_data=Utils.enc_form_data("frm-chartuf");
            // console.log(frm_data)
            json_data.data=frm_data;
            // console.log(json_data)
            Utils.send_data('Uf_maintainer/uf', json_data).then(response => {

                document.getElementsByClassName("dv-canvas")[0].innerHTML=canvas;
                console.log(response)
                btn_submit.removeAttribute("disabled");
                btn_submit.innerHTML=btn_submit_ori
                //Utils.notification(response.type,response.text)
                let array_dates	=[];
                let array_prices=[];

                response.forEach(obj=>{
                	array_dates.push(obj[0]);
                	array_prices.push(obj[1]);

                })
                //let chart=document.getElementById("chartjs-dashboard-bar");
                //chart.clear();
                let chart=new Chart(document.getElementById("chartjs-dashboard-bar"), {
					type: "bar",
					data: {
						labels: array_dates,
						datasets: [{
							label: "This year",
							backgroundColor: window.theme["primary-light"],
							borderColor: window.theme["primary-light"],
							hoverBackgroundColor: window.theme["primary-light"],
							hoverBorderColor: window.theme["primary-light"],
							data: array_prices,
							barPercentage: .325,
							categoryPercentage: .5
						}]
					},
					options: {
						maintainAspectRatio: false,
						cornerRadius: 15,
						legend: {
							display: false
						},
						scales: {
							yAxes: [{
								gridLines: {
									display: false
								},
								ticks: {
									stepSize: 20
								},
								stacked: true,
							}],
							xAxes: [{
								gridLines: {
									color: "transparent"
								},
								stacked: true,
							}]
						}
					}
				});
               

            });
            evt.preventDefault();
        })
	
	})
	
</script>
