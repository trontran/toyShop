<footer>
    <div class="footer_main">
        <div class="tag">
            <h1>Contact</h1>
            <a href="#"><i class="fa-solid fa-house"></i>Can Tho City</a>
            <a href="#"><i class="fa-solid fa-phone"></i>+843232131412</a>
            <a href="#"><i class="fa-solid fa-envelope"></i>tronttgcc210010@fpt.edu.vn</a>
        </div>

        <div class="tag">
            <h1>Get Help</h1>
            <a href="#" class="center">FAQ</a>
            <a href="#" class="center">Shipping</a>
            <a href="#" class="center">Returns</a>
            <a href="#" class="center">Payment Options</a>
        </div>

        <div class="tag">
            <h1>Follow Us</h1>
            <div class="social_link">
                <a href="#" class="fa-brands fa-facebook-f"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="fa-brands fa-twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="fa-brands fa-instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="fa-brands fa-linkedin-in"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>
<style>
    footer {
        width: 100%;
        background-color: #f3f1f1;
        padding: 20px 0;
        text-align: center;
    }

    .footer_main {
        display: flex;
        justify-content: space-around;
    }

    .tag {
        margin: 10px 0;
    }

    .center {
        text-align: center;
    }

    h1 {
        font-size: 25px;
        margin: 25px 0;
        color: green;
    }

    a {
        display: block;
        color: black;
        text-decoration: none;
        margin: 9px 0;
    }

    a i {
        padding: 0 10px;
        transition: 0.3s;
    }

    a:hover i {
        color: green;
    }

    .social_link {
        display: flex;
    }

    .social_link a {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        text-align: center;
        text-decoration: none;
        color: black;
        box-shadow: 0 0 20px 10px rgba(0, 0, 0, 0.05);
        position: relative;
        margin: 0 5px;
        z-index: 10;
        overflow: hidden;
    }

    .fa-brands {
        font-size: 15px;
        line-height: 30px;
        z-index: 10;
        position: relative;
        transition: 0.5s;
    }

    .social_link a:hover .fa-brands {
        color: white;
    }

    .social_link a::after {
        content: '';
        width: 100%;
        height: 100%;
        top: 0;
        left: -90px;
        background: linear-gradient(-45deg, #c72092 , #6c14d0);
        position: absolute;
        z-index: -10;
        transition: 0.5s;
    }

    .social_link a:hover::after {
        left: 0;
    }
</style>
