<div class="tab-content">
                <div class="tab-pane show active" id="tab-1">
                <h3>Saisie fiche de frais</h3>
					<form action="valider?id=<?php foreach($variables[0] as $val){echo $val->idVisiteur;}?>&mois=<?php foreach($variables[0] as $val){echo $val->mois;}?>" method="post">

						<div class="mb-4">
							<h4 class="mb-3">Periode</h4>
							<div class="form-group row">
								<label for="" class="col-sm-2 col-form-label">Date</label>
								<div class="col-sm-10 w-25">
									<input type="text" class="form-control form-control-sm" name="periode" readonly value=<?php foreach($variables[0] as $val){echo substr_replace($val->mois, '-', 2, 0);} ?> >
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
                  <td><input type="number" name="rep_1" id='rep_1' class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="REP"){echo $val->quantite ;}}?> readonly></td>
                  <td>*</td>
                  <td><input type="number" id="rep_2" class="input form-control form-control-sm" value= <?php foreach($variables[1] as $val){if($val->id=="REP"){echo $val->montant ;}}?> readonly></td>
                  <td>=</td>
                  <td><input type="number" id='rep_total' class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="REP"){echo $val->montant ;}}?> readonly></td>
                </tr>

                <tr>
                  <td><label for="">Nuitées</label></td>
                  <td><input type="number" name="nui_1" id="nui_1"  class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="NUI"){echo $val->quantite ;}}?> readonly></td>
                  <td>*</td>
                  <td><input type="number" id="nui_2" class="input form-control form-control-sm " value= <?php foreach($variables[1] as $val){if($val->id=="NUI"){echo $val->montant ;}} ?>  readonly></td>
                  <td>=</td>
                  <td><input type="number" id="nui_total" class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="NUI"){echo $val->montant ;}}?> readonly></td>
                </tr>

                <tr>
                  <td><label for="">Etape</label></td>
                  <td><input type="number" name="etp_1" id="etp_1" class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="ETP"){echo $val->quantite ;}}?> readonly></td>
                  <td>*</td>
                  <td><input type="number" id="etp_2" class="input form-control form-control-sm" value= <?php foreach($variables[1] as $val){if($val->id=="ETP"){echo $val->montant ;}} ?> readonly></td>
                  <td>=</td>
                  <td><input type="number" id="etp_total" class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="ETP"){echo $val->montant ;}}?> readonly></td>
                </tr>

                <tr>
                  <td><label for="">Km</label></td>
                  <td><input type="number" name="km_1" id="km_1" class="input form-control form-control-sm" value= <?php foreach($variables[3] as $val){if($val->idFraisForfait=="KM"){echo $val->quantite ;}}?> readonly></td>
                  <td>*</td>
                  <td><input type="number" id="km_2" class="input form-control form-control-sm" value=<?php foreach($variables[1] as $val){if($val->id=="KM"){echo $val->montant ;}} ?>  readonly></td>
                  <td>=</td>
                  <td><input type="number" id="km_total" class="input form-control form-control-sm" value=<?php foreach($variables[3] as $val){if($val->idFraisForfait=="KM"){echo $val->montant ;}}?> readonly></td>
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
              
                <?php 
                    foreach($variables[2] as $val){
                        echo '
                        <tr>
                            <td>'.$val->date.'</td>
                            <td>'.$val->libelle.'</td>
                            <td>'.$val->montant.'</td>
                            <td></td>
                        </tr>
                        ';

                    }
                ?>
              
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
                  <td><input type="number" name="frais_total" id="frais_total" class="input form-control form-control-sm" value=<?php foreach($variables[0] as $val){echo $val->Fmontant;}?> readonly></td>
                  <td><input type="number" name="hf_total" id="hf_total" class="input form-control form-control-sm" value=<?php foreach($variables[0] as $val){echo $val->HFmontant;} ?> readonly></td>
                  <td><input type="number" name="total" id="total" class="input form-control form-control-sm" value=<?php foreach($variables[0] as $val){echo $val->montanttotal;} ?> readonly></td>
                </tr>
              
              </table>

            
            </div>
           <?php if(isset($_SESSION['login']) AND $_SESSION['login']=="Comptable"){  ;?>
              <h5>montant validé : <?php foreach($variables[0] as $val){echo $val->montantValide;} ?> </h5>
            <select class="custom-select " name="etat">
            <?php foreach($variables[4] as $val){
            echo '<option value='.$val->id.'>'.$val->libelle.'</option>';
            }
           ?>
            </select>
            <label for="montantValide"> Montant : </label>
            <input type="number" name="montantValide" value="0">
            <button type="submit" class="btn btn-info text-light">Valider</button>
          <?php } ?>
				</form>
            </div>
</div>
