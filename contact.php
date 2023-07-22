<?php
    include('front/nav.php');
?>
<style>
.btn {
    border: 1px solid #fff;
    margin-left: 10px;
    margin-top: 25px;
    padding: 10px 40px;
    color: #fff;
    font-size: small;
    transition: 0.25s ease-in-out;
    background: transparent;
}

.btn:hover {
    background: linear-gradient(90deg, rgba(255, 255, 255, 1) 0%, rgba(239, 195, 164, 1) 31%, rgba(75, 31, 14, 0.8801645658263305) 100%);
    color: black;
    font-weight: 650;
    box-shadow: 0px -2px 5px 3px #a98779;
}

.content {
    margin-top: 4rem;
    padding: 3rem;
    background: linear-gradient(rgba(0, 0, 0, 0.5), #4b1f0ed0);
    border-radius: 20px;
    box-shadow: 0 0.9rem 1.7rem rgba(0, 0, 0, 0.25),
        0 0.7rem 0.7rem rgba(0, 0, 0, 0.22);
}
</style>
<section
    style="background: linear-gradient(rgba(0,0,0,0.5),#4b1f0e), url(coffeepics/coffee-footer.webp); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 7% 0; text-align: center; height: 2rem;">
    <div class="container">

        <h2 class="title text-white">"Give us your <a href="#" class="text-white">Feedback"</a></h2>

    </div>
</section>

<div
    style="background: url(coffeepics/kopifooter.jpg); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover; height: 75vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto content text-white">
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
                        <button name="submit" type="submit" class="btn mt-4">
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