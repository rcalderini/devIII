function msg(message, title, type) {
    new PNotify({
        title: title,
        type: type,
        text: message,
        delay: 4000,
        shadow: true,
        width: "400px",
        opacity: "1"
    });
}