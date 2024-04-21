function uncheckOthers(checkboxId) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        if (checkbox.id !== checkboxId) {
            checkbox.checked = false;
        }
    });
}