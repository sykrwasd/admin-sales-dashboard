// Get college name from URL
const params = new URLSearchParams(window.location.search);
const collegeName = params.get("collegeName");

if (collegeName) {
  const collegeText = document.getElementById("collegeDisplay");
  collegeText.innerHTML = `<i class="bi bi-building"></i> ${collegeName}`;
  
  if (collegeName === "Alpha") {
    collegeText.classList.add("text-bg-danger");
  } else if (collegeName === "Beta") {
    collegeText.classList.add("text-bg-info");
  } else if (collegeName === "Gamma") {
    collegeText.classList.add("text-bg-success");
  } else if (collegeName === "Non-resident") {
    collegeText.innerHTML = `<i class="bi bi-building"></i> Non-Resident`;
    collegeText.classList.add("text-bg-warning");
  }
}

document.getElementById("orderForm").addEventListener("submit", function(event) {

  event.preventDefault(); // prevent normal form submission

  const form = document.getElementById('orderForm'); // get the form element

  if (!form.checkValidity()) {
    form.reportValidity();
    return;
  }

  // Update phone number to +60...
  const phoneInput = document.getElementById("inputPhoneNum");
  phoneInput.value = "+60" + phoneInput.value;

  // Set current date in YYYY-MM-DD format
  const today = new Date().toISOString().split('T')[0];

  // Show the loading animation
  document.getElementById("loadingOverlay").style.display = "flex";

  const data = new FormData(form); // collect all input from form

  data.append("orderDate", today);
  data.append("collegeName", collegeName);    

  const action = form.action;

  fetch(action, {
    method: 'POST',
    body: data,
  })
  .then(response => response.text())
  .then(result => {
    // Wait for 1.5 seconds before hiding the loading screen
    setTimeout(() => {
      document.getElementById("loadingOverlay").style.display = "none";

      if (result.trim() === "Order submitted successfully!") {
        swal("Success!", result, "success");
        form.reset();
      } else {
        swal("Oops!", result, "error");
      }
    }, 1500); // 1500 milliseconds = 1.5 seconds delay
  })
  .catch((error) => {
    setTimeout(() => {
      document.getElementById("loadingOverlay").style.display = "none";
      swal("Oops!", "Something went wrong: " + error.message, "error");
    }, 1500);
  });
});
