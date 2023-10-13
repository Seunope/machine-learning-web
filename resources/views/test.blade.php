<html>
  <style>
    :root {
	/* COLORS */
	--white: #e9e9e9;
	--gray: #333;
	--blue: #0367a6;
	--lightblue: #008997;

	/* RADII */
	--button-radius: 0.7rem;

	/* SIZES */
	--max-width: 758px;
	--max-height: 520px;

	font-size: 16px;
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
		Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

body {
	align-items: center;
	background-color: var(--white);
	/* background: url("https://res.cloudinary.com/dci1eujqw/image/upload/v1616769558/Codepen/waldemar-brandt-aThdSdgx0YM-unsplash_cnq4sb.jpg"); */
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	display: grid;
	height: 100vh;
	place-items: center;
}

.form__title {
	font-weight: 300;
	margin: 0;
	margin-bottom: 1.25rem;
}

.link {
	color: var(--gray);
	font-size: 0.9rem;
	margin: 1.5rem 0;
	text-decoration: none;
}

.container {
	background-color: var(--white);
	border-radius: var(--button-radius);
	box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
		0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
	height: var(--max-height);
  /* height: 50%; */
	max-width: var(--max-width);
	overflow: hidden;
	position: relative;
	width: 100%;
}

.container__form {
	height: 100%;
	position: absolute;
	top: 0;
	transition: all 0.6s ease-in-out;
}

.container--signin {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .container--signin {
	transform: translateX(100%);
}

.container--signup {
	left: 0;
	opacity: 0;
	width: 50%;
	z-index: 1;
}

.container.right-panel-active .container--signup {
	animation: show 0.6s;
	opacity: 1;
	transform: translateX(100%);
	z-index: 5;
}

.container__overlay {
	height: 100%;
	left: 50%;
	overflow: hidden;
	position: absolute;
	top: 0;
	transition: transform 0.6s ease-in-out;
	width: 50%;
	z-index: 100;
}

.container.right-panel-active .container__overlay {
	transform: translateX(-100%);
}

.overlay {
	background-color: var(--lightblue);
	background: url("https://res.cloudinary.com/dci1eujqw/image/upload/v1616769558/Codepen/waldemar-brandt-aThdSdgx0YM-unsplash_cnq4sb.jpg");
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
	height: 100%;
	left: -100%;
	position: relative;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
	width: 200%;
}

.container.right-panel-active .overlay {
	transform: translateX(50%);
}

.overlay__panel {
	align-items: center;
	display: flex;
	flex-direction: column;
	height: 100%;
	justify-content: center;
	position: absolute;
	text-align: center;
	top: 0;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
	width: 50%;
}

.overlay--left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay--left {
	transform: translateX(0);
}

.overlay--right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay--right {
	transform: translateX(20%);
}

.btn {
	background-color: var(--blue);
	background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
	border-radius: 20px;
	border: 1px solid var(--blue);
	color: var(--white);
	cursor: pointer;
	font-size: 0.8rem;
	font-weight: bold;
	letter-spacing: 0.1rem;
	padding: 0.9rem 4rem;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

.form > .btn {
	margin-top: 1.0rem;
}

.btn:active {
	transform: scale(0.95);
}

.btn:focus {
	outline: none;
}

.form {
	background-color: var(--white);
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 3rem;
	height: 100%;
	text-align: center;
}

.input {
	background-color: #fff;
	border: none;
	padding: 0.9rem 0.9rem;
	margin: 0.5rem 0;
	width: 100%;
}
.select {
	background-color: #fff;
	border: none;
	padding: 0.9rem 0.9rem;
	margin: 0.5rem 0;
	width: 100%;
}

@keyframes show {
	0%,
	49.99% {
		opacity: 0;
		z-index: 1;
	}

	50%,
	100% {
		opacity: 1;
		z-index: 5;
	}
}

  </style>
  <body>
      @include('flash::message')
      <div class="container right-panel-active">
      <!-- Sign Up -->
      <div class="container__form container--signup">
        <form action="#" class="form" id="form1">
          <h2 class="form__title">Register</h2>
          <input type="text" placeholder="Full name" class="input" />
          <input type="email" placeholder="email" class="input" />
          <button class="btn" id="signIn">Submit</button>
        </form>
      </div>

      <!-- Sign In -->
      <div class="container__form container--signin">
        <!-- <form action="{{route('computeRepayment')}}" method="post" class="form"> -->
        <form action="" class="form" id="computeRepayment">

        
         @csrf
          <h2 class="form__title">Repayment Calculator</h2>
<!-- 
          @foreach($errors->get('age') as $message)
          <input type="text" placeholder="Age" class="input"  name="age"  value="{!! old('age') !!}" require/>
          @endforeach -->
          <input type="text" placeholder="Age" class="input"  id="age"  value="{!! old('age') !!}" required/>

          <!-- <input type="email" placeholder="Gender"  name="gender"  class="input" require/> -->
          <input type="text" placeholder="Location"  id="location"  class="input"  required/>
          <input type="number" placeholder="Loan"  id="loan"  class="input" required />
          <input type="number" placeholder="Loan tenor" id="loanTenor" class="input" required />
          <!-- <input type="text" placeholder="Marital status" name='maritalStatus' class="input" require /> -->
          <label for="maritalStatus">Marital Status:</label>
          <select id="maritalStatus" required>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorce">Divorce</option>
          </select>
          <label for="gender">Gender:</label>
          <select id="maritalStatus" required>
            <option value="Single">Male</option>
            <option value="Married">Female</option>
          </select>
          <button class="btn" >Compute </button>
          <!-- <input type="submit" class="btn btn-primary btn-pill" value="Compute"> -->

        </form>
      </div>

      <!-- Overlay -->
      <div class="container__overlay">
        <div class="overlay">
          <div class="overlay__panel overlay--left">
            <!-- <button class="btn" id="signIn">Register</button> -->
          </div>
          <div class="overlay__panel overlay--right">
            <button class="btn" id="signUp">Try Again</button>
          </div>
        </div>
      </div>
    </div>

  </body>

  <script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signInBtn.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    fistForm.addEventListener("submit", (e) => e.preventDefault());


    // Submit
    let computeRepayment = document.getElementById("computeRepayment");
    computeRepayment.addEventListener("submit", (e) => {
      e.preventDefault();

      let age = document.getElementById("age");
      let location = document.getElementById("location");

      if (age.value == "" || location.value == "") {
        alert("Ensure you input a value in both fields!");
      } else {
        // perform operation with form input

        const result = postData({age:30,female:1 })
        alert(`Result: ${result.message}`);
        console.log(JSON.stringify(result));

      
      }

  });

  function postData(data) {
    fetch('http://localhost:8000', {
      method: 'GET', 
      // body: JSON.stringify(data), 
      headers:{
        // "Header":"Origin",
        // "Access-Control-Allow-Origin": '*',
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => console.log(data));
  }

// const data = {username: 'example'};

  </script>
</html>
