
$(document).ready(function () {

    // Script para adicionar a logo da empresa
    let photo = document.getElementById('imgPhoto');
    let file = document.getElementById('avatar');

    file.addEventListener('change', (event) => {
        const selectedFile = event.target.files[0];
        if (selectedFile) {
            const imageUrl = URL.createObjectURL(selectedFile);
            photo.src = imageUrl;
        }
        console.log(selectedFile);
    });

    photo.addEventListener('click', () => {
        file.click();
        console.log(file)
    });
    // Fim do script para adicionar a logo da empresa
});
