<html lang="en"><head>
    <title>Add Employee</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
:root {
  --input-padding-x: 1.5rem;
  --input-padding-y: .75rem;
}

body {
  background: #007bff;
  background: linear-gradient(to right, #EE7F09, #EE0909);
}

.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.card-signin .card-title {
  margin-bottom: 2rem;
  font-weight: 300;
  font-size: 1.5rem;
}

.card-signin .card-img-left {
  width: 45%;
  /* Link to your background image using in the property below! */
  background: scroll center url('https://cdn.majra.me/company-images/294/main-1573465427.png');
  background-size: cover;
}

.card-signin .card-body {
  padding: 2rem;
}

#AddEmp {
  width: 100%;
}

#AddEmp .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  transition: all 0.2s;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group input {
  height: auto;
  border-radius: 2rem;
}

.form-label-group>input,
.form-label-group>label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group>label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0;
  /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
  padding-bottom: calc(var(--input-padding-y) / 3);
}

.form-label-group input:not(:placeholder-shown)~label {
  padding-top: calc(var(--input-padding-y) / 3);
  padding-bottom: calc(var(--input-padding-y) / 3);
  font-size: 12px;
  color: #777;
}
</style></head>




  <body>
  <div class="container">

  <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="AdminPage.php"><img src="../img/logo.svg" width="100px"></a>
    </div>
</nav>
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Add Employee</h5>
            <form id="AddEmp" method="post">

         

              <div class="form-label-group">
                <input type="text" id="Name" name="Name" class="form-control" placeholder="Name" required>
                <label for="Name">Name</label>
              </div>


              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">Email address</label>
              </div>
              <hr>

              <div class="form-label-group">
                <input type="text" id="Position" name="Position" class="form-control" placeholder="Position" required>
                <label for="Position">Position</label>
              </div>

              <div class="form-label-group">
                <input type="date" id="hireDate" name="hireDate" class="form-control" placeholder="Hire Date" required>
                <label for="hireDate">Hire Date</label>
              </div>
              

              <div class="form-label-group">
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
                <label for="address">Address</label>
              </div>

              <div class="form-label-group">
                <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Phone Number" required>
                <label for="phonenumber">Phone Number</label>
              </div>

              <div class="form-label-group">
                <input type="number" id="age" name="age" class="form-control" placeholder="Age" required>
                <label for="age">Age</label>
              </div>

              <div class="form-label-group">
                <input type="number" id="salary" name="salary" class="form-control" placeholder="Salary" required>
                <label for="salary">Salary</label>
              </div>
              <hr>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" name="inputConfirmPassword" class="form-control" placeholder="Password" required>
                <label for="inputConfirmPassword">Confirm password</label>
              </div>
              
              <div class="row" style="
    align-items: flex-start;
    margin-left: 55;
    margin-left: 55px;">
      <span class="col-form-label" style="display: inline-block;">Gender</span>
      <div class="col" style="
    padding-top: 8px;">
        <div class="form-check" style="display: inline-block;margin-right: 10px;">
          <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
          <label class="form-check-label" for="gender">
            Male
          </label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" type="radio" name="gender" id="female" value="female">
          <label class="form-check-label" for="gender">
            Female
          </label>
        </div>
      </div>
    </div>

              <input class="btn btn-lg btn-danger btn-block text-uppercase" type="submit" value="Add">
              <hr class="my-4">
              <p id="errorMsg" class="d-block text-center mt-2 small text-danger"></p>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/AddEmp.js"></script>

</body></html>