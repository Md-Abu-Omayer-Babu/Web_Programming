function validateForm() {
    let isValid = true;
  
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const department = document.getElementById("department").value;
    const dob = document.getElementById("dob").value;
    const address = document.getElementById("address").value.trim();
  
    // Clear previous errors
    document.querySelectorAll('.error').forEach(el => el.innerText = "");
  
    // Name validation
    if (name === "") {
      document.getElementById("nameError").innerText = "Name is required.";
      isValid = false;
    }
  
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      document.getElementById("emailError").innerText = "Enter a valid email.";
      isValid = false;
    }
  
    // Phone validation
    const phoneRegex = /^[0-9]{10}$/;
    if (!phoneRegex.test(phone)) {
      document.getElementById("phoneError").innerText = "Enter a 10-digit phone number.";
      isValid = false;
    }
  
    // Department
    if (department === "") {
      document.getElementById("deptError").innerText = "Select a department.";
      isValid = false;
    }
  
    // DOB validation
    if (dob === "") {
      document.getElementById("dobError").innerText = "Select date of birth.";
      isValid = false;
    }
  
    // Address validation
    if (address === "") {
      document.getElementById("addressError").innerText = "Address is required.";
      isValid = false;
    }
  
    return isValid;
  }
  