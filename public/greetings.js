
        const currentHour = new Date().getHours();
        const greeting = document.getElementById("greetings");

        if (currentHour >= 5 && currentHour < 12) {
            greeting.textContent = "Good Morning! ";
        } else if (currentHour >= 12 && currentHour < 18) {
            greeting.textContent = "Good Afternoon! ";
        } else {
            greeting.textContent = "Good Evening! ";
        }