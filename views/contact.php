
          <?php require './config/config_contact.php'; ?>
                
            <article class="article-banniere">     </article>
            <article class="article-form">
                <form action="" id='form-contact' method='post'>

                <div class="ligne1 ">
                    <label for="name">Nom</label> : <input type="text" required name="contact_name" class='input-base c-desk1 c-mob1 c-tab1' autocomplete='off' id="name" />
                    <label for="prénom">Prénom</label> : <input type="text" name="contact_first_name" class="input-base c-desk1 c-mob1 c-tab1" autocomplete='off' required />
            </div>
                <div class="ligne2">
                    <label for= "email">Adresse email : </label> <input type="email" name="contact_email" class="input-base c-desk1 c-mob1 c-tab1" required/>
                    <label for= "sujet">Sujet : </label><input type="text" name="contact_subject" class="sujet input-base c-desk1 c-mob1 c-tab1" required />
                </div>
                <div class="ligne3">  <label for="text-message">Votre message  </label> <textarea name="contact_message" class="textArea c-desk1 c-mob1 c-tab1" required  rows="5" ></textarea></div>

                <div class="ligne4"> <button type="submit" name=submit_contact class="btn btn-primary">Submit</button>
                </div>
                </form>
                </article>
         

             
                <script src="/assets/mainApp.js"></script> 
