<?php require_once "code.php" ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
    .edit{
        cursor:pointer;
        color:black;
        
      }
      .delete{
        color:#ff3333;
        cursor:pointer;
        text-align:center;
      }
      .text-center{
        text-align:center;

      }
      .right{
        float:right;
      }
      table th{
        text-align:center;
        background-color:#696969;
        border:1px solid  #3d3d29;

      }
      table td{
        border:1px solid  #3d3d29;
        background-color: white;
        text-align:center;
      }
      .h3{
        font: 30px 'Martel', serif;
        color: white;
      }
    </style>
</head>

<body class="container">
<section id="first" >
  
  <div  class="header">
      <h1 id="header" class="first">Xoş Gəlmisiz!!</h1>
  </div>
  <div  id="body" class="body">
     <p >Qeydiyyat üçün növbəti səhifəyə keçid edə bilərsiz</p>
     <a><i onclick="Kec()" class="material-icons arrow">arrow_forward</i></a>
  </div>

</section>
<section style="display:none" id="second" >
    <h3 class=" h3 text-center">Qeydiyyat Siyahısı</h3>
    <a class="waves-effect waves-light btn modal-trigger right" href="#modal1">Əlavə Et</a>
    <table id="table" class="highlight">
        <thead>
            <tr>
                <th>S/N</th>
                <th>Şəkil</th>
                <th>Ad Soyad</th>
                <th>Vəzifə</th>
                <th>Maaş</th>
                <th>Email</th>
                <th>Ailə Vəziyyəti</th>
                <th>Haqqında</th>
                <th>Qeydiyyat Tarixi</th>
                <th>Əməliyyatlar</th>
            </tr>
        </thead>

        <tbody>
            <?php for ($i = 0; $i < count($data); $i++) { ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td></td>
                    <td><?= $data[$i]["AdSoyad"] ?></td>
                    <td><?= $data[$i]["Vezife"] ?></td>
                    <td><?= $data[$i]["Maas"] ?> AZN</td>
                    <td><?= $data[$i]["email"] ?></td>
                    <td><?= $data[$i]["av"] ?></td>
                    <td><button class="waves-effect waves-light btn btn-small">Bax</button></td>
                    <td><?= substr($data[$i]["qeyd_tarixi"],0,10) ?></td>
                    <td>
                        <i class="material-icons edit">edit</i>
                        <a onclick="sil(<?= $data[$i]['id'] ?>)"><i class="material-icons delete">delete</i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <!-- Modal Structure -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>İşçi əlavə Etmə</h4>
            <div class="row">
                <form method="POST" action="#" enctype="multipart/form-data" class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Ad Soyad " id="AdSoyad" type="text" name="x" class="validate">
                            <label for="AdSoyad">Ad Soyad</label>
                        </div>
                        <div class="col s6 file-field input-field">
                            <div class="btn">
                                <span>Şəkil yüklə</span>
                                <input type="file" name="sekil" />
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Vəzifə daxil edin.." id="vezife" type="text" name="vezife" class="validate">
                            <label for="vezife">Vəzifə</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Maaş daxil edin.." id="maas" type="number" step="0.01" name="maas" class="validate">
                            <label for="maas">Maaş</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Email daxil edin.." id="email" type="email" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <select name="av">
                                <option value="" disabled selected>Ailə Vəziyyəti Seçin</option>
                                <option value="Evli">Evli</option>
                                <option value="Subay">Subay</option>
                            </select>
                            <label>Ailə Vəziyyəti</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" name="haqqinda"></textarea>
                            <label for="textarea1">Haqqında</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="qeydiyyat" class="modal-close waves-effect waves-green btn-flat">Əlavə Et</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="scripts.js"></script>
    <script>
      function Kec(){
        var txt;
      if (confirm("Qeydiyyatdan keçmək istəyirsizmi?")) {
         document.getElementById("first").style.display="none";
        // document.getElementById("header").style.display="none";     
        // document.getElementById("body").style.display="none";
        document.getElementById("second").style.display="block";
        document.getElementById("second").style.height="500px";
        document.getElementById("second").style.background="linear-gradient(rgba(0,0,0, .7),rgba(0,0,0, .7)),url('../db/1.jfif')";
        document.body.style.backgroundColor = "#3b444b";
        
     } else {
       
     }
        
      }
      function sil(id){
     if( confirm("Məlumatın silmək istəyirsizmi ?")){
        location.href = `index.php?sil=ok&id=${id}`
     }
     else{
         
     }
}

    </script>
</body>

</html>