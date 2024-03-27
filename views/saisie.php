<div class="tab-content">
                <div class="tab-pane show active" id="tab-1">
                <h3>Saisie fiche de frais</h3>
					<form action="saisie" method="post">

						<div class="mb-4">
							<h4 class="mb-3">Periode</h4>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Date</label>
								<div class="col-sm-10 w-25">
                <?php 
                if(isset($_GET['mois'])){
                  echo '<input type="text" class="form-control form-control-sm" name="periode" value='.$_GET['mois'].' readonly>';
                }else{
                    echo '<input type="date" class="form-control form-control-sm" name="periode"  >';
                }
									

                ?>
								</div>
							</div>						
						</div>

            <div class="mb-4">
              <h4 class="mb-3">Frais au forfait</h4>
              <table class="table table-striped">
                <tr>
                  <td></td>
                  <td  colspan="2">Quantité</td>
                  <td  colspan="2">Montant unitaire</td>
                  <td>Total</td>
                </tr>
               
                <tr>
                  <td><label for="">Repas midi</label></td>
                  <td><input type="number" name="rep_1" id='rep_1' class="input form-control form-control-sm" placeholder="0"></td>
                  <td>*</td>
                  <td><input type="number" id="rep_2" class="input form-control form-control-sm" value= <?php foreach($variables as $val){if($val->id=="REP"){echo $val->montant ;}}?> readonly></td>
                  <td>=</td>
                  <td><input type="number" name='rep_total' id='rep_total' class="input form-control form-control-sm" readonly></td>
                </tr>

                <tr>
                  <td><label for="">Nuitées</label></td>
                  <td><input type="number" name="nui_1" id="nui_1"  class="input form-control form-control-sm" placeholder="0"></td>
                  <td>*</td>
                  <td><input type="number" id="nui_2" class="input form-control form-control-sm " value= <?php foreach($variables as $val){if($val->id=="NUI"){echo $val->montant ;}} ?>  readonly></td>
                  <td>=</td>
                  <td><input type="number" name='nui_total' id="nui_total" class="input form-control form-control-sm" readonly></td>
                </tr>

                <tr>
                  <td><label for="">Etape</label></td>
                  <td><input type="number" name="etp_1" id="etp_1" class="input form-control form-control-sm" placeholder="0"></td>
                  <td>*</td>
                  <td><input type="number" id="etp_2" class="input form-control form-control-sm" value= <?php foreach($variables as $val){if($val->id=="ETP"){echo $val->montant ;}} ?> readonly></td>
                  <td>=</td>
                  <td><input type="number" name='etp_total' id="etp_total" class="input form-control form-control-sm" readonly></td>
                </tr>

                <tr>
                  <td><label for="">Km</label></td>
                  <td><input type="number" name="km_1" id="km_1" class="input form-control form-control-sm" placeholder="0"></td>
                  <td>*</td>
                  <td><input type="number" id="km_2" class="input form-control form-control-sm" value= <?php foreach($variables as $val){if($val->id=="KM"){echo $val->montant ;}} ?>  readonly></td>
                  <td>=</td>
                  <td><input type="number" name='km_total' id="km_total" class="input form-control form-control-sm"readonly></td>
                </tr>

           
              </table>
            </div>
            
            <div class="mb-4">
              <h4 class="mb-3">Frais hors forfait</h4>
              <table id="hf_table" class="table table-striped">
                <tr>
                  <td>Date</td>
                  <td>Libellé</td>
                  <td>Montant</td>
                  <td><input type="hidden" id="hf_count" name="hf_count"></td>
                </tr>
              
                <tr>
                  <td><input type="date" id="hf_date" class="form-control form-control-sm"></td>
                  <td><input type="text" id="hf_libelle" class="form-control form-control-sm"></td>
                  <td><input type="number" id="hf_montant" class="form-control form-control-sm"></td>
                  <td>
                    <div>
                      <button type="button" id='add' class="btn btn-secondary btn-sm">+</button>
                     </div>
                  </td>
                </tr>
              
              </table>
            </div>

            <div>
            <h4 class="mb-3">Frais total</h4>
            <table class="table table-striped">
                <tr>
                  <td>Frais au forfait</td>
                  <td>Frais hors forfait</td>
                  <td>Total</td>
                  <td></td>
                </tr>

                <tr>
                  <td><input type="number" name="frais_total" id="frais_total" class="input form-control form-control-sm" value="0" readonly></td>
                  <td><input type="number" name="hf_total" id="hf_total" class="input form-control form-control-sm" value="0" readonly></td>
                  <td><input type="number" name="total" id="total" class="input form-control form-control-sm" value="0" readonly></td>
                </tr>
              
              </table>

            
            </div>
            <div class="text-center">
              <button type="submit" class=" mr-2 btn btn-info text-light ">Valider</button>
              <button type="button"onclick="location.href='saisie'"  class="btn btn-secondary">Effacer</button>
            </div>
            <?php 
            if(isset($_POST['periode'])){
              echo'<div class="alert alert-success mt-2" role="alert">
              Fiche bien enregistrée !
            </div>';
            }
            ?>
					</form>
            </div>
</div>
