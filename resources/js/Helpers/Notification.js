import Swal from "sweetalert2";

class Notification {
    success(message) {
        Swal.fire({
            icon: "success",
            title: message,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        });
    }
    error(message) {
        Swal.fire({
            icon: "error",
            title: message,
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        });
    }
}

export default new Notification();
