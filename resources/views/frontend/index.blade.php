<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-..."
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    
</head>
<body>
    <div class="landing-section">
        @include("header.nav")
        
    <h1 id="headingtxt">Fast, Reliable<span>  & Delivered</span></h1>
    <div class="tracking">
        <h2>Track Your Shipment</h2>
        <p>Welcome to our Swiftcourier! Stay updated on your shipment's journey by entering your tracking number below. You'll receive real-time updates on its location and estimated delivery time. For any questions, our support team is here to assist you. Happy tracking! <span><a href="/tracking">Track</a></span>
        </p>
        
    </div>
    </div>
    <div class="about-section">
        <h1>About Us</h1>
        <div class="about">
            <div class="abouttxt">
                <p class="abouttxt"> Swift Courier was founded with a clear vision: to create a courier service that stands out in terms of fast, Reliable, and Delivered focus. What started as a small endeavor has grown into a leading logistics provider, serving clients across various sectors including retail, e-commerce, corporate, and personal shipping needs<BR>
                    Over the years, we have continuously evolved, embracing new technologies and refining our processes to better serve our customers. Our growth is a testament to our commitment to excellence and our ability to adapt to the ever-changing demands of the logistics industry.</p>
            </div>
            <div class="aboutphoto">
                <img src="images/logowithtext.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="services-section">
        <div class="serviceArea">
            <h1>Our Services</h1>
            <div id="service-list">
                <div class="services">
                    <img src="images/services.jpg" alt="">
                    <h3>Land Transport</h3>
                    <p>Through our global network of control towers and state-of-the-art technology, we are able to monitor and dynamically react to situations </p>
                    <button>Learn More</button>
                </div>
                <div class="services">
                    <img src="images/services1.webp" alt="">
                    <h3>Same-Day Delivery</h3>
                    <p>Fast delivery within the same day — ideal for local e-commerce, documents, groceries, or medical needs. </p>
                    <button>Learn More</button>
                </div>
                <div class="services">
                    <img src="images/services2.jpg" alt="">
                    <h3>Scheduled Delivery</h3>
                    <p>Let customers choose delivery windows — useful for business clients and service-based deliveries. </p>
                    <button>Learn More</button>
                </div>
                <div class="services">
                    <img src="images/services3.jpg" alt="">
                    <h3>Cash on Delivery (COD)</h3>
                    <p>Allow the recipient to pay upon delivery — common for online shopping.

                    </p>
                    <button>Learn More</button>
                </div>
                <div class="services">
                    <img src="images/services4.jpg" alt="">
                    <h3>Parcel Tracking</h3>
                    <p>Live GPS tracking, SMS/email notifications, and proof of delivery (signature/photo) for transparency and trust. </p>
                    <button>Learn More</button>
                </div>
                <div class="services">
                    <img src="images/services5.jpg" alt="">
                    <h3>Bulk/Heavy Item Delivery</h3>
                    <p>Transport furniture, electronics, or construction materials with proper handling. </p>
                    <button>Learn More</button>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-section">
        <h1>Contact Us</h1>
        <div class="contactarea">
            <div class="contactform">
                <h2>Need Help?</h2>
                <p>Fill in and submit the form below.</p>
                <label>Name:</label><br>
                <input type="text" id="name"> <br>
                <label>Phone No:</label><br>
                <input type="text" id="phonenum"> <br>
                <label>Email</label><br>
                <input type="text" id="email"> <br>
                <label>Message</label><br>
                <textarea name="msgtextarea" id="message" cols="30" rows="7"></textarea> <br>
                <input type="submit" value="Send" id="submit"> 
                </div>
            <div class="contactimg">
                <img src="images/contact.png" alt="">
            </div>
        </div>
    </div>
    @include('footer.footer')
    <script href="script.js"></script>
</body>
</html>