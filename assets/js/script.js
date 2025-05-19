function showForm(formId) {    
    document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"));
    document.getElementById(formId).classList.add("active");  
}

const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click",function(){
    document.querySelector(".sidebar").classList.toggle("collapse");
    document.querySelector(".main-content").classList.toggle("collapse");
});