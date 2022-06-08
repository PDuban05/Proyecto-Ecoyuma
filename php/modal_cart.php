
<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mi carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
                                if($carrito_mio[$i]!=NULL){
							?>


							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-10" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0" style="color: #000000; font-size: 16px;" > <?php echo $carrito_mio[$i]['titulo'];  ?><br> Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									
									<span class="text-muted"  style="text-align: right; color: #000000;">$<?php echo $numeroFormateado = number_format($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'],0, ',', '.') ;    ?> </span>
									</div>
								</div>
							
							</li>


							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
                            }
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (COP)</span>
							<strong  style="text-align: left; color: #000000;">$<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                if(isset($carrito_mio[$i])){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                            }
							}}}
                            if(!isset($total)){$total = '0';}else{ $total = $total;}
							echo $numeroFormateado = number_format($total,0, ',', '.') ; ?></strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
     
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="/php/borrarcarro.php">Vaciar carrito</a>
        <a type="button" class="btn btn-success" href="./checkout.php">Continuar pedido</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->