<div class="tab-content">
   <div class="tab-pane show active" id="tab-1">
   
    <?php 
    
    $parPage = 8;
    $nbVisiteurs=  $variables[2];
    $pageTotal = ceil($nbVisiteurs / $parPage);
    if(isset($_GET['page']) AND !empty($_GET['page'])){
        $_GET['page'] = intval($_GET['page']);
        $currentPage = $_GET['page'];
    }else{
        $currentPage = 1;
    }
    $depart = ($currentPage - 1)*$parPage;



    ?>
    
    <h3>Utilisateurs</h3>

    <table class="table table-striped">
        <h4>Visiteurs</h4>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        
        </tr>

        <?php 

            foreach($variables[0] as $val){
                echo '
                <tr>
                    <td>'.$val->nom.'</td>
                    <td>'.$val->prenom.'</td>
                    <td><a class="btn btn-danger" href="?id='.$val->id.'&supprimerVisiteur" >Supprimer</a></td>
                </tr>
                ';
            }
        ?>
           
    </table>

        <nav >
          <ul class="pagination">
            <?php 
                for($i=1; $i<=$pageTotal; $i++){ 
                $depart = ($i-1)*8;
                echo '
                
                <li class="page-item"><a class="page-link" href="index?page='.$i.'&depart='.$depart.'">'.$i.'</a></li>
                
                ';} ?>
            </ul>
        </nav>

    <table class="table table-striped">
    <h4>Comptables</h4>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        
        </tr>

        <?php 

            foreach($variables[1] as $val){
                echo '
                <tr>
                    <td>'.$val->nom.'</td>
                    <td>'.$val->prenom.'</td>
                    <td><a class="btn btn-danger" href="?id='.$val->id.'&supprimerComptable" >Supprimer</a></td>
                </tr>
                ';
            }
        ?>
    
    </table>
    </div>
</div>
