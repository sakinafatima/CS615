<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Bootstrap 4 with CSS and js.">
  <meta name="author" content="Sheetal">
  <title>Register</title>
  <!-- Favicon -->
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link type="text/css" href="./assets/css/style.css?v=1.0.0" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="index.html">
          <img src="./assets/img/brand/white.png" />
        </a>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Register to S&S Researchers for free</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <h3>Sign up with credentials</h3>
              </div>
              <!-- Form Start -->
              <form role="form" name="form1" method="post"  action="UserRegister.php">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" name="name" type="text" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email" required>
                  </div>
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" name="password" class="form-control" placeholder="Password" type="password" onKeyUp="checkPasswordStrength();" required>
                  </div>
                </div>
                <div class="text-muted font-italic" style="margin-bottom: 1.5rem;"><small id="passwordString"></small><small><span id="passwordStrength"></span></small></div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="passwordMatch" class="form-control" name="cpassword" placeholder="Confirm Password" type="password" onKeyUp="checkPasswordMatch();" required>
                  </div>
                </div>
                <div class="text-muted font-italic" style="margin-bottom: 1.5rem;"><small><span id="passwordMatchTooltip"></span></small></div>
                <div class="form-group" style="margin-top: 1.5rem;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control" placeholder="Date of Birth" name="dob" type="date" required>
                  </div>
                </div>
                <div class="text-muted" style="margin-left:1%;">
                  <h3>Select Gender</h3>
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <label class="radio" style="  margin: 4%;">
                    <input type="radio" name="gender" value="male" required>
                    Male
                  </label>
                  <label class="radio" style="  margin: 4%;">
                    <input type="radio" name="gender" value="female" required>
                    Female
                  </label>
                  <label class="radio" style="margin: 4%;">
                    <input type="radio" name="gender" value="other" required>
                    Others
                  </label>
                </div>
                <div class="text-center">
                  <button id="submitBtn" type="submit" class="btn btn-primary mt-4" name="add" value="Register Now!">Create account</button>
                </div>
              </form>
              <!-- Form End -->
			   <center><a href="sign-in.php" class="text-dark" ><small>Already registered? Login Now!</small></a></center>
             </div>
           
             </div>
      </div>
    </div>
  </div>
  <!-- Core -->
  <script src="./assets/js/jquery.min.js"></script>

  <script>
  // Password Strength Check
    function checkPasswordStrength() {
      var number = /([0-9])/;
      var alphabets = /([a-zA-Z])/;
      var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
      if ($('#password').val().length < 6) {
        $('#passwordString').text("Password Strength: ");
        $('#passwordStrength').addClass('text-danger font-weight-700');
        $('#passwordStrength').text("Weak Password (Atleast 6 words needed)");
      }else{
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
          $('#passwordStrength').removeClass();
          $('#passwordString').text("Password Strength: ");
          $('#passwordStrength').addClass('text-success font-weight-700');
          $('#passwordStrength').text("Strong Password");
        } else {
          $('#passwordStrength').removeClass();
          $('#passwordString').text("Password Strength: ");
          $('#passwordStrength').addClass('text-warning font-weight-700');
          $('#passwordStrength').text("Moderate Password (Should have alphabets,numbers and special characters)");
        }
      }
    }
  </script>
  <script>
  //  Password Match Check
    function checkPasswordMatch() {
      if ($('#password').val().length < 1 || $('#password').val() == "") {
        $('#passwordMatchTooltip').removeClass();
        $('#passwordMatchTooltip').text("");
        $('#submitBtn').attr('disabled', true);
      } else {
        if ($('#password').val() != $('#passwordMatch').val()) {
          $('#passwordMatchTooltip').addClass('text-danger font-weight-700');
          $('#passwordMatchTooltip').text("Password doesn't match");
          $('#submitBtn').attr('disabled', true);
        } else {
          $('#passwordMatchTooltip').removeClass();
          $('#passwordMatchTooltip').addClass('text-success font-weight-700');
          $('#passwordMatchTooltip').text("Password matched");
          $('#submitBtn').attr('disabled', false);
        }
      }
    }
  </script>
</body>

</html>
