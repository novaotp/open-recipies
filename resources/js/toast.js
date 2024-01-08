
class Toast extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        let color = "bg-blue-500";

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
        toast.className = `absolute top-5 left-[5%] w-[90%] lg:left-1/2 lg:-translate-x-1/2 lg:max-w-[600px] flex justify-center items-center ${color} text-white rounded-md p-5`;
        toast.innerHTML = this.getAttribute("message");

        const temp = document.importNode(toast, true);
        this.appendChild(temp);

        setTimeout(function () {
            temp.classList.replace('flex', 'hidden');
        }, 3000);
    }
}

window.customElements.define('toast-notification', Toast)
