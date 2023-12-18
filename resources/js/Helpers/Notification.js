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
    deleteId(){
         return Swal.fire({
             title: "Are you sure?",
             text: "You won't be able to revert this!",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Yes, delete it!",
         });
    }
    deleteConfirm(){
         Swal.fire({
             title: "Deleted!",
             text: "Your file has been deleted.",
             icon: "success",
         });
    }
}

export default new Notification();
