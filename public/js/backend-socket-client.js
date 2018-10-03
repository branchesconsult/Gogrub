$(document).ready(function () {
    var currentUserId = $("#current-user-id").val();
    Echo.channel('order-channel-' + currentUserId)
        .listen('.order.created', (e) => {
            makeToast(e.message_type, e.message);
            console.log(e, 'dasjdas');
        });
});

function makeToast(type, message) {
    // Sticky version
    $.toast({
        heading: type,
        text: message,
        position: 'top-right',
        icon: 'info',
        bgColor: '#004600',
        textColor: '#ffffff',
        hideAfter: false
    })
}