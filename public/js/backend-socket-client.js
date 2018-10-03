$(document).ready(function () {
    var currentUserId = $("#current-user-id").val();
    Echo.channel('order-channel-' + currentUserId)
        .listen('.order.created', (e) => {
            console.log(e, 'dasjdas');
        });
});