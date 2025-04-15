function validateForm() {
    const fields = ['name', 'category', 'price', 'quantity', 'description', 'manufacturer', 'release_date'];
    for (let id of fields) {
        let val = document.forms["productForm"][id].value;
        if (val === "") {
            alert("Please fill all fields.");
            return false;
        }
    }
    return true;
}
