// Scroll animation handler
window.addEventListener(
    "scroll",
    () => {
        document.body.style.setProperty(
            "--scroll",
            window.pageYOffset / (document.body.offsetHeight - window.innerHeight)
        );
    },
    false
);

// Toggle button handler
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById("toggleButton");
    const contentDiv = document.getElementById("show");
    
    // Variables to track animation state
    let isAnimating = false;
    let showTimeout1, showTimeout2;
    let hideTimeout1, hideTimeout2;

    if (toggleButton && contentDiv) {
        toggleButton.addEventListener("click", function () {
            // Prevent multiple clicks during animation
            if (isAnimating) return;
            
            const isHidden = contentDiv.classList.contains("hidden");
            
            // Clear any pending timeouts
            clearTimeout(showTimeout1);
            clearTimeout(showTimeout2);
            clearTimeout(hideTimeout1);
            clearTimeout(hideTimeout2);
            
            if (isHidden) {
                isAnimating = true;
                
                // Show content with animation
                contentDiv.classList.remove("hidden");
                
                // Trigger reflow
                contentDiv.offsetHeight;
                
                // Add animation classes
                contentDiv.style.maxHeight = "0px";
                contentDiv.style.opacity = "0";
                contentDiv.style.transform = "translateY(-20px)";
                
                showTimeout1 = setTimeout(() => {
                    contentDiv.style.maxHeight = contentDiv.scrollHeight + "px";
                    contentDiv.style.opacity = "1";
                    contentDiv.style.transform = "translateY(0)";
                }, 10);
                
                // Smooth scroll to content after animation starts
                showTimeout2 = setTimeout(() => {
                    contentDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    // Allow new clicks after animation completes
                    isAnimating = false;
                }, 100);
                
                toggleButton.querySelector('span').textContent = 'Sembunyikan';
                toggleButton.querySelector('svg').style.transform = 'rotate(180deg)';
            } else {
                isAnimating = true;
                
                // Hide content with animation
                contentDiv.style.maxHeight = "0px";
                contentDiv.style.opacity = "0";
                contentDiv.style.transform = "translateY(-20px)";
                
                hideTimeout1 = setTimeout(() => {
                    contentDiv.classList.add("hidden");
                    contentDiv.style.maxHeight = "";
                    contentDiv.style.opacity = "";
                    contentDiv.style.transform = "";
                    // Allow new clicks after animation completes
                    isAnimating = false;
                }, 700);
                
                toggleButton.querySelector('span').textContent = 'Baca Selengkapnya';
                toggleButton.querySelector('svg').style.transform = 'rotate(0deg)';
            }
        });
    }
});
