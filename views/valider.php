<div class="tab-content">
   <div class="tab-pane show active" id="tab-1">
   
      <h3>Valider fiche de frais</h3>
      <form action="valider" method="post">
        <select class="custom-select" name="visiteur">
        <?php foreach($variables[0] as $val){
            echo '<option value='.$val->id.'>'.$val->nom.' '.$val->prenom.'</option>';
        }
        ?>
        </select>
        <button type="submit" class="btn btn-info text-light ">Voir les fiches</button>
      </form>

      <?php if(isset($_POST['visiteur'])){ ?>

      <table class="table table-striped">	
        <tr>
            <th>Date</th>
            <th>Statut</th>
            <th></th>
            
        </tr>
        <?php foreach($variables[1] as $val){

            echo '<tr>
                    <td>'.substr_replace($val->mois, '-', 2, 0).'</td>
                    <td>'.$val->libelle.'</td>
                    <td><button type="submit" onclick="location.href=\'consulter?id='.$val->idVisiteur.'&mois='.$val->mois.'\'"  class="btn btn-info text-light ">Valider</button></td>
                 </tr>';
        }
        ?>
        
      </table>

      <?php }?>	
    </div>
</div>
