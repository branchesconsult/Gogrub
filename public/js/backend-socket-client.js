$(document).ready(function () {
    var currentUserId = $("#current-user-id").val();
    Echo.channel('order-channel-' + currentUserId)
        .listen('.order.created', (e) => {
            makeToast(e.message_type, e.message);
        })
        .listen('.order.updated', (e) => {
            makeToast(e.message_type, e.message);
        });
    //Sending chat
    Echo.channel('order-chat-' + currentUserId)
        .listen('.chat.receive', (e) => {
            console.log(e);
            makeToast(e.message_type, e.message);
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