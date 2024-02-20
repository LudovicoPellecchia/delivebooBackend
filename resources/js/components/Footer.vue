<script>

export default {
    components: {

    },
    data() {
        return {}
    },
    methods: {

    },
}
</script>

<template>
    <footer>
        <div class="container">
            <div class="logo">
                <img src="/assets/logo.png " alt="">
                <div class="logo-title">Delichoose</div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="footer-section">
                        <div class="footer-contacts">
                            <div class="footer-sct-title">
                                Contact Us
                            </div>
                            <div class="footer-info">
                                <div>3333333333</div>
                                <div>delichoose@email.com</div>
                            </div>
                            <div class="footer-sct-title pt-4">
                                Follow our Socials
                            </div>
                            <div class="footer-info d-flex justify-content-between">
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-facebook"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-pinterest"></i>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="footer-section">
                        <div class="footer-links">
                            <div class="footer-sct-title">
                                Info Links
                            </div>
                            <div class="footer-info">

                                <div><a href="#">Payment Methods</a></div>
                                <div><a href="#">F.A.Q</a></div>
                                <div><a href="#">Contacts</a></div>
                                <div><a href="#">Careers</a></div>
                                <div><a href="#">Features</a></div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col">
                    <div class="footer-section">
                        <div class="footer-links">
                            <div class="footer-sct-title">
                                Info Links
                            </div>
                            <div class="footer-info">
                                <div><a href="#">Terms & Conditions</a></div>
                                <div><a href="#">Privacy Policies</a></div>
                                <div><a href="#">Cookie Policies</a></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
footer {
    margin-top: var(--section-spacing);
    background-color: #333333;
    padding: 50px;


    .footer-section {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-sct-title {
        font-size: 20px;
        font-weight: bold;
        color: white;
        padding-bottom: 20px;


    }

    .footer-info,
    a {
        color: rgba(255, 255, 255, 0.657);
        font-size: 0.9rem;
        text-decoration: none;

        >* {
            padding-bottom: 0.8rem;
        }


        i {
            margin-right: 15px;
            font-size: 1.3rem;
        }
    }
}

.logo {
    display: flex;
    align-items: center;
    padding-bottom: 1.3rem;


    img {
        width: 85px;
    }

    .logo-title {
        color: white;
        font-size: clamp(20px, 4vw, 36px);
        font-weight: 100;
        font-family: 'Borel', cursive;
        transform: translateY(30%);

    }
}
</style>
