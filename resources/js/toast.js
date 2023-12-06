
class Toast extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        let color;

        switch (this.getAttribute("type")) {
            case "error":
                color = "bg-red-500";
                break;
            case "success":
                color = "bg-green-500";
                break;
            default:
                console.warn("Unsupported type for toast notification !");
                break;
        }

        const toast = document.createElement("div");
        toast.className = `absolute top-5 left-5 right-5 flex justify-center items-center ${color} rounded-md p-5`;
        toast.innerHTML = this.getAttribute("message");

        const temp = document.importNode(toast, true);
        this.appendChild(temp);

        setTimeout(function () {
            temp.classList.replace('flex', 'hidden');
        }, 3000);
    }
}

window.customElements.define('toast-notification', Toast)
