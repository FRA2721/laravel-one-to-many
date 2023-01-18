import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// image preview controll
const coverImageInput = document.getElementById('cover_image');
const imagePreview = document.getElementById('image_preview');

if(coverImageInput && imagePreview){
    // input changed
    coverImageInput.addEventListener('change', function(){
        const fileUploaded = this.files[0];

        // if the file exist
        if(fileUploaded){
            const reader = new FileReader();
            reader.addEventListener('load', function(){
                imagePreview.src = reader.result;
            });

            reader.readAsDataURL(fileUploaded);
        }
    });
}
