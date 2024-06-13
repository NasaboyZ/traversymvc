document.addEventListener('DOMContentLoaded', function () {
    const dropdownButtons = document.querySelectorAll('.dropdown-btn');

    dropdownButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            this.classList.toggle('active');
            const dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === 'block') {
                dropdownContent.style.display = 'none';
                this.querySelector('.fas').classList.remove('fa-chevron-up');
                this.querySelector('.fas').classList.add('fa-chevron-down');
            } else {
                dropdownContent.style.display = 'block';
                this.querySelector('.fas').classList.remove('fa-chevron-down');
                this.querySelector('.fas').classList.add('fa-chevron-up');
            }
        });
    });

    const editOptions = document.querySelectorAll('.edit-options');
    const modal = document.getElementById('popupModal');
    const closeBtn = document.getElementsByClassName('close-btn')[0];

    editOptions.forEach(function (option) {
        option.addEventListener('click', function () {
            modal.style.display = 'block';
        });
    });

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});
