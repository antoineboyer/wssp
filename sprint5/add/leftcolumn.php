								<h3>Add an Event</h3>
								<hr>
								<form action="add.php" class="well form-horizontal" method="post">
									<fieldset>
										
									<div class="form-group">
										<label class="col-sm-4 control-label">Date: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="date" name="date" min="0000-00-00" max="<?php echo $nowDate ?>" value ="<?php echo $table['date'][0] ?>" class="form-control"  >
											</div>
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-sm-4 control-label">Time: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="time" name="time" value ="<?php echo $table['time'][0] ?>" class="form-control"  >
											</div>
										</div>
									</div>
										
									<div class="form-group">	
										<label class="col-sm-4 control-label">Magnitude: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="number" name="mg" min="0" max="10" step="0.1" value="<?php echo $table['mg'][0] ?>" class="form-control">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-4 control-label">Magnitude Type: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<select name="typemg" class="form-control">
													<option value="m" <?php if($table['typemg'][0]=="m") echo 'selected' ?> >M</option>
													<option value="ml" <?php if($table['typemg'][0]=="ml") echo 'selected' ?> >ML</option>
													<option value="md" <?php if($table['typemg'][0]=="md") echo 'selected' ?> >MD</option>
													<option value="mb" <?php if($table['typemg'][0]=="mb") echo 'selected' ?> >MB</option>
													<option value="ms" <?php if($table['typemg'][0]=="ms") echo 'selected' ?> >MS</option>
													<option value="ks" <?php if($table['typemg'][0]=="ks") echo 'selected' ?> >KS</option>
												</select>
											</div>
										</div>
									</div>
									
									<div class="form-group">	
										<label class="col-sm-4 control-label">Latitude: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="number" name="lat" min="0" max="90" step="0.01" value="<?php echo $table['lat'][0] ?>" class="form-control">
											</div>
										</div>
									</div>
										
									<div class="form-group">	
										<label class="col-sm-4 control-label">Longitude: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">	
												<input type="number" name="lon" min="-180" max="180" step="0.01" value="<?php echo $table['lon'][0] ?>" class="form-control">
											</div>
										</div>
									</div>
										
									<div class="form-group">	
										<label class="col-sm-4 control-label">Depth (km): </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">
												<input type="number" name="depth" min="0" max="6000" step="1" value="<?php echo $table['depth'][0] ?>" class="form-control">
											</div>
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-sm-4 control-label">Region: </label>
										<div class="col-sm-4 inputGroupContainer">
											<div class="input-group">
												<input  name="region" class="form-control"  type="text" maxlength="20" value="<?php echo $table['region'][0] ?>">
											</div>
										</div>
									</div>
									
									<div class="form-group">
  									<label class="col-md-4 control-label"></label>
										<div class="col-md-4">
											<button type="submit" class="btn btn-success" name="submit">Add <span class="glyphicon glyphicon-send"></span></button>
										</div>
									</div>
										
									</fieldset>
							</form>
							
							<hr>