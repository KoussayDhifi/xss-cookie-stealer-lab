window.onload = () => {
    const params = new URLSearchParams(window.location.search);
    const welcome = params.get("welcome");

    if (welcome) {
        // DOM XSS — injected via innerHTML
        document.getElementById("welcome-box").innerHTML = welcome;
    }
};
