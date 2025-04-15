function fetchEmployees() {
    fetch('get_employee.php')
      .then(response => response.json())
      .then(data => {
        const tableBody = document.getElementById("employeeTable");
        tableBody.innerHTML = "";
  
        if (data.length === 0) {
          tableBody.innerHTML = "<tr><td colspan='8'>No employee profiles found.</td></tr>";
          return;
        }
  
        data.forEach(emp => {
          const row = document.createElement("tr");
          row.innerHTML = `
            <td>${emp.name}</td>
            <td>${emp.emp_id}</td>
            <td>${emp.email}</td>
            <td>${emp.phone}</td>
            <td>${emp.department}</td>
            <td>${emp.designation}</td>
            <td>${emp.gender}</td>
            <td>${emp.address}</td>
          `;
          tableBody.appendChild(row);
        });
      })
      .catch(error => {
        console.error("Error fetching employee data:", error);
      });
  }
  
  window.onload = fetchEmployees;
  