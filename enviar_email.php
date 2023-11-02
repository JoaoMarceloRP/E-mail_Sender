<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Enviar Email</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        background-image: url('img/abstract-luxury-gradient-blue-background-smooth-dark-blue-with-black-vignette-studio-banner_1258-54050.avif');
        background-size: cover;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
    
<div class="container">
  <main>
    <div class="py-5 text-center">
    </div><br><br>

    <div class="col">
      <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
          <h1 class=> Envie Seus Emails Aqui</h1><br>
          <div class="row g-5">
            <div class="col-md-7 col-lg-8">
              <form action="envio_email.php" action="estatistica.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">

                  <div class="col-md-6">
                    <label for="floatingInput" class="form-label">De:</label>
                    <select name="ffrom" class="form-select" required>
                    <option>joaomaropi@gmail.com</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label for="floatingInput" class="form-label">Para:</label>
                    <select name="fto" class="form-select" required>
                      <?php
					              require_once 'conexao.php';
                        $stmt = $conn->prepare("SELECT email FROM usuario");
                        $stmt->execute();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                          echo '<option value="'.$row['email'].'">'.$row['email'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  
                  <div class="col-12">
                    <label for="floatingInput" class="form-label">Assunto:</label>
                    <input type="text" name="fsubject" class="form-control">
                  </div><br>
      
                  <div class="col-13">
                    <label for="floatingInput" class="form-label">Mensagem:</label>
                    <textarea type="text" style="height: 150px" name="fmessage" class="form-control" required></textarea><br>
                    <label for="anexo">Anexo:</label><br>
                    <input type="file" name="anexo"><br><br>
                    <button name="enviar"class="w-100 btn btn-primary btn-lg" type="submit">Enviar</button>
                  </div>
      
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="js/bootstrap.js"></script>
</html>