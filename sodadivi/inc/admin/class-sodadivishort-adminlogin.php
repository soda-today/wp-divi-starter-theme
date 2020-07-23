<?php

class SODADIVISHORT_Adminlogin {
  public function load() {
    add_action( 'login_enqueue_scripts', [ $this, 'set_login_logo' ] );
    add_filter( 'login_headerurl', [ $this, 'set_login_logo_url' ] );
  }

  public function set_login_logo() {
  ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
          background-image: url(<?php echo get_template_directory_uri() ?>/assets/img/admin-logo.png);
          height:73px;
          width:300px;
          background-size: 300px 73px;
          background-repeat: no-repeat;
          backgound-position: center;
          margin-bottom: 36px;
        }

        .login #login #login_error,
        .login #login .message,
        .login #login .success {
          border-left: 4px solid #00A5FF;
        }

      .wp-core-ui #login .button-primary {
        background: #00A5FF;
        border-color: #00A5FF #00A5FF #00A5FF;
        box-shadow: 0 1px 10px rgba(0, 0, 0, 0.07);
        color: #fff;
        text-shadow: none;
      }

      #login input[type=checkbox]:focus,
      #login input[type=color]:focus,
      #login input[type=date]:focus,
      #login input[type=datetime-local]:focus,
      #login input[type=datetime]:focus,
      #login input[type=email]:focus,
      #login input[type=month]:focus,
      #login input[type=number]:focus,
      #login input[type=password]:focus,
      #login input[type=radio]:focus,
      #login input[type=search]:focus,
      #login input[type=tel]:focus,
      #login input[type=text]:focus,
      #login input[type=time]:focus,
      #login input[type=url]:focus,
      #login input[type=week]:focus,
      #login select:focus,
      #login textarea:focus {
        border-color: #00A5FF;
        box-shadow: 0 0 2px rgba(0,0,0,.1);
        outline: 2px solid transparent;
      }

      #loginform {
        border: 0px;
        border-radius: 6px;
        box-shadow: 0 13px 15px 0 rgba(0, 0, 0, 0.1);
      }

      #loginform #wp-submit {
        margin: 0px auto;
        display: block;
        float: none;
      }

      .login #loginform label {
        width: 100%;
        display: block;
        margin-top: 0px;
      }

      .login #loginform .input {
        margin: 10px 0px 20px;
        width: 100%;
      }
    </style>
  <?php
  }

  public function set_login_logo_url() {
    return home_url();
  }
}
