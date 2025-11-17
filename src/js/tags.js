(function() {
    const tagsInput = document.querySelector('#tags_input');
    if(tagsInput) {
        const tagsDiv = document.querySelector('#tags');
        const tagsInputHidden = document.querySelector('[name="tags"]');
        let tags = [];
        if(tagsInputHidden.value !== '') {
            tags = tagsInputHidden.value.split(',');
            showTags();
        }
        tagsInput.addEventListener('keypress', saveTag);
        function saveTag(e) {
            if(e.keyCode === 44) {
                if(e.target.value.trim() === '' || e.target.value < 1) {
                    return;
                }
                e.preventDefault();
                tags = [...tags, e.target.value.trim()];
                tagsInput.value = '';
                showTags();
            }
        }
        function showTags() {
            tagsDiv.textContent = '';
            tags.forEach(tag => {
                const tag2 = document.createElement('LI');
                tag2.classList.add('form__tag');
                tag2.textContent = tag;
                tag2.ondblclick = deleteTag;
                tagsDiv.appendChild(tag2);
            });
            updateInputHidden();
        }
        function deleteTag(e) {
            e.target.remove();
            tags = tags.filter(tag => tag !== e.target.textContent);
            console.log(tags);
            updateInputHidden();
        }
        function updateInputHidden() {
            tagsInputHidden.value = tags.toString();
        }
    }
})();