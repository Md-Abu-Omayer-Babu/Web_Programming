function fetchProfile() {
  fetch('get_profile.php')
    .then(response => response.json())
    .then(data => {
      const profileTable = document.getElementById("profileTable");
      profileTable.innerHTML = "";

      if (data.length === 0) {
        profileTable.innerHTML = "<tr><td colspan='9'>No profiles found.</td></tr>";
      } else {
        data.forEach(profile => {
          const row = document.createElement("tr");
          row.innerHTML = `
            <td>${profile.name}</td>
            <td>${profile.dob}</td>
            <td>${profile.email}</td>
            <td>${profile.phone}</td>
            <td>${profile.gender}</td>
            <td>${profile.address}</td>
            <td>${profile.nationality}</td>
            <td>${profile.blood_group}</td>
            <td>${profile.bio}</td>
          `;
          profileTable.appendChild(row);
        });
      }
    })
    .catch(error => {
      console.error("Error loading profile data:", error);
    });
}

window.onload = fetchProfile;
