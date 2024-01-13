const title = document.querySelector('#judul');
const slug = document.querySelector('#slug');
title.addEventListener('keyup', function() {
	let filteredText = title.value.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	slug.value = filteredText.replace(/\s+/g, "-");
});

function previewImage() {
	const cover = document.querySelector('#cover');
	const imgPreview = document.querySelector('.img-preview');

	imgPreview.style.display = 'block';

	const oFReader = new FileReader();
	oFReader.readAsDataURL(cover.files[0]);

	oFReader.onload = function(oFREvent) {
		imgPreview.src = oFREvent.target.result;
	}
}