<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookify | SignUp</title>

  <!-- favicon-->
  <link rel="shortcut icon" href="./images/company-logo.svg" type="image/svg+xml">

    <link href="https://fonts.googleapis.com/css2?family=Lucida+Sans&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        .form-container {
            width: 350px;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
            display: none;
        }

        .title {
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            margin: 10px 0 20px 0;
            font-size: 28px;
            font-weight: 800;
        }

        .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 15px;
        }

        .input,
        .select {
            border-radius: 20px;
            border: 1px solid #c0c0c0;
            outline: 0 !important;
            box-sizing: border-box;
            padding: 12px 15px;
            font-family: "Lucida Sans", sans-serif;
            font-size: 14px;
        }

        .form-btn {
            padding: 10px 15px;
            font-family: "Lucida Sans", sans-serif;
            border-radius: 20px;
            border: 0 !important;
            outline: 0 !important;
            background: teal;
            color: white;
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .form-btn:active {
            box-shadow: none;
        }

        .sign-up-label {
            text-align: center;
            margin: 0;
            font-size: 12px;
            color: #747474;
            font-family: "Lucida Sans", sans-serif;
        }

        .sign-up-link {
            margin-left: 1px;
            font-size: 12px;
            text-decoration: underline;
            text-decoration-color: teal;
            color: teal;
            cursor: pointer;
            font-weight: 800;
        }

        .next-btn {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: teal;
            color: white;
            border-radius: 20px;
            border: 0;
            cursor: pointer;
        }

        .next-btn:active {
            background-color: #008080;
        }

        .form-container.active {
            display: block;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }


    </style>
</head>

<body>

    <!-- Step 1 Form: Collect Name, Email, Password -->
    <div id="step1" class="form-container active">
        <p class="title">Create Account</p>
        <form id="form1" class="form" name="form1">
            <input type="text" id="name" class="input" placeholder="Full Name" required/>
            <div id="nameError" class="error-message"></div>
            <input type="email" id="email" class="input" placeholder="Email" required />
            <div id="emailError" class="error-message"></div>
            <input type="password" id="password" class="input" placeholder="Password" required />
            <button type="button" class="next-btn" onclick="nextStep()">Next</button>
        </form>
    </div>

    <!-- Step 2 Form: Collect Phone, Address, City, and State -->
    <div id="step2" class="form-container">
        <p class="title">Create Account</p>
        <form id="form2" class="form" method="POST" action="signupAction.php" name="form2">
            <!-- Hidden fields to carry over values from form1 -->
            <input type="hidden" name="name" id="name_hidden">
            <input type="hidden" name="email" id="email_hidden">
            <input type="hidden" name="password" id="password_hidden">

            <input type="text" name="username" class="input" placeholder="Username" required 
              pattern="[a-zA-Z]+" title="Only alphabet characters are allowed." />
            <input type="text" name="phone" class="input" placeholder="Phone Number" minlength="10" maxlength="10" required 
              pattern="[0-9]+" title="Please enter exactly 10 digits." />
            <input type="text" name="addressLine1" class="input" placeholder="Address Line 1" required />
            <input type="text" name="addressLine2" class="input" placeholder="Address Line 2" />
            <input type="text" name="city" class="input" placeholder="City" required 
              pattern="[a-zA-Z]+" title="Only alphabet characters are allowed."/>
            <select name="state" class="select" required>
			<option value="" disabled selected>Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Delhi">Delhi</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Puducherry">Puducherry</option>
    </select>
            <button type="submit" class="form-btn">Create Account</button>
        </form>
    </div>

    <script>
        // JavaScript function to switch between forms and pass values
        function nextStep() {
            // Get values from form1 inputs
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (name && email && password) {
                // Set hidden fields in form2 with values from form1
                document.getElementById('name_hidden').value = name;
                document.getElementById('email_hidden').value = email;
                document.getElementById('password_hidden').value = password;

                // Regular expression for name (alphabets only)
                const nameRegex = /^[a-z A-Z]+$/;

                // Regular expression for email
                const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                // Remove previous error messages
                document.getElementById('nameError').innerHTML = '';
                document.getElementById('emailError').innerHTML = '';

                let isValid = true;

                // Validate Name
                if (!nameRegex.test(name)) {
                    document.getElementById('nameError').innerHTML = 'Only use Alphabets in Name';
                    isValid = false;
                }

                // Validate Email
                if (!emailRegex.test(email)) {
                    document.getElementById('emailError').innerHTML = 'Please enter a valid Email address';
                    isValid = false;
                }

                // Proceed to the next step if both validations pass
                if (isValid) {
                    // Hide Step 1 and Show Step 2 if validations pass
                    document.getElementById('step1').classList.remove('active');
                    document.getElementById('step2').classList.add('active');
                }
     
                
            } else {
                alert('Please fill out all fields.');
            }
        }
    </script>

</body>

</html>
