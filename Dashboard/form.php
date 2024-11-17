<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form with Validation</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: url('img/bg.jpg') no-repeat center center/cover;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"], input[type="email"], input[type="password"], textarea, select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      margin-bottom: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    input[type="radio"], input[type="checkbox"] {
      margin-right: 10px;
    }

    .error {
      color: red;
      font-size: 0.9rem;
    }

    button {
      display: inline-block;
      padding: 10px 15px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 400px;
    }

    .close-btn {
      color: red;
      float: right;
      font-size: 1.5rem;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Registration Form</h2>
    <form id="registrationForm">
      <!-- Full Name -->
      <div class="form-group">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" placeholder="Enter your full name" required>
      </div>

      <!-- Email Address -->
      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
        <span class="error" id="passwordError"></span>
      </div>

      <!-- Gender -->
      <div class="form-group">
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required> Male
        <input type="radio" id="female" name="gender" value="Female"> Female
      </div>

      <!-- Interests -->
      <div class="form-group">
        <label>Interests:</label>
        <input type="checkbox" name="interest" value="Music"> Music
        <input type="checkbox" name="interest" value="Sports"> Sports
        <input type="checkbox" name="interest" value="Technology"> Technology
        <input type="checkbox" name="interest" value="Traveling"> Traveling
        <input type="checkbox" name="interest" value="Reading"> Reading
        <input type="checkbox" name="interest" value="Fishing"> Fishing
        
      </div>

      <!-- Country -->
      <div class="form-group">
        <label for="country">Country:</label>
        <select id="country" name="country" required>
          <option value="">Select your country</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Pakistan">Pakistan</option>
          <option value="USA">USA</option>
          <option value="Canada">Canada</option>
          <option value="Australia">Australia</option>
          <option value="UK">UK</option>
          <option value="Germany">Germany</option>
          
        </select>
      </div>

      <!-- Message -->
      <div class="form-group">
        <label for="message">Additional Comments:</label>
        <textarea id="message" name="message" placeholder="Enter your comments" rows="5"></textarea>
      </div>

      <!-- Submit Button -->
      <button type="submit">Submit</button>
    </form>
  </div>

  <!-- Modal -->
  <div id="successModal" class="modal">
    <div class="modal-content">
      <span class="close-btn">&times;</span>
      <h2>Form Submitted Successfully</h2>
      <p id="userData"></p>
    </div>
  </div>

  <script>
    // Password validation and form handling
    const form = document.getElementById('registrationForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');
    const modal = document.getElementById('successModal');
    const modalClose = document.querySelector('.close-btn');
    const userData = document.getElementById('userData');

    // Load saved data from local storage
    window.onload = () => {
      const savedData = JSON.parse(localStorage.getItem('formData'));
      if (savedData) {
        form.fullName.value = savedData.fullName;
        form.email.value = savedData.email;
        form.gender.value = savedData.gender;
        form.country.value = savedData.country;
        form.message.value = savedData.message;
      }
    };

    // Password matching validation
    confirmPassword.addEventListener('input', () => {
      if (password.value !== confirmPassword.value) {
        passwordError.textContent = 'Passwords do not match';
      } else {
        passwordError.textContent = '';
      }
    });

    // Form submission event
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      if (password.value !== confirmPassword.value) {
        passwordError.textContent = 'Passwords do not match';
        return;
      }

      // Save form data in local storage
      const formData = {
        fullName: form.fullName.value,
        email: form.email.value,
        gender: form.gender.value,
        country: form.country.value,
        message: form.message.value
      };

      localStorage.setItem('formData', JSON.stringify(formData));

      // modal with user information
      userData.innerHTML = `
        <strong>Full Name:</strong> ${formData.fullName}<br>
        <strong>Email:</strong> ${formData.email}<br>
        <strong>Gender:</strong> ${formData.gender}<br>
        <strong>Country:</strong> ${formData.country}<br>
        <strong>Message:</strong> ${formData.message || 'No comments'}
      `;
      modal.style.display = 'block';
    });

    // Close modal
    modalClose.onclick = function () {
      modal.style.display = 'none';
    };

    window.onclick = function (event) {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    };
  </script>

</body>
</html>
