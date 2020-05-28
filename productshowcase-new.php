			<!-- Home Page Product Showcase -->
			
			<section id="home-product-container" class="section group">
				
				<div class="col span_12_of_12">
			
			        <section id="home-product-showcase" class="section group">
				        
				        <div class="col span_12_of_12">
					        
					        <?php
							$params = array('where' => 't.id = 3091');
							$mypod = pods('content-section', $params); 									
							echo "<h2>" . $mypod->display('name') . "</h2>\n"; 
							echo $mypod->display('post_content'); 
							?>
					        
				        </div>
				        
			        </section>
		        
			        <section id="home-product-slides" class="section group">
				        
				        <div class="col span_3_of_12 home-showcase-item hover-card">
					    	<a href="<?php echo get_site_url(); ?>/roofing/" class="hover-card">    
						        <h3>
							        Roofing 
							        <span>Learn More &rsaquo;</span>
							    </h3>
							</a>
				        </div>
				        
				        <div class="col span_3_of_12 home-showcase-item hover-card">
					        <a href="<?php echo get_site_url(); ?>/windows/">
								<h3>
									Windows
									<span>Learn More &rsaquo;</span>
								</h3>
						        
							</a>
				        </div>
				        
				        <div class="col span_3_of_12 home-showcase-item hover-card">
					        <a href="<?php echo get_site_url(); ?>/doors/">
					        	<h3>
						        	Doors &#42;
						        	<span>Learn More &rsaquo;</span>
						        </h3>
						        
					        </a>
				        </div>
				        
				        <div class="col span_3_of_12 home-showcase-item hover-card">
					        <a href="<?php echo get_site_url(); ?>/siding/">
						        <h3>
							        Vinyl Siding &#42;
							        <span>Learn More &rsaquo;</span>
						        </h3>
					        </a>
				        </div>
				        
			        </section>
		        
			        <section id="home-product-footer" class="section group">
				        
				         <div class="col span_12_of_12">
					        
					       <p>*Washington, D.C., Maryland and Northern Virginia only.</p>
					       
				        </div>
				        
			        </section>
		        
				</div>
			
			</section>
