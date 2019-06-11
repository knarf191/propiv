	<div class="main">
			<div class="main-inner">
				<div class="sidebar">
					<div class="shortcuts"> </div>
					<ul class="nav nav-list">

						<?php
							$data_vale         = $this->consultas->getPermisosById($user, "vales");
							$ver_vales      = $data_vale['ver'];
							$ver_saldo      = $data_vale['eliminar'];

							$data_medicamentos = $this->consultas->getPermisosById($user, "medicamentos");
							$ver_medicamentos      = $data_medicamentos['ver'];

							$data_insumos      = $this->consultas->getPermisosById($user, "insumos");
							$ver_insumos      = $data_insumos['ver'];

							$data_inventario  = $this->consultas->getPermisosById($user, "inventario");
							$ver_inventario   = $data_inventario['ver'];

							$data_usuarios     = $this->consultas->getPermisosById($user, "usuarios");
							$ver_usuarios      = $data_usuarios['ver'];


							if ($ver_vales=="true") 
							{
								echo'<li class="submenu">
									<a class="" href="#"><i class="fa fa-car"></i><span > Gasolina</span></a>
										<ul class="children">
											<li><a href="#" id="dir_vales"><span><i class="fa fa-file-text-o" ></i> Vales</span></a></li>';
											if ($ver_saldo == "true") 
											{
												echo'<li><a href="#" id="dir_recargas"><span><i class="fa fa-credit-card-alt"></i> Recargas</span></a></li>';
											}
											
										echo'</ul>
								</li>';
							}
							if ($ver_medicamentos=="true") 
							{
								echo'<li class="submenu">
									<a class="" href="#"><i class="fa fa-heartbeat"></i><span> Medicina</span></a>
										<ul class="children">
											<li><a href="#" id="dir_ordenes"><span><i class="fa fa-file-text-o" ></i> Órdene Médicas</span></a></li>
											<li><a href="#" id="dir_medicamentos"><span><i class="fa fa-universal-access"></i> Medicamentos</span></a></li>
										</ul>
								</li>';
								/*echo'<li>
									<a href="'.base_url().'medicamentos">
										<i class="fa fa-heartbeat"></i>
										<span>Medicamentos</span>
									</a>
								</li>';*/
							}
							if ($ver_insumos=="true") 
							{
								echo '<li class="submenu">
									<a href="#" ><i class="fa fa-wrench"></i><span> Insumos</span></a>
										<ul class="children">
											<li class="dr_refacciones"><a href="#" id="dir_refacciones"><span><i class="fa fa-cogs" ></i> Refacciones</span></a></li>
											<li><a href="#" id="dir_lubricantes"><span><i class="fa fa-filter"></i> Aceites y lubricantes</span></a></li>
										</ul>
								</li>';
							}

							echo'<li class="separador">
								<i class="fa fa-plus"></i>
							</li>';

							if ($ver_inventario=="true") 
							{
								echo '<li class="submenu">
										<a href="#" ><i class="fa fa-list"></i><span> Inventario</span></a>
										<ul class="children">
											<li class="dr_refacciones">
												<a href="#" id="dir_stock_papeleria">
													<span>
														<i class="fa fa-scissors" ></i> 
														Papelería y Oficina
													</span>
												</a>
											</li>
											<li>
												<a href="#" id="dir_stock_ornato">
													<span>
														<i class="fa fa-pagelines"></i> 
															Ornato y Limpieza
													</span>
												</a>
											</li>
											<li>
												<a href="#" id="dir_stock_computo">
													<span>
														<i class="fa fa-tv"></i> 
														Cómputo
													</span>
												</a>
											</li>
										</ul>
									</li>';
							}

							if ($ver_usuarios=="true") 
							{
								echo'<li>
									<a href="'.base_url().'usuarios">
										<i class="fa fa-users"></i>
										<span> Usuarios</span>
									</a>
								</li>';
								
							}
							
						echo'<div class="clearfix"></div>';

						?>
					</ul>
				</div>
				<div class="main-section">