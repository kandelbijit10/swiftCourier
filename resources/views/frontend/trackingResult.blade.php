<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking - CourierSync</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #f59e0b;
            --success: #10b981;
            --dark: #1e293b;
            --light: #f8fafc;
            --gray: #94a3b8;
            --card-bg: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #010b14 0%, #d0dae8 100%);
            color: var(--dark);
            min-height: 100vh;
        }
        
        /* Main Tracking Container */
        .trackingresult {
            max-width: 1200px;
            background-color: var(--card-bg);
            margin: 120px auto 50px;
            padding: 0;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }
        
        /* Header Section */
        .trackingresult #heading {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            text-align: center;
            text-transform: uppercase;
            padding: 25px 20px;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }
        
        .trackingresult #heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary) 0%, rgba(255,255,255,0.5) 100%);
        }
        
        /* Status Section */
        .status {
            padding: 30px;
            line-height: 1.6;
            background-color: var(--card-bg);
            border-bottom: 1px solid rgba(0,0,0,0.1);
            position: relative;
        }
        
        .status h3 {
            margin-bottom: 15px;
            font-size: 1.8rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .status h3::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            background-color: var(--primary);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        .status p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: var(--dark);
        }
        
        .status span.deliverytime,
        .status span.shippeddate {
            font-weight: bold;
            color: var(--success);
            background-color: rgba(16, 185, 129, 0.1);
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-block;
        }
        
        /* Progress Bar */
        .progress-container {
            background-color: #e2e8f0;
            border-radius: 25px;
            overflow: hidden;
            display: flex;
            align-items: center;
            margin: 40px;
            height: 16px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .progress-bar {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            transition: width 1s ease-out;
            position: relative;
            overflow: hidden;
        }
        
        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, 
                            rgba(255,255,255,0) 0%, 
                            rgba(255,255,255,0.8) 50%, 
                            rgba(255,255,255,0) 100%);
            animation: shimmer 2s infinite;
        }
        
        /* Status Steps */
        .lists {
            display: flex;
            gap: 1em;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 40px;
            position: relative;
        }
        
        .lists::before {
            content: '';
            position: absolute;
            top: 25px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #e2e8f0;
            z-index: 1;
        }
        
        .list {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.8em;
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 2;
            min-width: 120px;
        }
        
        .list img {
            width: 50px;
            height: 50px;
            object-fit: contain;
            background-color: var(--card-bg);
            padding: 10px;
            border-radius: 50%;
            border: 3px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .list p {
            font-size: 1rem;
            color: var(--gray);
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .list.active img {
            border-color: var(--primary);
            transform: scale(1.1);
        }
        
        .list.active p {
            color: var(--primary);
            font-weight: 600;
        }
        
        /* Details Container */
        .detailsContainer {
            margin: 40px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .details {
            background-color: var(--card-bg);
            padding: 0;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .details:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .details h3 {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
            padding: 15px;
            margin-bottom: 0;
            font-size: 1.2rem;
            position: relative;
        }
        
        .details h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--secondary) 0%, rgba(255,255,255,0.5) 100%);
        }
        
        .details-content {
            padding: 20px;
        }
        
        .details label {
            font-weight: 600;
            display: block;
            margin-top: 15px;
            color: var(--dark);
            font-size: 0.9rem;
        }
        
        .details span {
            display: block;
            margin-bottom: 5px;
            color: var(--primary);
            font-size: 1rem;
            padding: 8px 0;
            border-bottom: 1px dashed #e2e8f0;
        }
        
        /* Animations */
        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0.7; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.7; }
        }
        
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .trackingresult {
                margin: 100px 15px 30px;
                border-radius: 12px;
            }
            
            .progress-container,
            .lists {
                margin: 30px 20px;
            }
            
            .lists {
                gap: 0.5em;
            }
            
            .list {
                min-width: 80px;
            }
            
            .list img {
                width: 40px;
                height: 40px;
            }
            
            .detailsContainer {
                margin: 30px 20px;
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .trackingresult {
                margin: 80px 10px 20px;
            }
            
            .status {
                padding: 20px;
            }
            
            .status h3 {
                font-size: 1.4rem;
            }
            
            .progress-container,
            .lists {
                margin: 20px 15px;
            }
            
            .list p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    @include('header.nav')
    
    <div class="trackingresult">
        <div id="heading"><h2>Order Tracking</h2></div>
        <div class="status">
            <h3><span id="trackingstatus">{{$courier->status}}</span></h3>
            <p>Your package has been {{$courier->status}}</p>
            <p><strong>Expected Delivery Date:</strong> <span class="deliverytime">2024-07-27</span></p>
        </div>
        
        <div class="progress-container">
            <div class="progress-bar" id="progress-bar"></div>
        </div>
   
        <div class="lists">
            <div class="list" id="status-order-confirmed">
                <img src="images/checklist.png" alt="Order Confirmed">
                <p>Order Confirmed</p>
            </div>
            <div class="list" id="status-pickup">
                <img src="images/truck.png" alt="Order Picked">
                <p>Order Picked</p>
            </div>
            <div class="list" id="status-in-transit">
                <img src="images/location.png" alt="In Transit">
                <p>In Transit</p>
            </div>
            <div class="list" id="status-delivered">
                <img src="images/package-delivery.png" alt="Order Arrived">
                <p>Order Arrived</p>
            </div>
        </div>
        
        <div class="detailsContainer">
            <div class="details">
                <h3>Order Details</h3>
                <div class="details-content">
                    <label>Order ID:</label>
                    <span>{{$courier->order_id}}</span>
                    
                    <label>Weight:</label>
                    <span>{{$courier->weight}}</span>
                    
                    <label>Dimension:</label>
                    <span>{{$courier->dimension}}</span>
                    
                    <label>Package Type:</label>
                    <span>{{$courier->package}}</span>
                    
                    <label>Special Message:</label>
                    <span>{{$courier->message}}</span>
                </div>
            </div>
            <div class="details">
                <h3>Sender Details</h3>
                <div class="details-content">
                    <label>Sender Name:</label>
                    <span>{{$courier->name}}</span>
                    
                    <label>Sender Address:</label>
                    <span>{{$courier->address}}</span>
                    
                    <label>Destination:</label>
                    <span>{{$courier->destination}}</span>
                </div>
            </div>
            <div class="details">
                <h3>Receiver Details</h3>
                <div class="details-content">
                    <label>Receiver Name:</label>
                    <span>{{$courier->r_name}}</span>
                    
                    <label>Receiver Email:</label>
                    <span>{{$courier->r_email}}</span>
                    
                    <label>Receiver Phone:</label>
                    <span>{{$courier->r_phone}}</span>
                    
                    <label>Receiver Address:</label>
                    <span>{{$courier->r_address}}</span>
                </div>
            </div>
        </div>
    </div>
    
    @include('footer.footer')
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const progressBar = document.getElementById('progress-bar');

            function updateStatus(status) {
                let progressWidth = '';
                let activeSteps = 0;

                switch (status) {
                    case 'Order Confirmed':
                        progressWidth = '25%';
                        activeSteps = 1;
                        break;
                    case 'Order Pickup': 
                        progressWidth = '50%';
                        activeSteps = 2;
                        break;
                    case 'In Transit':
                        progressWidth = '75%';
                        activeSteps = 3;
                        break;
                    case 'Delivered':
                        progressWidth = '100%';
                        activeSteps = 4;
                        break;
                    default:
                        progressWidth = '0%';
                        activeSteps = 0;
                        break;
                }

                // Update progress bar width with smooth animation
                progressBar.style.width = progressWidth;

                // Update status steps
                const steps = [
                    'status-order-confirmed',
                    'status-pickup',
                    'status-in-transit',
                    'status-delivered'
                ];
                
                steps.forEach((stepId, index) => {
                    const stepElement = document.getElementById(stepId);
                    if (index < activeSteps) {
                        stepElement.classList.add('active');
                    } else {
                        stepElement.classList.remove('active');
                    }
                });
            }

            // Initial call to update the status based on the courier's current status
            const initialStatus = document.getElementById('trackingstatus').innerText;
            updateStatus(initialStatus);
        });
    </script>
</body>
</html>