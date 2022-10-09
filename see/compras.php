<?php @$code=$_REQUEST['code']?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href='../vendor/boxicon/css/boxicons.css' rel='stylesheet'>
    <script src="../assets/js/jquery-3.6.1.js"></script>
    <title>Document</title>
</head>
<style>
  body{
    overflow-y: hidden;
  }
</style>
<body>
<div class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <h1>
                        <i class='bx bx-package'></i>Stock schop
                    </h1>
                </div> 
                <div></div>
            </div>
            <div class="corpo">
                <nav>
                  <div class="nave">
                    <a href="../index.php"><i class='bx bx-home'></i><br>home</a>
                    <a href="../relatorio.php"><i class='bx bx-hdd'></i> relatorio</a>
                    <a href="../cadastro.php"><i class='bx bx-archive'></i>cadastro</a>
                    <a href="../compras.php"><i class='bx bx-clipboard'></i>Compras</a>
                    <a href="../cc/"><i class='bx bxs-calculator'></i>Operadores</a>
                  </div>
                </nav>
                <section style="width:100%">
                        <div>
                            <div>
                              <h2>
                                <a href="./view.php?code=<?=@$_REQUEST['code']?>" class="voltar"><i class='bx bx-chevron-left'></i></a>
                                Lista das compras: <?=@$_REQUEST['code']?>
                              </h2>
                            </div>
                            <div></div>
                        </div>
                    <div class="tabela">
                        <table>
                          <tr>
                            <th>Cout</th>
                            <th>Data</th>
                            <th>Produto</th>
                            <th>Preco</th>
                            <th>Qtd</th>
                            <th>Total</th>
                          </tr>
                          <?php
                          require '../cc/config.php';
                          $rows = mysqli_query($conn, "SELECT * FROM compras WHERE id_relatorio = ".$_REQUEST['code']."");
                          $i = 1;
                          ?>
                          <?php foreach($rows as $row) : ?>
                            <tr id = <?php echo $row["id"]; ?>>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row["Data"]; ?></td>
                            <td><?php echo $row["Produto"]; ?></td>
                            <td><?php echo number_format($row["Preco"], 2, ',', '.')." AOA" ?></td>
                            <td><?php echo $row["Quantidade"]; ?></td>
                            <td><?php echo number_format($row["Total"], 2, ',', '.')." AOA" ?></td>
                            <?php $total+=$row["Total"]; $i++?>
                          </tr>
                          <?php endforeach; ?>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div style="position: absolute;top:10px;right:10px;color:white">
      <?= '
        <h1>'.number_format($total, 2, ',', '.').' AOA</h1>
        '?>
    </div>
    <?php require 'script.php'; ?>
  </body>
</html>