// Validate the form fields
function validateForm() {
    const fields = ['name', 'email', 'phone', 'dob', 'gender', 'department', 'address', 'roll'];
    for (let id of fields) {
      let val = document.forms["studentForm"][id].value;
      if (val === "") {
        alert("Please fill all fields.");
        return false;
      }
    }
    const email = document.forms["studentForm"]["email"].value;
    if (!email.includes("@")) {
      alert("Enter a valid email.");
      return false;
    }
    return true;
  }
  
  // Fetch students from the API and display them
  function fetchStudents() {
    fetch('get_students.php')
      .then(response => response.json())
      .then(data => {
        const studentsTable = document.getElementById("studentsTable");
        studentsTable.innerHTML = ""; 
  
        if (data.length === 0) {
          studentsTable.innerHTML = "<tr><td colspan='8'>No students found.</td></tr>";
        } else {
          data.forEach(student => {
            const row = document.createElement("tr");
  
            row.innerHTML = `
              <td>${student.id}</td>
              <td>${student.name}</td>
              <td>${student.roll}</td>
              <td>${student.email}</td>
              <td>${student.phone}</td>
              <td>${student.dob}</td>
              <td>${student.gender}</td>
              <td>${student.department}</td>
              <td>${student.address}</td>
            `;
  
            studentsTable.appendChild(row);
          });
        }
      })
      .catch(error => console.error("Error fetching student data:", error));
  }
  
  // Fetch and display student data when the page loads
  window.onload = function() {
    fetchStudents();
  };
  