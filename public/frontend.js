// Date picker for rental form
document.addEventListener('DOMContentLoaded', function() {
    // Initialize date pickers
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    
    if (startDateInput && endDateInput) {
        const today = new Date().toISOString().split('T')[0];
        startDateInput.min = today;
        
        startDateInput.addEventListener('change', function() {
            endDateInput.min = this.value;
            calculateTotalPrice();
        });
        
        endDateInput.addEventListener('change', calculateTotalPrice);
    }
    
    // Calculate total price based on selected dates and daily price
    function calculateTotalPrice() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);
        const dailyPrice = parseFloat(document.getElementById('daily_price').value);
        
        if (startDateInput.value && endDateInput.value && !isNaN(dailyPrice)) {
            const diffTime = Math.abs(endDate - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            const totalPrice = diffDays * dailyPrice;
            
            document.getElementById('total_days').textContent = diffDays;
            document.getElementById('total_price').textContent = totalPrice.toFixed(2);
            document.getElementById('total_cost_input').value = totalPrice;
        }
    }
    
    // Carousel for car images
    const carousel = document.querySelector('.carousel');
    if (carousel) {
        const items = carousel.querySelectorAll('.carousel-item');
        let currentIndex = 0;
        
        function showItem(index) {
            items.forEach((item, i) => {
                item.classList.toggle('active', i === index);
            });
        }
        
        document.querySelector('.carousel-control-next').addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % items.length;
            showItem(currentIndex);
        });
        
        document.querySelector('.carousel-control-prev').addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showItem(currentIndex);
        });
        
        showItem(currentIndex);
    }
});