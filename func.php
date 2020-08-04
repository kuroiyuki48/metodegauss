<!DOCTYPE html>
<html>
<head>
      <title>Metode Eliminasi Gauss</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<body class="container m-auto">
      <div class="card">

            <?php session_start();
            session_destroy();?>
            <h1 class="card-header mb-3">
            Hasil Eliminasi Gauss Jordan</h1>
            <div class="card-body">
                  <?php

                  $koefisien = array(array());

                  if(isset($_SESSION['jumlah'])){
                        $jumlah = $_SESSION['jumlah'];
                        makearray($jumlah);
                        echo "<p><b>Dengan detail eliminasi sebagai berikut :</b> <p> <b>Matriks Persamaan 1</b><p></p>";
                        showMatrik($koefisien);
                        change($jumlah);
                        conclusion($jumlah);

                  }

                  function conclusion($jumlah){
                        global $koefisien ;
                        echo '<b>Maka Hasil Eliminasi: </b><div class="col-md-12 mb-5"><div class="row">' ;
                        for($i=0; $i<$jumlah;$i++){
                              echo '<div class="col-md-2"><b>X<sub class="text">'.$i .'</sub></b>: ' ;
                              for($j=0; $j<$jumlah+1;$j++){
                                    if ($j==$jumlah){
                                          echo '<span class="text-primary"><b>'.$koefisien[$i][$j].'</b></span></div>';
                                    }
                              }
                        }
                        echo "</div></div><hr>";

                  }

                  function makearray($jumlah){
                        global $koefisien ;
                        for($i=0; $i<$jumlah;$i++){
                              for($j=0; $j<$jumlah+1;$j++){
                                    if(isset($_GET['var'.$i.$j])){
                                          $koefisien[$i][$j] = $_GET['var'.$i.$j];
                                    }
                              }
                        }
                  }

                  function showMatrik($koefisien){
                        echo '<table class="table table-bordered text-center">';
                        $rows =     count($koefisien);

                        for($i=0; $i<$rows;$i++){
                              $cols = count($koefisien[$i]);
                              echo '
                              <tr>';
                              for($j=0; $j<$cols;$j++){
                                    echo '<td>';
                                    echo $koefisien[$i][$j] .'   ';
                                    echo '</td>';
                              }
                              echo '</tr>
                              ';
                        }
                        echo '</table>
                        ';
                        echo '<hr>
                        ';
                  }

                  function change($persamaan){
                        global $koefisien ;
                        for($i=0;$i<$persamaan;$i++){
                              $persamaan_pivot = $i + 1;
                              echo '<b>Persamaan '.$persamaan_pivot.' menjadi pivot dan </b>';
                              $pivot = $koefisien[$i][$i];
                              for($j=0;$j<$persamaan+1;$j++){
                                    $koefisien[$i][$j]=$koefisien[$i][$j]/$pivot;
                              }

                              for($k=0;$k<$persamaan;$k++){
                                    if($k!=$i){
                                          $pivot = $koefisien[$k][$i];
                                          for($l=0;$l<$persamaan+1;$l++){
                                                $koefisien[$k][$l]=$koefisien[$k][$l]-$pivot*$koefisien[$i][$l];
                                          }

                                    }
                                    $persamaan_change = $k +1 ;
                                    echo '<b>Persamaan '. $persamaan_change .' telah dirubah </b><p></p>';
                                    showMatrik($koefisien);
                              }

                        }    
                  }

                  ?>
            </div>

      </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>