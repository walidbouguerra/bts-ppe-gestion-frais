<div class="tab-content">
   <div class="tab-pane show active" id="tab-1">
      <h3>Mes fiches de frais</h3>
      <table class="table table-striped">	
        <tr>
            <th>Date</th>
            <th>Statut</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
        if(!empty($variables)){
            foreach($variables as $val){
              echo '<tr>
                <td>'.substr_replace($val->mois, '-', 2, 0).'</td>
                <td>'.$val->libelle.'</td>
                <td><button type="button" onclick="location.href=\'consulter?id='.$val->idVisiteur.'&mois='.$val->mois.'\'"  class="btn btn-secondary">Consulter</button></td>
                ';if($val->mois == date('mY') AND $val->idEtat=='CL'){
                  echo '<td><button type="button"onclick="location.href=\'saisie?&mois='.$val->mois.'\'"  class="btn btn-secondary">Modifier</button></td> ';
                }else{
                  echo'<td></td>';
                }echo '
                </tr>';
            }
        }
        ?>
      </table>	
    </div>
</div>
