document.addEventListener('DOMContentLoaded', function() {
    const data = betterReportsData.orders;
    const app = document.getElementById('better-reports-app');

    if (app && data) {
        let output = '<table><thead><tr><th>ID</th><th>Date</th><th>Total</th><th>Status</th><th>Billing Name</th><th>Billing Email</th><th>Items</th></tr></thead><tbody>';
        
        data.forEach(order => {
            let itemsOutput = '<ul>';
            order.items.forEach(item => {
                itemsOutput += `<li>${item.product_name} (ID: ${item.product_id}), Quantity: ${item.quantity}, Total: ${item.total}</li>`;
            });
            itemsOutput += '</ul>';

            output += `<tr>
                <td>${order.id}</td>
                <td>${order.date}</td>
                <td>${order.total}</td>
                <td>${order.status}</td>
                <td>${order.billing_name}</td>
                <td>${order.billing_email}</td>
                <td>${itemsOutput}</td>
            </tr>`;
        });
        
        output += '</tbody></table>';

        // Add a canvas element for the chart
        output += '<canvas id="ordersChart" width="400" height="200"></canvas>';

        app.innerHTML = output;

        // Prepare data for the chart
        const dates = data.map(order => order.date);
        const totals = data.map(order => order.total);

        // Create the chart
        const ctx = document.getElementById('ordersChart').getContext('2d');
        const ordersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Order Total',
                    data: totals,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});
