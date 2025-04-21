function loadTeachers() {
    fetch('get_teachers.php')
      .then(res => res.json())
      .then(data => {
        const table = document.getElementById('teacherTable');
        table.innerHTML = '';
        data.forEach(teacher => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${teacher.name}</td><td>${teacher.subject}</td><td>${teacher.email}</td>
            <td>${teacher.phone}</td><td>${teacher.address}</td><td>${teacher.department}</td>
            <td>${teacher.dob}</td>
            <td><button onclick="editTeacher(${teacher.id}, '${teacher.name}', '${teacher.subject}', '${teacher.email}', '${teacher.phone}', '${teacher.address}', '${teacher.department}', '${teacher.dob}')">Edit</button></td>
          `;
          table.appendChild(row);
        });
      });
  }
  
  function editTeacher(id, name, subject, email, phone, address, department, dob) {
    document.getElementById("editFormTitle").style.display = "block";
    
    document.getElementById("editForm").style.display = "block";
    document.getElementById("editId").value = id;
    document.getElementById("editName").value = name;
    document.getElementById("editSubject").value = subject;
    document.getElementById("editEmail").value = email;
    document.getElementById("editPhone").value = phone;
    document.getElementById("editAddress").value = address;
    document.getElementById("editDepartment").value = department;
    document.getElementById("editDOB").value = dob;
  }
  
  document.getElementById("editForm").addEventListener("submit", function(e) {
    e.preventDefault();
  
    const formData = new FormData();
    formData.append("editId", document.getElementById("editId").value);
    formData.append("editName", document.getElementById("editName").value);
    formData.append("editSubject", document.getElementById("editSubject").value);
    formData.append("editEmail", document.getElementById("editEmail").value);
    formData.append("editPhone", document.getElementById("editPhone").value);
    formData.append("editAddress", document.getElementById("editAddress").value);
    formData.append("editDepartment", document.getElementById("editDepartment").value);
    formData.append("editDOB", document.getElementById("editDOB").value);
  
    fetch('update_teacher.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(responseText => {
      alert("Teacher updated.");
      document.getElementById("editForm").reset();
      document.getElementById("editForm").style.display = "none";
      loadTeachers();  // Reload table
    })
    .catch(error => {
      console.error("Update failed:", error);
    });
  });
  
  window.onload = loadTeachers;
  

  document.getElementById("editBtn").addEventListener("click", function() {
    document.getElementById("editFormTitle").style.display = "block";
  });

  document.getElementById("editBtn").addEventListener("click", function() {
    alert("Edit button clicked.");
  })