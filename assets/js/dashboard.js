function getTotalSalesDashboard() {
    fetch('../../actions/dashboard_total_sales.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('orderSales').textContent = "RM " + data.total_sales;

            var percentage;            
            var last_month_sales = Number(data.last_month_sales);
            var current_month_sales = Number(data.current_month_sales);

            if(last_month_sales > current_month_sales) {                
                percentage = ((last_month_sales-current_month_sales)/(current_month_sales || 1) * 100).toFixed(2)
            }
            else if(current_month_sales > last_month_sales){                
                percentage = "+" + ((current_month_sales-last_month_sales)/(last_month_sales || 1) * 100).toFixed(2)
            }
            else {
                percentage = 0.00;
            }

            document.getElementById('orderSalesPercent').textContent = percentage +"% this month"

        })
        .catch(error => {
            console.error("Error fetching total sales:", error);
            document.getElementById('orderSales').textContent = "Error loading";    
        })
}

function getNumOfUserDashboard() {
    fetch('../../actions/dashboard_total_users.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('totalUser').textContent = data.total_users;
        })
        .catch(error => {
            console.error("Error fetching user count:", error);
            document.getElementById('totalUser').textContent = "Error loading";    
        })
}

function getTotalOrdersDashboard() {
    fetch('../../actions/dashboard_total_orders.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('orderCount').textContent = data.total_orders + " orders";

            var percentage;
            var last_month_orders = Number(data.last_month_orders);
            var current_month_orders = Number(data.current_month_orders);

            if(last_month_orders > current_month_orders) {                
                percentage = ((last_month_orders-current_month_orders)/(current_month_orders || 1) * 100).toFixed(2)
            }
            else if(current_month_orders > last_month_orders){                
                percentage = "+" + ((current_month_orders-last_month_orders)/(last_month_orders || 1) * 100).toFixed(2)
            }
            else {
                percentage = "0.00";
            }

            document.getElementById('orderPercent').textContent = percentage + "% this month";
        })
        .catch(error => {
            console.error("Error fetching total orders:", error);
            document.getElementById('orderCount').textContent = "Error loading";
        });
}


function getTodaySalesDashboard() {
    fetch('../../actions/dashboard_today_sales.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('todaySales').textContent = "RM " + data.today_sales;

            var percentage;
            var yesterday_sales = Number(data.yesterday_sales);
            var today_sales = Number(data.today_sales);

            if(yesterday_sales > today_sales) {
                percentage = "-" + (yesterday_sales/(today_sales || 1)).toFixed(2)
            }
            else if(today_sales > yesterday_sales){
                percentage = "+" + (today_sales/(yesterday_sales || 1)).toFixed(2)
            }
            else {
                percentage = "0.00";
            }

            if(yesterday_sales > today_sales) {                
                percentage = ((yesterday_sales-today_sales)/(today_sales || 1) * 100).toFixed(2)
            }
            else if(today_sales > yesterday_sales){                
                percentage = "+" + ((today_sales-yesterday_sales)/(yesterday_sales || 1) * 100).toFixed(2)
            }
            else {
                percentage = "0.00";
            }

            document.getElementById('todaySalesPercent').textContent = percentage +"% today"

        })
        .catch(error => {
            console.error("Error fetching today sales:", error);
            document.getElementById('todaySales').textContent = "Error loading";    
        })
}

getTotalSalesDashboard();
getTodaySalesDashboard();
getTotalOrdersDashboard();
getNumOfUserDashboard();