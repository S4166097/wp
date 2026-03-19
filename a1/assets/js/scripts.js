// Run all scripts after the page loads
document.addEventListener("DOMContentLoaded", function () {

    //Modal for the Gallery for when you click on the image and get to see a bigger version of the adorable AI generated pet
    const galleryImages = document.querySelectorAll('.gallery-img');
    const modalImage = document.getElementById('modalImage');

    if (galleryImages.length && modalImage) {
        galleryImages.forEach(img => {
            img.addEventListener('click', function () {
                modalImage.src = this.src;
                modalImage.alt = this.alt;
            });
        });
    }


    //Image preview for add.html, so when you insert an image, a tiny version of the image will appear at the bottom of the form, to indicate what is inputed
    const imageInput = document.getElementById("image");
    const preview = document.getElementById("imagePreview");

    if (imageInput && preview) {

        imageInput.addEventListener("change", function () {

            const file = this.files[0];
            if (!file) return;

            const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];

            if (!allowedTypes.includes(file.type)) {
                alert("Please upload a JPG or PNG image.");
                this.value = "";
                preview.classList.add("d-none");
                return;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove("d-none");
            };

            reader.readAsDataURL(file);
        });
    }

    // Filtering system
const statusFilter = document.getElementById("filter");
const speciesFilter = document.getElementById("speciesFilter");
const pets = document.querySelectorAll(".pet-card");

if (statusFilter && speciesFilter) {
    function filterPets() {
        const statusValue = statusFilter.value;
        const speciesValue = speciesFilter.value;

        pets.forEach(pet => {
            const petStatus = pet.getAttribute("data-status");
            const petSpecies = pet.getAttribute("data-species");

            const show =
                (statusValue === "all" || petStatus === statusValue) &&
                (speciesValue === "all" || petSpecies === speciesValue);

            pet.style.display = show ? "block" : "none";
        });
    }

    statusFilter.addEventListener("change", filterPets);
    speciesFilter.addEventListener("change", filterPets);
}


});

