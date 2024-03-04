<!--Start:contact-->
<section class="home-contact-area pb-100 pt-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 ps-0">
                <div class="contact-img">
                    <img src="/assets/images/contact.png" alt="contact"/>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="home-contact-content">
                    <h2>Qu'avez vous besoin de savoir ?</h2>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" required
                                           data-error="Please enter your name" placeholder="Votre nom"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required
                                           data-error="Please enter your email" placeholder="Votre email"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="phone_number" id="phone_number" required
                                           data-error="Please enter your number" class="form-control"
                                           placeholder="Numéro de téléphone"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                           required data-error="Please enter your subject"
                                           placeholder="Votre sujet"/>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5"
                                                  required data-error="Write your message"
                                                  placeholder="Votre message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn page-btn box-btn">
                                    Envoyer
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End:contact-->
