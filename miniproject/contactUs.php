<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookify | Contact Us</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #fff;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 350px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form label {
            position: relative;
        }

        .form label .input, .form label .input01 {
            width: 100%;
            padding: 10px 10px 20px 10px;
            outline: 0;
            border: 1px solid rgba(105, 105, 105, 0.397);
            border-radius: 5px;
        }

        .form label .input + span, .form label .input01 + span {
            position: absolute;
            left: 10px;
            top: 15px;
            color: grey;
            font-size: 0.9em;
            cursor: text;
            transition: 0.3s ease;
        }

        .form label .input:focus + span, .form label .input:valid + span,
        .form label .input01:focus + span, .form label .input01:valid + span {
            top: 30px;
            font-size: 0.7em;
            font-weight: 600;
        }

        .form label .input:valid + span, .form label .input01:valid + span {
            color: green;
        }

        button.fancy {
            background-color: transparent;
            border: 2px solid #cacaca;
            padding: 10px;
            cursor: pointer;
            font-size: 14px;
            color: #818181;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        button.fancy:hover {
            background-color: #cacaca;
            color: white;
        }
    </style>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<h1>Give Your Feedback</h1>
&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;&emsp14;
    <form class="form" id="contactForm">
        <div class="flex">
            <label>
                <input required placeholder="" type="text" class="input" name="first_name">
                <span>First Name</span>
            </label>

            <label>
                <input required placeholder="" type="text" class="input" name="last_name">
                <span>Last Name</span>
            </label>
        </div>

        <label>
            <input required placeholder="" type="email" class="input" name="email">
            <span>Email</span>
        </label>

        <label>
            <input required type="tel" placeholder="" class="input" name="phone">
            <span>Contact Number</span>
        </label>

        <label>
            <textarea required rows="3" placeholder="" class="input01" name="message"></textarea>
            <span>Message</span>
        </label>

        <button type="submit" class="fancy">Submit</button>
    </form>

    <!-- Bootstrap Modal for Success Message -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Feedback Submitted</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your feedback has been submitted successfully. Thanks for your feedback.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="redirectToHome()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show the modal popup notification
        function showPopup() {
            $('#successModal').modal('show');
        }

        // Redirect to index.php on modal close
        function redirectToHome() {
            window.location.href = 'index.php';
        }

        // Prevent form submission and show the modal
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            showPopup(); // Show the success modal
        });
    </script>
</body>
</html>
