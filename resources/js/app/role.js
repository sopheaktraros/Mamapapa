$(document).ready(function () {
    const roleContainer = $('#role');

    roleContainer.on('click', '.toggle-sub-permission', function () {
        let parent = $(this).data('id');

        $('tr[data-parent="' + parent + '"]').toggleClass('show');
    });

});