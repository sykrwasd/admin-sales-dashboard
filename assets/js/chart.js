fetch('../../actions/sales_data.php')
    .then(response => response.json())
    .then(data => {
        // .map = JavaScript array method that creates a new array by applying a function to each item in the original array.

        // For bar chart
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        const months = data.monthly_sales.map(row => monthNames[row.month - 1]);
        const sales = data.monthly_sales.map(row => row.total_sales);
        createBarChart(months, sales);

        // For pie chart
        const college = data.num_order_college.map(row => row.collegeName);
        const numOrder = data.num_order_college.map(row => row.total_orders);

        createPieChart(college, numOrder);
    })
    .catch(error => {
        console.error("Error loading chart data:", error);
    });



function createBarChart(labels, values) {
    const ctx = document.getElementById('barChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Monthly Sales (RM)',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgb(75, 192, 192)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function createPieChart(labels, values) {
    const ctx = document.getElementById('pieChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
            label: "Number of orders by college",
            data: values,
            backgroundColor: ['#880044', '#DD1155', '#FFEE88', '#00CC99']
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Number of orders by college',
                    font: {
                      size: 18
                    },
                    color: 'black',
                    padding: {
                      top: 10,
                      bottom: 20
                    }
                }                
            }
        }        
    });
}