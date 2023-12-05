
class NavLink extends HTMLElement {
  connectedCallback() {
    const bgColorVariants = {
      normal: "bg-[rgb(45,45,45)]",
      selected: "bg-slate-200",
      disconnect: "bg-[rgb(220,38,38)]"
    }
  
    const textColorVariants = {
      normal: "text-white",
      selected: "text-black"
    }
  
    const bgColor = bgColorVariants[this.getAttribute("asDisconnect") === "true" ? 'disconnect' : this.getAttribute("selected") ? 'selected' : 'normal'];
    const textColor = textColorVariants[this.getAttribute("selected") === "true" ? 'selected' : 'normal'];

    this.classList.add(...["relative", "mb-5", "last-of-type:mb-0"]);

    this.innerHTML = `
      <li class="relative w-full h-[60px]">
        <a href="${this.getAttribute("href")}" class="${bgColor} ${textColor} relative w-full h-full p-5 rounded-xl flex justify-between items-center">
          ${this.getAttribute("label")}
        </a>
      </li>
    `;
  }
}

customElements.define('nav-link', NavLink);
