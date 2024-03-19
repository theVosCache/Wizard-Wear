
<script src="https://kit.fontawesome.com/dee40be14a.js" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/q9he3689gj2lfs5a91kwjz47engmr6pdfvele5tu0t4ni3w2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    document.addEventListener('livewire:init', () => {
        Livewire.on('text-block-updated', (event) => {
            // tinymce.remove();
            setTimeout(()=>{
                tinymce.init({
                    selector: 'textarea.tinymce',
                    menubar: false,
                    plugins: 'anchor autolink link lists searchreplace table wordcount',
                    toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | removeformat',
                });
            }, 1000)
        });
    });
</script>