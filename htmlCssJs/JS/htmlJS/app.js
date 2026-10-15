
const body = document.querySelector("body");
const randomColor = () =>{
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

const createConfetti = () => {
    const confetti = document.createElement("div");
    confetti.classList.add("confetti");
    confetti.style.backgroundColor = randomColor();
    confetti.style.left = `${Math.random() * window.innerWidth}px`;
    confetti.style.top = `${Math.random() * window.innerHeight}px`;
    body.append(confetti);
}

setInterval(createConfetti, 10);