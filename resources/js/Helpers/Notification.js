class Notification {
    success() {
        new Noty({
            type: "success",
            layout: "topRight",
            text: "Successful",
            timeout: 1000,
        }).show();
    }

    alert() {
        new Noty({
            type: "alert",
            layout: "topRight",
            text: "Be Sure about this",
            timeout: 1000,
        }).show();
    }

    error() {
        new Noty({
            type: "error",
            layout: "topRight",
            text: "Failed",
            timeout: 1000,
        }).show();
    }

    warning() {
        new Noty({
            type: "warning",
            layout: "topRight",
            text: "Warning",
            timeout: 1000,
        }).show();
    }
}
export default new Notification();