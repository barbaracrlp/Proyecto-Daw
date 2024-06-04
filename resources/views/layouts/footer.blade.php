<style>
    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        text-align: center;
        padding: 10px 0;
    }
</style>


<footer>
    <div class="container">
        <p>&copy; {{ date('Y') }} Raven's Treasure. All rights reserved.</p>
        <p>Contact us at: <a href="mailto:info@myapplication.com">info@myapplication.com</a></p>
        <img src="{{ asset('images/iconoRaven.png') }}" alt="Logo" height="50">
    </div>
</footer>
