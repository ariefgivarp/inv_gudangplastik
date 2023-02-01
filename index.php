<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libraries/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!--JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Login | UD. Lancar Plastik</title>
</head>

<body>
    <?php
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
        echo "";
    }
    // jika alert = 1
    // tampilkan pesan Gagal "Username atau Password salah, cek kembali Username dan Password Anda"
    elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Gagal Login!</h4>
                Username atau Password salah, cek kembali Username dan Password Anda.
              </div>";
    }
    // jika alert = 2
    // tampilkan pesan Sukses "Anda telah berhasil logout"
    elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Anda telah berhasil logout.
              </div>";
    }
    ?>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="caixa">
                        <h1 class="text-center txt-caixa">
                            <img src="./assets/img/av.png" alt="" width="200" /><br>
                            Login 
                        </h1>
                        <hr>
                        <form action="cek_login.php" method="POST">
                            <div class="row">
                                <div class="col-lg-9 col-md-9">
                                    <fieldset class="formRow">
                                        <div class="formRow--item">
                                            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                                <input type="text" class="formRow--input js-input" id="user" name="user" placeholder="Username">
                                            </label>
                                        </div>
                                    </fieldset>
                                    <fieldset class="formRow">
                                        <div class="formRow--item">
                                            <label for="firstname" class="formRow--input-wrapper js-inputWrapper">
                                                <input type="password" class="formRow--input js-input" id="pass" name="pass" placeholder="Password ">
                                            </label>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <button type="submit" class="vamos_mudar_um_pouco" title="SIGNIN"><i class="fas fa-sign-in-alt fa-2x"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    <script>
        var $inputItem = $(".js-inputWrapper");
        $inputItem.length && $inputItem.each(function() {
            var $this = $(this),
                $input = $this.find(".formRow--input"),
                placeholderTxt = $input.attr("placeholder"),
                $placeholder;

            $input.after('<span class="placeholder">' + placeholderTxt + "</span>"),
                $input.attr("placeholder", ""),
                $placeholder = $this.find(".placeholder"),

                $input.val().length ? $this.addClass("active") : $this.removeClass("active"),

                $input.on("focusout", function() {
                    $input.val().length ? $this.addClass("active") : $this.removeClass("active");
                }).on("focus", function() {
                    $this.addClass("active");
                });
        });
    </script>
</body>

</html>