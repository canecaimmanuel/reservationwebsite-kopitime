<?php
    include('front/nav.php');
?>

<section
    style="background: linear-gradient(rgba(0,0,0,0.5),#4b1f0e), url(../coffeepics/coffee-footer.webp); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 7% 0; text-align: center; height: 2rem;">
    <div class="container">

        <h2 class="title text-white" style="font-family: 'Montserrat';">"Give us your <a href="#"
                class="text-white">Feedback"</a></h2>

    </div>
</section>

<div
    style="background: url(../coffeepics/kopifooter.jpg); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover; height: 75vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto content_contact text-white">
                <form action="" method="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Customer Name</label>
                        <input type="email" class="form-control" id="name" required />
                    </div>
                    <div class="mb-3">
                        <label for="emailAdress" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="emailAdress" required />
                    </div>
                    <div class="mb-3">
                        <label for="textArea" class="form-label">Message</label>
                        <textarea class="form-control" id="textArea" rows="3"></textarea>
                        <button name="submit" type="submit" class="contact-button mt-4">
                            SEND MESSAGE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include('front/footer.php');
?>