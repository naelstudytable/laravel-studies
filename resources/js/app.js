import "./bootstrap";

window.addEventListener("confirmed-alert", (event) => {
    const data = event.detail;

    Swal.fire({
        title: data.title,
        text: data.text,
        icon: data.type,
        showConfirmButton: false,
        timer: 1500,
    });
});
