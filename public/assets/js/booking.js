document.addEventListener('DOMContentLoaded', function() {
    const ticketsSelect = document.getElementById('tickets');
    const totalPrice = document.getElementById('totalPrice');
    const pricePerTicket = parseFloat(totalPrice.textContent);
    
    ticketsSelect.addEventListener('change', function() {
        const tickets = parseInt(this.value);
        const total = (pricePerTicket * tickets).toFixed(2);
        totalPrice.textContent = total + ' €';
    });
});